<?php

namespace App\Controllers;

use App\Models\Payment;
use App\Models\UnregisteredUserModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BookingModel;
use App\Models\AccommodationModel1;

class Bookings extends BaseController
{
    protected $bookingModel;
    protected $accommodationModel;
    protected $unregisteredUserModel;

    public function __construct()
    {
        $this->bookingModel = new BookingModel();
        $this->accommodationModel = new AccommodationModel1();
        $this->unregisteredUserModel = new UnregisteredUserModel();
    }

    // Load booking form
    public function form($accommodation_id)
    {
        // Load accommodation details
        $accommodation = $this->accommodationModel->find($accommodation_id);

        if (!$accommodation) {
            return redirect()->back()->with('error', 'Accommodation not found.');
        }

        // Fetch all accommodations
        $room_type = $this->accommodationModel->findAll();

        // Load user information
        $usermodel = new \App\Models\UserModel;
        $userid = session()->get('user_id');
        $user = $usermodel->find($userid);

        $data = [
            'accommodation' => $accommodation,
            'room_type' => $room_type,
            'user' => $user,
        ];

        return view('accommodation/booking', $data);
    }

    public function CheckIn($booking_id)
    {
        $bookingModel = new BookingModel();
        $data = [
            'status' => 'Checked In',
        ];

        // Update the booking status
        if ($bookingModel->update($booking_id, $data)) {
            return redirect()->back()->with('success', 'User Checked In Successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update status.');
        }
    }
    public function edit_booking($booking_id)
    {
        $bookingModel = new BookingModel();
        $unregisteredUserModel = new UnregisteredUserModel();
        $userModel = new UserModel(); // Load the UserModel

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
        return view('admin/edit_Booking', [
            'booking' => $booking,
            'user' => $user,
        ]);
    }

    public function update_booking($booking_id)
    {
        $bookingModel = new BookingModel();
        $unregisteredUserModel = new UnregisteredUserModel();
        $userModel = new UserModel(); // Load the UserModel

        // Data for Booking Update
        $bookingData = [
            'accommodation_id' => $this->request->getPost('accommodation_id'),
            'check_in' => $this->request->getPost('check_in'),
            'check_out' => $this->request->getPost('check_out'),
            'number_of_guests' => $this->request->getPost('number_of_guests'),
            'adults' => $this->request->getPost('adults'),
            'children' => $this->request->getPost('children'),
            'account' => $this->request->getPost('account'),
            'child_age' => $this->request->getPost('child_age'),
            'total_price' => $this->request->getPost('total_price'),
            'status' => $this->request->getPost('status'),
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
        ];

        // Update the Booking table
        $bookingUpdated = $bookingModel->update($booking_id, $bookingData);

        // Update the Unregistered_User table
        $unregisteredUserUpdated = $unregisteredUserModel->update($this->request->getPost('user_id'), $unregisteredUserData);

        // Update the Users table
        $userId = $this->request->getPost('user_id'); // Assuming the user ID is passed in the form
        $userUpdated = $userModel->update($userId, $userData);

        if ($bookingUpdated && $unregisteredUserUpdated && $userUpdated) {
            return redirect()->to('/staff/staff_booked')->with('success', 'Booking, Unregistered User, and User details updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update one or more records.');
        }
    }

    // Handle Booking form submission
    public function submit()
    {
        // Get POST data
        $accommodation_id = $this->request->getPost('accommodation_id');
        $check_in = $this->request->getPost('check_in');
        $check_out = $this->request->getPost('check_out');
        $number_of_adults = $this->request->getPost('adults');
        $number_of_children = $this->request->getPost('children');
        $age_of_children = $this->request->getPost('child_age');
        $number_of_guest = $number_of_adults + $number_of_children;
        $isLoggedIn = session()->has('user_id');
        // Set account value based on login status
        $account = $isLoggedIn ? 1 : 0;
        // Set validation rules
        $validation = \Config\Services::validation();
        $validation->setRules([
            'check_in' => 'required|valid_date',
            'check_out' => 'required|valid_date',
            'adults' => 'required|integer|greater_than[0]',
            'children' => 'required|integer',
            'child_age' => 'required|integer'
        ]);
        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }
        // Validate check-in and check-out dates
        if (strtotime($check_in) >= strtotime($check_out)) {
            return redirect()->back()->withInput()->with('error', 'Check-out date must be after check-in date.');
        }

