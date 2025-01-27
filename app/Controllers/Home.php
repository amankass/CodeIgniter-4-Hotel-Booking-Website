<?php
namespace App\Controllers;
use App\Models\AccommodationModel1;
use App\Models\BookingModel;
use App\Models\Contacts;
use App\Models\EventContact;
use App\Models\UserModel;
class Home extends BaseController
{
    public function index(): string
    {
        $accommodationModel1 = new AccommodationModel1();

        $accommodations = $accommodationModel1->orderBy('created_at', 'DESC')->findAll(3); 
        return view('welcome_message',['accommodations' => $accommodations, 'isAll' => true]);
    }

    public function markAsSeen()
    {
        $eventId = $this->request->getJSON()->id; // Get order_id from AJAX request
        $eventContact = new EventContact(); // Load your model

        // Update the is_seen column
        $updated = $eventContact->update($eventId, ['is_seen' => 1]);

        // Return JSON response
        if ($updated) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update order.']);
        }
    }
    public function markAsSeen2()
    {
        $contactId = $this->request->getJSON()->id; // Get order_id from AJAX request
        $Contact = new Contacts(); // Load your model
        // Update the is_seen column
        $updated = $Contact->update($contactId, ['is_seen' => 1]);
        // Return JSON response
        if ($updated) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update order.']);
        }
    }
    public function markAsSeen3()
    {
        $bookingId = $this->request->getJSON()->id; // Get booking_id from AJAX request
        $bookingModel = new BookingModel(); // Load your model
        // Update the is_seen column
        $updated = $bookingModel->update($bookingId, ['is_seen' => 1]);
        // Return JSON response
        if ($updated) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to update order.']);
        }
    }

    public function contact()
    {
        return view('contact');
    }
    public function gallary()
    {
        return view('gallary');
    }
    public function payment()
    {
        return view('payment');
    }
    public function sample()
    {
        return view('sample');
    }
    public function service()
    {
        return view('service');
    }
    public function edit_profile()
    {
        // Get user details from the session
    $userModel = new UserModel();
    $user = $userModel->find(session()->get('user_id'));
    $userData = [
     'user' => $user,
        'avatar' => isset($user['avatar']) ? $user['avatar'] : null,
    ];
        return view('edit_profile', $userData);
    }
    public function event()
    {
        return view('Service/event');
    }
    public function restourant()
    {
        return view('Service/restourant');
    }
    public function eventcontact()
    {
        // Collecting the input data
        $data = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
            'venue' => $this->request->getPost('venue'),
            'Is_seen' => $this->request->getPost('Is_seen'),
        ];
        // Inserting the data into the database
        $eventContactModel = new EventContact();
        if ($eventContactModel->insert($data)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'errors' => $eventContactModel->errors()]);
        }
    }
    public function contact_message()
{
    // Collecting the input data
    $data = [
        'full_name' => $this->request->getPost('full_name'), // Combining first and last name if needed
        'email' => $this->request->getPost('email'),
        'subject' => $this->request->getPost('subject'),
        'message' => $this->request->getPost('message'),
    ];

    // Inserting the data into the database
    $contactsModel = new Contacts(); // Updated model name
    if ($contactsModel->insert($data)) {
            return redirect()->back()->with('success', 'Thank you for Contacting Us');
    } else {
        return redirect()->back()->with('erorr', 'Please enter Correct data');
    }
}   
}
