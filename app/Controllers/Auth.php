<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\BookingModel;
use App\Models\UserModel;


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
    public function Password_resete()
    {
        return view('auth/Password_resete');
    }
    public function verify()
    {
        return view('auth/verify');
    }

    // Function for Send OTP to User
    private function sendOtpEmail($email, $otp)
    {
        $emailService = \Config\Services::email();
    
        $emailService->setFrom('aamankassahun@gmail.com', 'Hotel Management'); // Replace with your sender's email and name
        $emailService->setTo($email);
        $emailService->setSubject('Email Verification - OTP');
    
        // Create a professional email template
        $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    color: #333;
                    margin: 0;
                    padding: 0;
                }
                .email-container {
                    max-width: 600px;
                    margin: 20px auto;
                    background-color: #fff;
                    border: 1px solid #ddd;
                    border-radius: 8px;
                    overflow: hidden;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }
                .email-header {
                    background-color: #800000;
                    color: white;
                    text-align: center;
                    padding: 20px;
                }
                .email-body {
                    padding: 20px;
                    line-height: 1.6;
                }
                .otp-code {
                    font-size: 24px;
                    font-weight: bold;
                    color: #4CAF50;
                    text-align: center;
                    margin: 20px 0;
                }
                .email-footer {
                    text-align: center;
                    background-color: #f1f1f1;
                    padding: 15px;
                    font-size: 12px;
                    color: #777;
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h1>Welcome to Our International Hotel</h1>
                </div>
                <div class='email-body'>
                    <h4>Dear Valued Guest,</h4>
                    <h5>Thank you for registering with our hotel management system. To verify your email address, please use the OTP code provided below:</h5>
                    <div class='otp-code'>$otp</div>
                    <h5>If you did not initiate this request, please ignore this email.</h5>
                    <h5>Best regards,<br>Hotel Management Team</h5>
                </div>
                <div class='email-footer'>
                    &copy; " . date('Y') . " Hotel Management. All Rights Reserved.
                </div>
            </div>
        </body>
        </html>
        ";
    
        // Set the HTML message
        $emailService->setMessage($message);
        $emailService->setMailType('html'); // Ensure email is sent as HTML
    
        // Send the email and log if there’s an error
        if (!$emailService->send()) {
            log_message('error', $emailService->printDebugger(['headers']));
            return false;
        }
        return true;
    }
    
    
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
        } else {
            return redirect()->back()->with('fail', 'Invalid OTP. Please try again.');
        }
    }


    // Function for Registration Users
    public function registerUser()
    {
        //Users Input Validation
        $validated = $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[5]|max_length[12]',
            // 'passwordConf' => 'required|min_length[5]|max_length[12]|matches[password]',
        ]);
        if (!$validated) {
            return view('auth/register', ['validation' => $this->validator]);
        }
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'last_name' => $this->request->getPost('last_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'is_verified' => 0, // Set verification status to 0
            'otp' => rand(100000, 999999), // Generate a random OTP
            'Role' => 'Customers'
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
        if ($user) {
            if (password_verify($password, $user['Password'])) {
                // Check if the user is verified
                if ($user['is_verified'] == 0) {
                    return redirect()->back()->with('fail', 'Please verify your email before logging in.');
                }
                // Store user information in session
                session()->set([
                    'user_id' => $user['id'],
                    'title' => $user['title'],
                    'user_name' => $user['first_name'],
                    'user_email' => $user['email'],
                    'date_of_birth' => $user['date_of_birth'],
                    'phone' => $user['phone'],
                    'nationality' => $user['nationality'],
                    'country' => $user['country'],
                    'state' => $user['state'],
                    'city' => $user['city'],
                    'street' => $user['street_address'],
                    'zipcode' => $user['postal_code'],
                    'avatar' => $user['avatar'],
                    'logged_in' => true,
                    'Role' => $user['Role'],
                ]);
                // Redirect based on user type
                if ($user['Role'] === 'Admin') {
                    return redirect()->to('Admin/Dashbourd');
                } elseif ($user['Role'] === 'Staff') {
                    return redirect()->to('staff');
                } else {
                    return redirect()->to('/')->with('success', 'Login successful');
                }

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
        // Ensure avatar and cover_photo are available, with fallback to null
        $userData = [
            'user' => $user,
            'avatar' => isset($user['avatar']) ? $user['avatar'] : null,
            'cover_photo' => isset($user['cover_photo']) ? $user['cover_photo'] : null, // Add cover_photo
        ];
        return view('dashboard', $userData);
    }


    public function update()
    {
        // Load the UserModel
        $userModel = new UserModel();
        // Get the user's ID from the hidden input field
        $id = $this->request->getPost('id');
        // Get data from the POST request
        $data = [
            'title' => $this->request->getPost('title'),
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'last_name' => $this->request->getPost('last_name'),
            'Gender' => $this->request->getPost('Gender'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'nationality' => $this->request->getPost('nationality'),
            'country' => $this->request->getPost('country'),
            'city' => $this->request->getPost('city'),
            'State' => $this->request->getPost('State'),
            'StreetAddress' => $this->request->getPost('street_address'),
            'PostalCode' => $this->request->getPost('postal_code'),
        ];
        // Validation rules
        $validationRules = [
            'title' => 'required|min_length[2]',
            'first_name' => 'required|min_length[3]',
            'last_name' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'phone' => 'required|numeric',
            'date_of_birth' => 'required|valid_date',
            // Add more as necessary
        ];

        // Validate request data
        if (!$this->validate($validationRules)) {
            // Validation failed, return back with errors
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Update the user data
        if ($userModel->update($id, $data)) {
            // Redirect to dashboard with a success message
            return redirect()->to('/dashboard')->with('success', 'User updated successfully.');
        } else {
            // If update fails, return back with an error message
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }



    //Working with Upload image in dashbourd
    public function upload()
    {
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('fail', 'You must log in first.');
        }
        $userModel = new UserModel();
        // Validate the uploaded file for avatar
        if ($this->request->getFile('avatar')->isValid() && !$this->request->getFile('avatar')->hasMoved()) {
            $file = $this->request->getFile('avatar');
            $newName = $file->getRandomName(); // Generate a random name for the file
            $file->move('uploads', $newName); // Move the file to the 'uploads' directory
            // Update the user's avatar in the database
            $userModel->update(session()->get('user_id'), ['avatar' => $newName]);
        }
        return redirect()->to('/dashboard')->with('success', 'Profile picture uploaded successfully.');
    }

    public function cover_upload()
    {
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth/login')->with('fail', 'You must log in first.');
        }
        $userModel = new UserModel();
        // Validate the uploaded file for cover photo
        if ($this->request->getFile('cover_photo')->isValid() && !$this->request->getFile('cover_photo')->hasMoved()) {
            $file = $this->request->getFile('cover_photo');
            $newName = $file->getRandomName(); // Generate a random name for the file
            $file->move('uploads', $newName); // Move the file to the 'uploads' directory
            // Update the user's cover photo in the database
            $userModel->update(session()->get('user_id'), ['cover_photo' => $newName]);
        }
        return redirect()->to('/dashboard')->with('success', 'Cover photo uploaded successfully.');
    }



    //User Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/auth')->with('success', 'Logged out successfully.');
    }











    private function sendResetEmail($to, $resetCode)
    {
        $email = \Config\Services::email();

        $email->setFrom('aamankassahun@gmail.com', 'Hotel Managment');
        $email->setTo($to);
        $email->setSubject('Password Reset Code');
        // Prepare email body
        $message = "<div style='font-family: Arial, sans-serif; color: #333; padding: 20px;'>
        <h2 style='color: #0056b3;'>Hello Valued Customer,</h2>
        <p style='font-size: 16px; line-height: 1.6;'>
            We received a request to reset your password. Please use the code below to proceed with resetting your password. 
            This code is valid for 15 minutes, so be sure to use it promptly.
        </p>
        <div style='text-align: center; margin: 20px 0;'>
            <p style='font-size: 24px; font-weight: bold; color: #0056b3; border: 2px solid #249aaf; padding: 10px; display: inline-block;'>
                $resetCode
            </p>
        </div>
        <p style='font-size: 14px; line-height: 1.6; color: #555;'>
            If you did not request a password reset, please ignore this email or contact our support team for assistance.
        </p>
        <p style='font-size: 14px; line-height: 1.6; color: #555;'>
            Thank you for choosing our hotel. We appreciate your trust in us!
        </p>
        <hr style='border: none; height: 1px; background-color: #ccc;' />
        <p style='font-size: 12px; color: #888;'>
            Best regards,<br>
            The Support Team
        </p>
    </div>";

        $email->setMessage($message);

        if (!$email->send()) {
            // Log the error
            log_message('error', $email->printDebugger(['headers']));
            return false; // Email failed to send
        }
        return true; // Email sent successfully
    }

    public function forgotPassword()
    {
        try {
            $email = $this->request->getPost('email');

            // Load UserModel
            $userModel = new UserModel();

            // Check if the email exists in the database
            $user = $userModel->where('email', $email)->first();

            if ($user) {
                if ($user['Role'] === 'Customers') {

                    // Generate a reset code and expiration time
                    $resetCode = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT); // Random 6-digit code
                    $expiresAt = date('Y-m-d H:i:s', strtotime('+15 minutes')); // Set expiration time

                    // Update user with reset code and expiration time
                    $data = [
                        'reset_code' => $resetCode,
                        'resete_code_expiration_time' => $expiresAt
                    ];
                    $userModel->update($user['id'], $data);
                    // Send email with the reset code
                    $this->sendResetEmail($email, $resetCode);
                    return redirect()->to('auth/Password_resete')->with('success', 'Reset code sent to your email.');
                } else {
                    return redirect()->back()->with('fail', 'You cannot reset the password. Please contact the administrator.');
                }
            } else {
                return redirect()->back()->with('fail', 'Email not found.');
            }
        } catch (\Exception $e) {
            log_message('error', 'Forgot Password Error: ' . $e->getMessage());
            return redirect()->back()->with('fail', 'An error occurred. Please try again.');
        }
    }

    public function resetPassword()
    {
        $validated = $this->validate([
            'newPassword' => 'required|min_length[6]|max_length[10]',
            'confirmPassword' => 'required|matches[newPassword]',
        ]);

        if (!$validated) {
            return view('auth/Password_resete', ['validation' => $this->validator]);
        }
        $resetCode = $this->request->getPost('resetCode');
        $newPassword = $this->request->getPost('newPassword');

        $userModel = new UserModel();
        $user = $userModel->where('reset_code', $resetCode)->first();
        $data = [
            'password' => password_hash($newPassword, PASSWORD_DEFAULT),
            'reset_code' => null,
            'resete_code_expiration_time' => null
        ];
        if ($user) {
            $currentTime = date('Y-m-d H:i:s');
            if ($currentTime <= $user['resete_code_expiration_time']) {
                // Code is valid, proceed to reset password
                $userModel->update($user['id'], $data);
                return redirect()->to('/auth')->with('success', 'Password has been reseted successfully.');
            } else {
                return redirect()->back()->with('fail', 'Reset code has expired. Please request a new one.');
            }
        } else {
            return redirect()->back()->with('fail', 'Invalid reset code.');
        }
    }









    public function getBookingHistory()
    {
        $session = session();
        $userId = $session->get('user_id'); // Get the session user ID

        if (!$userId) {
            return $this->response->setJSON(['error' => 'User not logged in']);
        }

        $bookingModel = new BookingModel(); // Replace with your actual booking model
        $bookingHistory = $bookingModel->where('user_id', $userId)->findAll();

        if (empty($bookingHistory)) {
            return $this->response->setJSON([]);
        }

        return $this->response->setJSON($bookingHistory);
    }


}