        // Retrieve the selected accommodation details
        $accommodation = $this->accommodationModel->find($accommodation_id);
        if (!$accommodation) {
            return redirect()->back()->with('error', 'Accommodation not found.');
        }
        // Find all accommodations of the same type
        $room_type_accommodations = $this->accommodationModel
            ->where('room_type', $accommodation['room_type'])
            ->where('reserved_rooms', 0)
            ->orderBy('id', 'ASC') // Ensures we start from the top
            ->findAll();

        $isAvailable = false;
        $available_accommodation = null;
        foreach ($room_type_accommodations as $acc) {
            if (empty($acc['Least_Checkout_Date']) || strtotime($check_in) > strtotime($acc['Least_Checkout_Date'])) {
                $isAvailable = true;
                $available_accommodation = $acc;
                break; // Stop after finding the first available accommodation
            }
        }

        // if (!$isAvailable) {
        //     return redirect()->back()->with('error', 'No available accommodation for the selected dates.');
        // }

        // Store user details if not logged in
        $email = $this->request->getPost('email');
        $first_name = $this->request->getPost('first_name');
        $total_price = $this->request->getPost('total_price');
        if (!$isLoggedIn) {
            $userDetailData = [
                'title' => $this->request->getPost('title'),
                'first_name' => $first_name,
                'middle_name' => $this->request->getPost('middle_name'),
                'last_name' => $this->request->getPost('last_name'),
                'email' => $email,
                'gender' => $this->request->getPost('gender'),
                'phone' => $this->request->getPost('phone'),
                'date_of_birth' => $this->request->getPost('date'),
                'nationality' => $this->request->getPost('nationality'),
                'country' => $this->request->getPost('country'),
                'state' => $this->request->getPost('state'),
                'city' => $this->request->getPost('City'),
                'street_address' => $this->request->getPost('street'),
                'postal_code' => $this->request->getPost('zipcode'),
            ];
            $this->unregisteredUserModel = new UnregisteredUserModel();
            $unregisteredUserId = $this->unregisteredUserModel->insert($userDetailData, true);
        }
               // Set the desired timezone
               date_default_timezone_set('Africa/Nairobi'); // Adjust this to your timezone as needed

               // Get the current time
               $currentTime = date('Y-m-d H:i:s');
       
