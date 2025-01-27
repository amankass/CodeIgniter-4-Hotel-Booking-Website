<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccommodationModel1;
use App\Models\BookingModel;
use App\Models\Contacts;
use App\Models\EventContact;
use App\Models\Payment;
use App\Models\UnregisteredUserModel;
use App\Models\UserModel;
class Admin extends BaseController
{
    protected $bookingModel;
    protected $userModel;
    protected $unregistered_User;

    public function __construct()
    {
        // Instantiate the BookingModel
        $this->bookingModel = new BookingModel();
        $this->userModel = new UserModel();
        $this->contacts_message = new Contacts();
        $this->event_hall_message = new EventContact();
        $this->Unregistered_User = new UnregisteredUserModel();
    }

    public function index()
    {
        return view("Admin/dashbourd");
    }
    public function edit_profile()
    {
        // Get user details from the session
    $userModel = new UserModel();
    $user = $userModel->find(session()->get('user_id'));
    $userData = [
     'user' => $user,
        'avatar' => isset($user['avatar']) ? $user['avatar'] : null,
        // 'user_blogs' => $user_blogs, // Pass the user's blog posts to the view
    ];
        return view('Admin/edit_profile', $userData);
    }
    public function admin_profile_update()
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
        // $validationRules = [
        //     'title' => 'required|min_length[2]',
        //     'first_name' => 'required|min_length[3]',
        //     'last_name' => 'required|min_length[3]',
        //     'email' => 'required|valid_email',
        //     'phone' => 'required|numeric',
        //     'date_of_birth' => 'required|valid_date',
        // ];

        // // Validate request data
        // if (!$this->validate($validationRules)) {
        //     // Validation failed, return back with errors
        //     return redirect()->back()->withInput()->with('validation', $this->validator);
        // }

        // Update the user data
        if ($userModel->update($id, $data)) {
            // Redirect to dashboard with a success message
            return redirect()->to('Admin/Admin_profile')->with('success', 'User updated successfully.');
        } else {
            // If update fails, return back with an error message
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }

