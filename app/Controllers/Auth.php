<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\BlogModel;


class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }
    public function verify()
    {
        return view('auth/verify');
    }
    // public function blog()
    // {
    //     return view('auth/blog');
    // }
    public function blogform()
    {
        return view('auth/blogform');
    }

    // Function for Send OTP to User
    private function sendOtpEmail($email, $otp)
    {
        $emailService = \Config\Services::email();
        $emailService->setFrom('aamankassahun@gmail.com', 'Amanuel Kassahun'); // Change to your email and name
        $emailService->setTo($email);
        $emailService->setSubject('Email Verification - OTP');
        $emailService->setMessage("Your OTP for email verification is: $otp");
        // Send the email
        if (!$emailService->send()) {
            log_message('error', $emailService->printDebugger());
        }
    }

    // Function for Verify Users OTP
public function verifyOtp()
{
    $otp = $this->request->getPost('otp');
    $userModel = new UserModel();
    // Find the user by OTP
    $user = $userModel->where('otp', $otp)->first();
    if ($user) {
        // Update the user's verification status and clear the OTP
        $userModel->update($user['id'], ['is_verified' => 1, 'otp' => null]);
        return redirect()->to('/auth')->with('success', 'Email verified! You can now log in.');
    } 
    else {
        return redirect()->back()->with('fail', 'Invalid OTP. Please try again.');
    }
}


// Function for Registration Users
public function registerUser()
{ 
    //Users Input Validation
    $validated = $this->validate([
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[5]|max_length[12]',
        'passwordConf' => 'required|min_length[5]|max_length[12]|matches[password]',
    ]);
    if (!$validated) {
        return view('auth/register', ['validation' => $this->validator]);
    }
    $data = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'is_verified' => 0, // Set verification status to 0
        'otp' => rand(100000, 999999), // Generate a random OTP
    ];
    $userModel = new UserModel();
    $userModel->insert($data);
    // Send OTP to user's email
    $this->sendOtpEmail($data['email'], $data['otp']);
    return redirect()->to('/auth/verify')->with('success', 'Registration successful! Please check your email for the OTP.');
}


    // User Login
    public function loginUser()
    {
        // Validate User Input Data
        $validated = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]|max_length[12]',
        ]);
        if (!$validated) {
            return view('auth/login', ['validation' => $this->validator]);
        }
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $userModel = new UserModel();
        // Retrieve the user by email
        $user = $userModel->where('Email', trim($email))->first();
        // Check if user exists and verify password
        if ($user) 
        {
            if (password_verify($password, $user['Password'])) {
                // Check if the user is verified
                if ($user['is_verified'] == 0) {
                    return redirect()->back()->with('fail', 'Please verify your email before logging in.');
                }
                // Store user information in session
                session()->set([
                    'user_id' => $user['id'],
                    'user_name' => $user['Name'],
                    'user_email' => $user['Email'],
                    'logged_in' => true,
                ]);
                return redirect()->to('/dashboard')->with('success', 'Login successful');
            } else {
                return redirect()->back()->with('fail', 'Incorrect password.');
            }
        } else {
            return redirect()->back()->with('fail', 'Email not found.');
        }
    }


// Dashbourd 
public function dashboard()
{
    // Check if the user is logged in
    if (!session()->get('logged_in')) {
        return redirect()->to('/auth')->with('fail', 'You must log in first.');
    }
    // Get user details from the session
    $userModel = new UserModel();
    $user = $userModel->find(session()->get('user_id'));
    // Fetch user's blog posts
    $blogModel = new BlogModel();
    $user_blogs = $blogModel->where('user_id', session()->get('user_id'))->findAll();
    $userData = [
        'user_id' => session()->get('user_id'),
        'user_name' => session()->get('user_name'),
        'user_email' => session()->get('user_email'),
        'avatar' => isset($user['avatar']) ? $user['avatar'] : null,
        'user_blogs' => $user_blogs, // Pass the user's blog posts to the view
    ];
    return view('dashboard', $userData);
}



//Working with Upload image in dashbourd
public function upload()
{
    // Check if the user is logged in
    if (!session()->get('logged_in')) {
        return redirect()->to('/auth/login')->with('fail', 'You must log in first.');
    }
    $userModel = new UserModel();
    // Validate the uploaded file
    if ($this->request->getFile('avatar')->isValid() && !$this->request->getFile('avatar')->hasMoved()) {
        $file = $this->request->getFile('avatar');
        $newName = $file->getRandomName(); // Generate a random name for the file
        $file->move('uploads', $newName); // Move the file to the 'uploads' directory
        // Update the user's avatar in the database
        $userModel->update(session()->get('user_id'), ['avatar' => $newName]);
    }
    return redirect()->to('/dashboard')->with('success', 'Profile picture uploaded successfully.');
}


//User Logout
public function logout()
{
    session()->destroy();
    return redirect()->to('/auth')->with('success', 'Logged out successfully.');
}
}