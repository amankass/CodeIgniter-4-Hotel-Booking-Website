<?php

namespace App\Controllers;

use App\Models\AccommodationModel;
use CodeIgniter\Controller;
use App\Models\AccommodationModel1;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Accommodation extends BaseController
{
    protected $accommodationModel1;
    public function __construct()
    {
        // Initialize the accommodationModel1
        $this->accommodationModel1 = new AccommodationModel1();
    }
    public function create()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/auth')->with('fail', 'You must log in first.');
        }
        return view('accommodation/create');
    }
    public function index()
    {
        // Retrieve distinct accommodations by room type
        $accommodations = $this->accommodationModel1
            ->select('*')
            ->groupBy('room_type')
            ->findAll();
        // Pass the accommodations data and a flag indicating it's all accommodations
        return view('accommodation/index', ['accommodations' => $accommodations, 'isAll' => true]);
    }
    //Search Functionality Controller 
    public function search()
    {
        $checkin = $this->request->getGet('checkin');
        $checkout = $this->request->getGet('checkout');
        if (!$checkin || !$checkout) {
            return redirect()->back()->with('error', 'Please select both check-in and check-out dates.');
        }
        $accommodationsModel = new AccommodationModel1();
        $accommodations = $accommodationsModel->searchAvailable($checkin, $checkout);
        return view('accommodation/index', [
            'accommodations' => $accommodations,
            'checkin' => $checkin,
            'checkout' => $checkout,
        ]);
    }
    public function filterByType($room_type)
    {
        // Retrieve accommodations based on the selected room type
        $accommodations = $this->accommodationModel1->where('room_type', $room_type)->findAll();
        // Pass the filtered accommodations data to the view
        return view('accommodation/index', ['accommodations' => $accommodations]);
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
            return view('Admin/Add_Room', ['validation' => $this->validator]);
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
        return redirect()->to('Admin/Add_Room')->with('success', 'Accommodation created successfully.');
    }

    public function edit($id)
    {
        $accommodation = $this->accommodationModel1->find($id);
        if (!$accommodation) {
            return redirect()->back()->with('fail', 'Accommodation not found.');
        }
        return view('accommodation/edit', ['accommodation' => $accommodation]);
    }

    public function delete_image()
    {
        // Decode the JSON input and check for 'image_path'
        $json = $this->request->getJSON(true); // true to decode as associative array
        $imagePath = $json['image_path'] ?? null; // Use null coalescing to avoid undefined index
        // Check if image path is provided
        if (!$imagePath) {
            return $this->response->setJSON(['success' => false, 'message' => 'Image path not provided.']);
        }
        // Retrieve accommodation ID and validate it
        $accommodationId = $json['accommodation_id'] ?? null;
        if (!$accommodationId) {
            return $this->response->setJSON(['success' => false, 'message' => 'Accommodation ID not provided.']);
        }
        // Find accommodation record
        $accommodation = $this->accommodationModel1->find($accommodationId);
        if ($accommodation) {
            // Decode existing images
            $images = json_decode($accommodation['image'], true);
            // Remove the image from the array if it exists
            if (($key = array_search($imagePath, $images)) !== false) {
                unset($images[$key]);
            }
            // Update the database with the new image list
            $this->accommodationModel1->update($accommodationId, [
                'image' => json_encode(array_values($images)) // Re-index and encode to JSON
            ]);
            // Delete the file from server if it exists
            $fullImagePath = FCPATH . $imagePath;
            if (file_exists($fullImagePath)) {
                unlink($fullImagePath);
            }
            return $this->response->setJSON(['success' => true, 'message' => 'Image deleted successfully.']);
        }
        return $this->response->setJSON(['success' => false, 'message' => 'Accommodation not found.']);
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
        return redirect()->to('/Admin/View_AllRooms')->with('success', 'Accommodation updated successfully.');
    }
    public function delete($id)
    {
        $this->accommodationModel1->delete($id);
        return redirect()->back()->with('success', 'Accommodation deleted successfully.');
    }
}
