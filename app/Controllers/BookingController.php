<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AccommodationModel1;
use App\Models\BookingModel;
use CodeIgniter\HTTP\ResponseInterface;

class BookingController extends BaseController
{
    public function index()
    {
        // Load available rooms from the database
        $roomModel = new AccommodationModel1();
        $data['rooms'] = $roomModel->findAll(); // Fetch all rooms
        return view('accommodation/booking', $data); // Pass rooms data to view
    }
    public function checkIn($id)
    {
        $bookingModel = new BookingModel();
        $bookingModel->update($id, ['status' => 'Checked In']);
        return redirect()->back()->with('message', 'Booking Checked In successfully.');
    }
    public function checkOut($id)
    {
        $bookingModel = new BookingModel();
        // Update status to 'Checked Out'
        $bookingModel->update($id, ['status' => 'Checked Out']);
        return redirect()->back()->with('message', 'Booking Checked Out successfully.');
    }
    public function bookRoom()
    {
        // Validate input data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'room_id' => 'required',
            'check_in' => 'required|valid_date',
            'check_out' => 'required|valid_date'
        ]);
    
        if (!$this->validate($validation)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        // Get user ID if logged in, otherwise set as null
        $userId = session()->has('user_id') ? session()->get('user_id') : null;
    
        // Create a new booking
        $bookingModel = new BookingModel();
        $data = [
            'user_id' => $userId, // Will be null if not logged in
            'room_id' => $this->request->getPost('room_id'),
            'check_in' => $this->request->getPost('check_in'),
            'check_out' => $this->request->getPost('check_out')
        ];
    
        $bookingModel->save($data);
        // Redirect or return success message
        return redirect()->to('/bookings')->with('success', 'Room booked successfully!');
    }
    
}