               // Set expiration time by adding 15 minutes to the current time
               $expiresAt = date('Y-m-d H:i:s', strtotime($currentTime . ' +15 minutes'));
        // Store booking in the database
        $this->bookingModel->save([
            'user_id' => $isLoggedIn ? session()->get('user_id') : $unregisteredUserId,
            'accommodation_id' => $accommodation_id,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'adults' => $number_of_adults,
            'children' => $number_of_children,
            'child_age' => $age_of_children,
            'number_of_guests' => $number_of_guest,
            'total_price' => $total_price,
            'status' => 'Booked',
            'account' => $account,
            'booking_expaired_at' => $expiresAt,
            'payment_status' => 'pending' // Add payment_status here

        ]);
        session()->set([
            'email' => $email,
            'first_name' => $first_name,
            'total_price' => $total_price,
        ]);
        // Update reserved room status and store the check-out date
        $updateData = [
            'reserved_rooms' => 1,
            'Least_Checkout_Date' => $check_out,
            'status' => 'Booked'
        ];
        // Update the accommodation record in the database
        $this->accommodationModel->update($accommodation_id, $updateData);
        // Send email
        $emailService = \Config\Services::email();
        $emailService->setFrom('aamankassahun@gmail.com', 'Hotel Managment');
        $emailService->setTo($email);
        $emailService->setSubject('Booking Confirmation');
        $emailService->setMessage("
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Booking Confirmation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }
            .container {
                width: 100%;
                max-width: 600px;
                margin: 0 auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }
            .header {
                text-align: center;
                padding-bottom: 20px;
            }
            .header img {
                max-width: 150px;
            }
            .content h1 {
                color: #333333;
            }
            .content p {
                color: #555555;
                line-height: 1.6;
            }
            .booking-details {
                background-color: #f9f9f9;
                padding: 15px;
                border-radius: 5px;
                margin-bottom: 20px;
            }
            .booking-details ul {
                list-style-type: none;
                padding: 0;
            }
            .booking-details li {
                padding: 8px 0;
                border-bottom: 1px solid #e0e0e0;
            }
            .booking-details li:last-child {
                border-bottom: none;
            }
            .footer {
                text-align: center;
                color: #777777;
                font-size: 0.9em;
                border-top: 1px solid #e0e0e0;
                padding-top: 15px;
            }
            .footer a {
                color: #007BFF;
                text-decoration: none;
            }
            .promo {
                background-color: #800000;
                color: #ffffff;
                padding: 15px;
                border-radius: 5px;
                text-align: center;
                margin-bottom: 20px;
            }
            .promo h2 {
                margin: 0;
                font-size: 1.2em;
            }
            .promo p {
                margin: 5px 0 0 0;
                font-size: 0.95em;
            }
            .support {
                margin-top: 20px;
                text-align: center;
            }
            .support p {
                margin: 5px 0;
            }
            .no-bullets {
    list-style-type: none; /* Removes the bullets */
    padding: 0;           /* Removes default padding */
    margin: 0;            /* Removes default margin */
}
        </style>
    </head>
    <body>
        <div class='container'>
             <div class='header' style='text-align: center; padding: 10px;'>
        <img src='https://example.com/hotel-icon.png' alt='Hotel Logo' style='width: 100px; height: auto;'>
    </div>
            
            <div class='promo'>
                <h2>Exclusive Offer Just for You!</h2>
                <p>Enjoy a complimentary breakfast during your stay. Book now and make the most of your visit!</p>
            </div>
            
            <div class='content'>
                <h1 style='color: #1e90ff; text-align: center;'>🌟 Booking Confirmation 🌟</h1>
                <h4>Dear {$first_name},</h4>
                <h5>Thank you for booking with us! We are excited to host you. Below are your booking details:</h5>
                
                <div class='booking-details'>
                    <ul>
                        <li><strong>🏨 Accommodation:</strong> {$accommodation['title']}</li>
                        <li><strong>📅 Check-in Date:</strong> {$check_in}</li>
                        <li><strong>📅 Check-out Date:</strong> {$check_out}</li>
                        <li><strong>👥 Number of Guests:</strong> {$number_of_guest}</li>
                        <li><strong>💵 Total Price:</strong> {$total_price}</li>
                    </ul>
                </div>
                <p style='font-size: 1.1em;'>✨ <strong>Exclusive Benefits Just for You:</strong></p>
   <ul class='no-bullets'>
    <li>✅ Complimentary breakfast with your stay</li>
    <li>✅ Free high-speed Wi-Fi</li>
    <li>✅ Access to our state-of-the-art fitness center</li>
    <li>✅ Late check-out (upon availability)</li>
</ul>

                
                <h5>If you have any questions or need to make changes to your booking, feel free to reach out to us.</h5>
                
                <div class='support'>
                    📞 <strong>Phone:</strong> 0987654321<br>
                    📞 <strong>Phone:</strong> 0987654321<br>
                
