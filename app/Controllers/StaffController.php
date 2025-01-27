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
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class StaffController extends BaseController
{
    protected $bookingModel;
    protected $userModel;
    protected $unregistered_User;
    protected $accommodationModel1;
    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->userModel = new UserModel();
        $this->contacts_message = new Contacts();
        $this->event_hall_message = new EventContact();
        $this->Unregistered_User = new UnregisteredUserModel();
        $this->accommodationModel1 = new AccommodationModel1();
    }
    // public function profile()
    // {
    //     return view("Staff/staff_Profile");
    // }
    public function Staff_profile()
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
        ];
        return view("Staff/staff_Profile", $userData);
    }

    public function staff_upload()
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
        return redirect()->to('/Staff/staff_Profile')->with('success', 'Profile picture uploaded successfully.');
    }

    public function staff_cover_upload()
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
        return redirect()->to('/Staff/staff_Profile')->with('success', 'Cover photo uploaded successfully.');
    }

    public function update_password()
    {
        // Load the UserModel
        $userModel = new UserModel();
        $userId = session()->get('user_id');  // Assuming the user is logged in
    
        // Fetch the user record
        $user = $userModel->find($userId);
    
        if (!$user) {
            return redirect()->back()->with('fail', 'User not found.');
        }
    
        // Validate input
        $validated = $this->validate([
            'current-password' => 'required',
            'new-password' => 'required|min_length[6]|max_length[15]',
            'retype-password' => 'required|min_length[6]|max_length[15]|matches[new-password]',
        ]);
    
        if (!$validated) {
            return redirect()->back()->with('fail', 'Validation failed. Please try again!');
        }
    
        // Verify the current password
        if (!password_verify($this->request->getPost('current-password'), $user['Password'])) {
            return redirect()->back()->with('fail', 'Your current password is incorrect.');
        }
    
        // Hash the new password
        $newPassword = password_hash($this->request->getPost('new-password'), PASSWORD_BCRYPT);
    
        // Prepare data for update
        $updateData = ['Password' => $newPassword];
    
        // Check if there is data to update
        if (empty($updateData['Password'])) {
            return redirect()->back()->with('fail', 'No data to update.');
        }
    
        // Update the password in the database
        $query = $userModel->update($user['id'], $updateData);
    
        if ($query) {
            return redirect()->back()->with('success', 'Password updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'Failed to update password. Please try again.');
        }
    }
    



    public function staff_profile_update()
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
        // Check if a new password is provided
    $password = $this->request->getPost('Password');
    if (!empty($password)) {
        // Hash the password securely
        $data['Password'] = password_hash($password, PASSWORD_DEFAULT);
    }
        // Update the user data
        if ($userModel->update($id, $data)) {
            // Redirect to dashboard with a success message
            return redirect()->to('/Staff/staff_Profile')->with('success', 'User updated successfully.');
        } else {
            // If update fails, return back with an error message
            return redirect()->back()->with('error', 'Failed to update user.');
        }
    }
    public function index()
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
        return view('staff/staff_dashbourd', $data);
    }
    public function booked()
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
        return view('staff/staff_booked', ['bookedAccommodations' => $bookedAccommodations]);
    }
    public function store()
    {
        $validated = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'price' => 'required',
            'amenities' => 'required',
            'floor_number' => 'required',
            'room_type' => 'required',
            'has_lounge_area' => 'required',
            'bed_type' => 'required',
            'room_view' => 'required',
            'Room_Number' => 'required',
            'image.*' => 'max_size[image,18432]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif,image/webp]',
        ]);
        if (!$validated) {
            return view('staff/staff_addacom', ['validation' => $this->validator]);
        }
        // Retrieve content and checkbox values
        $content = $this->request->getPost('content');
        $content = $this->request->getPost('content');
        $decodedContent = htmlspecialchars_decode($content, ENT_QUOTES);
        $balcony = $this->request->getPost('balcony') ? 1 : 0;
        $jacuzzi = $this->request->getPost('jacuzzi') ? 1 : 0;
        $has_lounge_area = $this->request->getPost('has_lounge_area') ? 1 : 0;
        $Room_Number = $this->request->getPost('Room_Number');
        // Handle multiple image uploads
        $imageFiles = $this->request->getFiles()['image'];
        $imagePaths = [];
        if (empty($imageFiles)) {
            log_message('error', 'No files were received for upload');
        }
        foreach ($imageFiles as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                // Set the target directory within the public folder
                $targetPath = FCPATH . '/Images';
                // Ensure the directory exists, create if it doesn't
                if (!is_dir($targetPath)) {
                    mkdir($targetPath, 0755, true);
                }
                // Move the file to the target directory
                $image->move($targetPath, $newName);
                // Store the relative path to save in the database
                $imagePaths[] = '/Images/' . $newName;
            } else {
                log_message('error', 'Image upload failed for file: ' . $image->getName() . ' - Error: ' . $image->getErrorString());
            }
        }
        // Save all accommodation data
        $this->accommodationModel1->save([
            'user_id' => session()->get('user_id'),
            'title' => $this->request->getPost('title'),
            'content' => $decodedContent,
            'price' => $this->request->getPost('price'),
            'amenities' => $this->request->getPost('amenities'),
            'floor_number' => $this->request->getPost('floor_number'),
            'room_type' => $this->request->getPost('room_type'),
            'bed_type' => $this->request->getPost('bed_type'),
            'room_view' => $this->request->getPost('room_view'),
            'Room_Number' => $this->request->getPost('Room_Number'),
            'balcony' => $balcony,
            'jacuzzi' => $jacuzzi,
            'has_lounge_area' => $has_lounge_area,
            'image' => json_encode($imagePaths),  // Store as JSON
            'created_at' => date('Y-m-d H:i:s'),
            'status' => 'Free',
        ]);
        return redirect()->to('staff/staff_addacom')->with('success', 'Accommodation created successfully.');
    }

    public function viewaccom()
    {
        // Retrieve all accommodations from the database
        $accommodationModel1 = new AccommodationModel1();
        $accommodations = $accommodationModel1->findAll();
        // Pass the accommodations data to the view
        return view('staff/staff_viewaccom', ['accommodations' => $accommodations]);
    }
    public function edit($id)
    {
        $accommodation = $this->accommodationModel1->find($id);
        if (!$accommodation) {
            return redirect()->back()->with('fail', 'Accommodation not found.');
        }
        return view('/staff/staff_update_accom', ['accommodation' => $accommodation]);
    }
    public function update($id)
    {
        $validated = $this->validate([
            'title' => 'required',
            'content' => 'required',
            'price' => 'required',
            'amenities' => 'required',
            'floor_number' => 'required',
            'room_type' => 'required',
            'has_lounge_area' => 'required',
            'bed_type' => 'required',
            'room_view' => 'required',
            'Room_Number' => 'required',
            'image.*' => 'max_size[image,18432]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png,image/gif,image/webp]',
        ]);
        if (!$validated) {
            return redirect()->back()->with('validation', $this->validator);
        }
        // Prepare data for updating
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => htmlspecialchars_decode($this->request->getPost('content')),
            'price' => $this->request->getPost('price'),
            'amenities' => $this->request->getPost('amenities'),
            // 'room_quantity' => $this->request->getPost('room_quantity'),
            'floor_number' => $this->request->getPost('floor_number'),
            'room_type' => $this->request->getPost('room_type'),
            'has_lounge_area' => $this->request->getPost('has_lounge_area') ? 1 : 0,
            'bed_type' => $this->request->getPost('bed_type'),
            'room_view' => $this->request->getPost('room_view'),
            'Room_Number' => $this->request->getPost('Room_Number'),
        ];
        // Handle multiple image uploads
        $imagePaths = [];
        // Check if the image files exist
        if ($this->request->getFiles()) {
            $imageFiles = $this->request->getFiles()['image'] ?? []; // Use null coalescing operator to avoid undefined index error
            // If there are existing images, decode them
            if ($accommodation = $this->accommodationModel1->find($id)) {
                $existingImages = json_decode($accommodation['image'], true);
            } else {
                $existingImages = [];
            }
            foreach ($imageFiles as $image) {
                if ($image && $image->isValid()) {
                    $imageName = $image->getRandomName();
                    // Move the uploaded file to the Images directory
                    $image->move('Images', $imageName);
                    // Store the relative path
                    $imagePaths[] = '/Images/' . $imageName;
                }
            }
            // Merge existing images with new uploads
            if (!empty($existingImages)) {
                $imagePaths = array_merge($existingImages, $imagePaths);
            }
        } else {
            // Handle case where no files were uploaded
            log_message('error', "No files were uploaded.");
        }
        // Save image paths as JSON
        if (!empty($imagePaths)) {
            $data['image'] = json_encode(array_values($imagePaths)); // Re-index and encode to JSON
        }
        // Update the accommodation record
        $this->accommodationModel1->update($id, $data);
        return redirect()->to('/staff/staff_viewaccom')->with('success', 'Accommodation updated successfully.');
    }
    public function userlist()
    {
        // Fetch all booked accommodations from the database
        $userlist = $this->userModel->getAllUsers();
        // Pass the data to the view
        return view('staff/staff_userlist', ['userlist' => $userlist]);
    }
    public function unregistered_clients()
    {
        // Fetch all unregistered users from the database
        $Unregistered_User = new UnregisteredUserModel();
        $Unregistered_User = $Unregistered_User->findAll();
        // Pass the data to the view
        return view('staff/staff_unregistered_clientList', ['Unregistered_User' => $Unregistered_User]); // Corrected view name
    }

    public function view_eventmessage()
    {
        // Retrieve all accommodations from the database
        $EventContact = new EventContact();
        $EventContact = $EventContact->findAll();
        // Pass the accommodations data to the view
        return view('staff/staff_event_message', ['accommodations' => $EventContact]);
    }
    public function view_contactmessage()
    {
        // Retrieve all accommodations from the database
        $Contactmessage = new Contacts();
        $Contactmessage = $Contactmessage->findAll();
        // Pass the accommodations data to the view
        return view('staff/staff_Contact_message', ['accommodations' => $Contactmessage]);
    }
    public function view_payment_message()
    {
        // Retrieve all accommodations from the database
        $Payment = new Payment();
        $Payment = $Payment->findAll();
        // Pass the accommodations data to the view
        return view('staff/Payment_info', ['payments' => $Payment]);
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
            return redirect()->to('/staff/staff_Contact_message')->with('success', 'Contact message deleted successfully.');
        } else {
            // Redirect back with an error message if the contact message is not found
            return redirect()->to('/staff/staff_Contact_message')->with('error', 'Contact message not found.');
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
            return redirect()->to('/staff/staff_event_message')->with('success', 'Contact message deleted successfully.');
        } else {
            // Redirect back with an error message if the contact message is not found
            return redirect()->to('/staff/staff_event_message')->with('error', 'Contact message not found.');
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
            return redirect()->to('/staff/staff_unregistered_clientList')->with('success', 'User deleted successfully.');
        } else {
            // Redirect back with an error message if the user is not found
            return redirect()->to('/staff/staff_unregistered_clientList')->with('error', 'User not found.');
        }
    }

    public function edit_booking($booking_id)
    {
        $bookingModel = new BookingModel();
        $unregisteredUserModel = new UnregisteredUserModel();
        $userModel = new UserModel(); // Load the UserModel
        $this->accommodationModel1 = new AccommodationModel1(); // Load the AccommodationModel1

        $booking = $bookingModel->find($booking_id);
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found.');
        }

        // Fetch associated user from unregistered_users
        $unregisteredUser = $unregisteredUserModel->where('id', $booking['user_id'])->first();

        // Fetch associated user from users table
        $registeredUser = $userModel->where('id', $booking['user_id'])->first();

        // Check if the user exists in either table
        if (!$unregisteredUser && !$registeredUser) {
            return redirect()->back()->with('error', 'User not found.');
        }
        // Determine which user data to use
        $user = $unregisteredUser ?? $registeredUser;
        // Fetch the price from AccommodationModel1
        $accommodation = $this->accommodationModel1->where('id', $booking['accommodation_id'])->first();
        $price = ['price' => $accommodation['price'] ?? null]; // Ensure price is an array
        return view('staff/Edit_Booking', [
            'booking' => $booking,
            'user' => $user,
            'price' => $price,
        ]);
    }

    public function update_booking($booking_id)
    {
        $bookingModel = new BookingModel();
        $unregisteredUserModel = new UnregisteredUserModel();
        $userModel = new UserModel(); // Load the UserModel
        $paid_price = $this->request->getPost('total_price');
        $price_pernight = $this->request->getPost('price');
        $checkindate = $this->request->getPost('check_in');
        $checkoutdate = $this->request->getPost('check_out');
        $penality = $this->request->getPost('penality');

        // Convert check-in and check-out dates to DateTime objects
        $checkin = new DateTime($checkindate);
        $checkout = new DateTime($checkoutdate);

        // Calculate the difference in days
        $interval = $checkin->diff($checkout);
        $days = $interval->days;

        // Ensure $price_pernight is a numeric value
        $price_pernight = floatval($price_pernight); // Convert to float if necessary

        // Calculate the new total price
        $newtotalprice = $days * $price_pernight;

        // Calculate the additional fee
        $additionalFee = $newtotalprice - $paid_price;

        $refundfee = $additionalFee * (floatval($penality) / 100);


        // Data for Booking Update
        $bookingData = [
            'accommodation_id' => $this->request->getPost('accommodation_id'),
            // 'booking_date' => $this->request->getPost('booking_date'),
            'check_in' => $checkindate,
            'check_out' => $checkoutdate,
            'number_of_guests' => $this->request->getPost('number_of_guests'),
            'adults' => $this->request->getPost('adults'),
            'children' => $this->request->getPost('children'),
            'account' => $this->request->getPost('account'),
            'child_age' => $this->request->getPost('child_age'),
            'total_price' => $newtotalprice,
            'status' => $this->request->getPost('status'),
            'additional_fee' => $additionalFee,
            'refund_fee' => $refundfee,
        ];

        // Data for Unregistered_User Update
        $unregisteredUserData = [
            'title' => $this->request->getPost('title'),
            'first_name' => $this->request->getPost('first_name'),
            'middle_name' => $this->request->getPost('middle_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'gender' => $this->request->getPost('gender'),
            'nationality' => $this->request->getPost('nationality'),
            'country' => $this->request->getPost('country'),
            'state' => $this->request->getPost('state'),
            'city' => $this->request->getPost('city'),
            'street_address' => $this->request->getPost('street_address'),
            'postal_code' => $this->request->getPost('postal_code'),
            'id_type' => $this->request->getPost('id_type'),
            'id_number' => $this->request->getPost('id_number'),
        ];

        // Data for Users Table Update
        $userData = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'gender' => $this->request->getPost('gender'),
            // Assuming "address" in the users table maps to street_address
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'street_address' => $this->request->getPost('street_address'),
            'postal_code' => $this->request->getPost('postal_code'),
            'id_type' => $this->request->getPost('id_type'),
            'id_number' => $this->request->getPost('id_number'),
        ];

        // Update the Booking table
        $bookingUpdated = $bookingModel->update($booking_id, $bookingData);

        // Update the Unregistered_User table
        $unregisteredUserUpdated = $unregisteredUserModel->update($this->request->getPost('user_id'), $unregisteredUserData);

        // Update the Users table
        $userId = $this->request->getPost('user_id'); // Assuming the user ID is passed in the form
        $userUpdated = $userModel->update($userId, $userData);

        if ($bookingUpdated && $unregisteredUserUpdated && $userUpdated) {
            return redirect()->back()->with('success', 'Booking, Unregistered User, and User details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update one or more records.');
        }
    }

}