    public function admin_upload()
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
        return redirect()->to('/Admin/Admin_profile')->with('success', 'Profile picture uploaded successfully.');
    }
    public function admin_cover_upload()
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
        return redirect()->to('/Admin/Admin_profile')->with('success', 'Cover photo uploaded successfully.');
    }


    public function chartdatas()
    {
        $BookingModel = new BookingModel();
        $currentWeekStart = date('Y-m-d', strtotime('monday this week')); // Start of the week
        $currentWeekEnd = date('Y-m-d', strtotime('sunday this week')); // End of the week
        $BookingModel = $BookingModel->select('DAYOFWEEK(created_at) as weekday, COUNT(*) as count')
            ->where('created_at >=', $currentWeekStart)
            ->where('created_at <=', $currentWeekEnd)
            ->groupBy('weekday')
            ->findAll();
        // Prepare data for chart
        $labels = [];
        $dataCounts = array_fill(0, 7, 0); // Fill with zeros for each day of the week
        // Day of week index starts from 1 (Sunday = 1, ..., Saturday = 7)
        foreach ($BookingModel as $BookingModels) {
            // DAYOFWEEK returns 1 for Sunday, 2 for Monday, ..., 7 for Saturday
            $dataCounts[$BookingModels['weekday'] - 1] = $BookingModels['count'];
        }
        // Set labels to the days of the week (Monday to Sunday)
        $labels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        return $this->response->setJSON([
            'labels' => $labels,
            'data' => $dataCounts
        ]);
    }
    public function Dashbourd()
    {
        $BookingModel = new BookingModel();
        $UserModel = new UserModel();
        $contacts_message = new Contacts();
        $event_hall_message = new EventContact();
        $Unregistered_User = new UnregisteredUserModel();
        // Registered and Unregistered users count
        $registeredUsers = $UserModel->countAll();
        $unregisteredUsers = $Unregistered_User->countAll();
        $data = [
            'totalbook' => $BookingModel->where('is_seen', 0)
                ->where('status !=', 'Checked Out')
                ->countAllResults(),
            'totalusers' => $UserModel->countAll(),
            'contacts_message' => $contacts_message->where('is_seen', 0)->countAllResults(),
            'event_hall_message' => $event_hall_message->where('is_seen', 0)->countAllResults(),
            'Unregistered_User' => $unregisteredUsers,
            'registeredUserCount' => $registeredUsers,
            'totalstafs' => $UserModel->where('Role', 'Staff')->countAllResults(),
            'totalclient' => $UserModel->where('Role', 'Customers')->countAllResults(),
            'event_message' => $event_hall_message->where('is_seen', 0)->orderBy('created_at', 'DESC')->limit(5)->findAll(),
        ];
        return view("Admin/Dashbourd", $data);
    }
    public function Add_Room()
    {
        return view("Admin/Add_Room");
    }
    public function Admin_profile()
    {
        // Check if the user is logged in
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth')->with('fail', 'You must log in first.');
        }
        // Get user details from the session
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user_id'));

        $userData = [
            'user' => $user,
            'user_name' => isset($user['user_name']) ? $user['user_name'] : null,
            'avatar' => isset($user['avatar']) ? $user['avatar'] : null,
            'cover_photo' => isset($user['cover_photo']) ? $user['cover_photo'] : null, // Add cover_photo
            // Pass the user's blog posts to the view
        ];
        return view("Admin/Admin_profile", $userData);
    }
    public function Staff_list()
    {
        $stafflist = $this->userModel->where('Role', 'Staff')->findAll();
        // Pass the data to the view
        return view('Admin/Staff_list', ['stafflist' => $stafflist]);
    }

    public function registerStaff()
{
    // Users Input Validation
    $validated = $this->validate([
        'first_name' => 'required',
        'phone' => 'required',
        'Gender' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required|min_length[5]|max_length[12]',
        // 'passwordConf' => 'required|min_length[5]|max_length[12]|matches[password]',
    ]);

    if (!$validated) {
        return view('auth/register', ['validation' => $this->validator]);
    }

    // Determine is_verified based on the Role
    $role = $this->request->getPost('Role');
    $is_verified = ($role === 'Staff') ? 1 : 0;

    $data = [
        'first_name' => $this->request->getPost('first_name'),
        'phone' => $this->request->getPost('phone'),
        'email' => $this->request->getPost('email'),
        'Gender' => $this->request->getPost('Gender'),
        'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'Role' => $role,
        'is_verified' => $is_verified, // Add is_verified value
    ];
    $userModel = new UserModel();
    $userModel->insert($data);
    return redirect()->back()->with('success', 'Registration successful!');
}

    public function delete_Staff($id)
    {
        // Instantiate the Contacts model
        $userModel = new UserModel();
        // Check if the contact message with the provided ID exists
        if ($userModel->find($id)) {
            // Delete the contact message
            $userModel->delete($id);
            // Redirect back to the contact messages page with a success message
            return redirect()->back()->withInput()->with('success', 'Staff deleted successfully.');
        } else {
            // Redirect back with an error message if the contact message is not found
            return redirect()->back()->withInput()->with('error', 'Staff not found.');
        }
    }
    public function edit_staff($staff_id)
    {
        $userModel = new UserModel();
    
        // Fetch associated user from users table using the staff ID
        $user = $userModel->where('id', $staff_id)->first();
        
        // Check if the user exists
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // Return the view with user data
        return view('Admin/Staff_list', [
            'user' => $user,
        ]);
    }
    





    public function update_staff()
    {
        $userModel = new UserModel(); // Load the UserModel
    
        // Get the staff ID from the POST data
        $staff_id = $this->request->getPost('id');
    
        // Data for Users Table Update
        $userData = [
            'first_name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'Gender' => $this->request->getPost('gender'),
        ];
    
        // Check if staff exists
        if ($userModel->find($staff_id)) {
            // Update staff information in the database
            $userModel->update($staff_id, $userData);
    
            // Redirect with success message
            return redirect()->back()->with('success', 'Staff updated successfully.');
        } else {
            // Redirect with error message if staff is not found
            return redirect()->back()->with('error', 'Staff not found.');
        }
    }
    


    public function Booked_rooms()
    {
        // Fetch all booked accommodations from the database
        $bookedAccommodations = $this->bookingModel
            ->select('bookings.*, 
                      accommodations.id AS accommodation_id, 
                      accommodations.title AS title, 
                      accommodations.room_type AS room_type, 
                      accommodations.price AS price, 
                      COALESCE(users.first_name, Unregistered_User.first_name, "Unknown") AS customer_name,
                      COALESCE(users.email, Unregistered_User.email, "Unknown") AS customer_email,
                      COALESCE(users.phone, Unregistered_User.phone, "Unknown") AS customer_phone,
                      COALESCE(users.country, Unregistered_User.country, "Unknown") AS customer_country,
                      COALESCE(users.nationality, Unregistered_User.nationality, "Unknown") AS customer_nationality')
            ->join('accommodations', 'accommodations.id = bookings.accommodation_id', 'left')
            ->join('users', 'users.id = bookings.user_id', 'left')
            ->join('Unregistered_User', 'Unregistered_User.id = bookings.user_id', 'left')
            ->orderBy('bookings.created_at', 'DESC')
            ->findAll();
        // Pass the data to the view
        return view('Admin/Booked_rooms', ['bookedAccommodations' => $bookedAccommodations]);
    }
    public function User_list()
    {
        // Fetch all booked accommodations from the database
        $userlist = $this->userModel->getAllUsers();
        // Pass the data to the view
        return view('Admin/User_list', ['userlist' => $userlist]);
    }
    public function unregistered_clients()
    {
        // Fetch all unregistered users from the database
        $Unregistered_User = new UnregisteredUserModel();
        $Unregistered_User = $Unregistered_User->findAll();
        // Pass the data to the view
        return view('Admin/unregisterd_clients', ['Unregistered_User' => $Unregistered_User]); // Corrected view name
    }

    public function View_AllRooms()
    {
        // Retrieve all accommodations from the database
        $accommodationModel1 = new AccommodationModel1();
        $accommodations = $accommodationModel1->findAll();
        // Pass the accommodations data to the view
        return view('Admin/View_AllRooms', ['accommodations' => $accommodations]);
    }
    public function vieweventmessage()
    {
        // Retrieve all accommodations from the database
        $EventContact = new EventContact();
        $EventContact = $EventContact->findAll();
        // Pass the accommodations data to the view
        return view('Admin/Event_message', ['accommodations' => $EventContact]);
    }
    public function viewecontactmessage()
    {
        // Retrieve all accommodations from the database
        $Contactmessage = new Contacts();
        $Contactmessage = $Contactmessage->findAll();
        // Pass the accommodations data to the view
        return view('Admin/Contact_message', ['accommodations' => $Contactmessage]);
    }

    public function delete_ContactMessage($id)
    {
        // Instantiate the Contacts model
        $Contactmessage = new Contacts();

        // Check if the contact message with the provided ID exists
        if ($Contactmessage->find($id)) {
            // Delete the contact message
            $Contactmessage->delete($id);
            // Redirect back to the contact messages page with a success message
            return redirect()->to('/Admin/contactmessage')->with('success', 'Contact message deleted successfully.');
        } else {
            // Redirect back with an error message if the contact message is not found
            return redirect()->to('Admin/contactmessage')->with('error', 'Contact message not found.');
        }
    }
    public function delete_EventMessage($id)
    {
        // Instantiate the Contacts model
        $Eventmessage = new EventContact();
        // Check if the contact message with the provided ID exists
        if ($Eventmessage->find($id)) {
            // Delete the contact message
            $Eventmessage->delete($id);
            // Redirect back to the contact messages page with a success message
            return redirect()->to('/Admin/Event_message')->with('success', 'Contact message deleted successfully.');
        } else {
            // Redirect back with an error message if the contact message is not found
            return redirect()->to('/Admin/Event_message')->with('error', 'Contact message not found.');
        }
    }

    public function delete_UnregisteredUser($id)
    {
        // Instantiate the UnregisteredUserModel model
        $Unregistered_User = new UnregisteredUserModel();

        // Check if the user with the provided ID exists
        if ($Unregistered_User->find($id)) {
            // Delete the user
            $Unregistered_User->delete($id);
            // Redirect back to the unregistered clients page with a success message
            return redirect()->to('/Admin/unregistered_clients')->with('success', 'User deleted successfully.');
        } else {
            // Redirect back with an error message if the user is not found
            return redirect()->to('/Admin/unregistered_clients')->with('error', 'User not found.');
        }
    }

    public function view_payment_message()
    {
        // Retrieve all accommodations from the database
        $Payment = new Payment();
        $Payment = $Payment->findAll();
        // Pass the accommodations data to the view
        return view('Admin/Payment_Info', ['payments' => $Payment]);
    }


}