                </div>
                <h5>You can contact us for the following:</h5>
        <ul class='no-bullets'>
            <li>✅ Change your booking date</li>
            <li>✅ Cancel your booking</li>
            <li>✅ System support or any other assistance</li>
        </ul>
                <h5>You can reply directly to this email for any support or updates regarding your booking.</h5>
                <h5>We look forward to providing you with a comfortable and memorable stay.</h5>
            <div>
                <h5>Best regards,</h5>
                <h5>Your Booking Team</h5>
            </div>
            
            <div class='footer'>
                <p>&copy; " . date('Y') . " Your Hotel Name. All rights reserved.</p>
                <p><a href='https://yourhotelwebsite.com'>Visit Our Website</a></p>
            </div>
        </div>
    </body>
    </html>
");

        if (!$emailService->send()) {
            $error = $emailService->printDebugger(['headers']);
            return redirect()->back()->with('error', 'Booking successful, but email could not be sent. Error: ' . $error);
        }

        // Fetch user data from UnregisteredUserModel
        $user = $this->unregisteredUserModel->where('email', $email)->first();
        if (!$user) {
            // If no unregistered user is found, check the registered users
            $userModel = new UserModel();
            $user = $userModel->where('email', $email)->first();
            if (!$user) {
                return redirect()->to('/login')->with('error', 'User not found.');
            }
        }
        // Store total price in session for payment view
        session()->set('total_price', $total_price);

        // Redirect to payment page
        $data = [
            'user' => $user,
            'total_price' => session()->get('total_price'),
        ];
        return view('payment', $data);
    }



    public function confirmation()
    {
        // Retrieve any success message set in the session
        $successMessage = session()->getFlashdata('success');
        // Pass the success message to the view, if available
        return view('accommodation/confirmation', ['successMessage' => $successMessage]);
    }

    public function delete_Booked($id)
    {
        // Instantiate the Contacts model
        $bookingModel = new BookingModel();
        // Check if the contact message with the provided ID exists
        if ($bookingModel->find($id)) {
            // Delete the contact message
            $bookingModel->delete($id);
            // Redirect back to the contact messages page with a success message
            return redirect()->back()->withInput()->with('success', 'Booked Room deleted successfully.');
        } else {
            // Redirect back with an error message if the contact message is not found
            return redirect()->back()->withInput()->with('error', 'Booked Room not found.');
        }
    }



















    public function Store_Payment()
    {
        $paymentModel = new Payment();
        $bookingModel = new BookingModel();

        // Get JSON input
        $input = $this->request->getJSON(true);

        $data = [
            'full_name' => $input['full_name'] ?? '',
            'email' => $input['email'] ?? '',
            'amount' => $input['amount'] ?? '',
            'user_id' => $input['user_id'] ?? '', // Capture the user_id
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Validate the input
        if (
            !$this->validate([
                'full_name' => 'required|max_length[255]',
                'email' => 'required|valid_email',
                'amount' => 'required|numeric',
                'user_id' => 'required|numeric', // Added validation for user_id
            ])
        ) {
            return $this->response->setStatusCode(400)->setJSON(['errors' => $this->validator->getErrors()]);
        }

        // Check if the user has an existing booking
        $booking = $bookingModel->where('user_id', $data['user_id'])->first();
        if (!$booking) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Booking not found for the given user_id.']);
        }

        // Update the booking status and payment method for the user
        $updateData = [
            'payment_status' => 'Paid',
            'paid_with' => 'Chapa'
        ];
        if (!$bookingModel->update($booking['id'], $updateData)) {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to update booking status.']);
        }


        // Insert payment data into the database
        if ($paymentModel->insert($data)) {
            return $this->response->setStatusCode(200)->setJSON(['success' => 'Payment stored successfully.']);
        } else {
            return $this->response->setStatusCode(500)->setJSON(['error' => 'Failed to store payment.']);
        }
    }




    // public function success()
    // {
    //     return view('payment_success'); // A success view (you can customize it)
    // }

}
