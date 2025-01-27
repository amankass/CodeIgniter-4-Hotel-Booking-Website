<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';

    // Add the new columns to the $allowedFields array
    protected $allowedFields = [
        'user_id', 'accommodation_id', 'booking_date', 'check_in', 'check_out', 
        'number_of_guests', 'adults', 'children', 'account', 'child_age', 
        'total_price', 'status', 'created_at','is_seen','additional_fee','refund_fee','payment_status','paid_with','booking_expaired_at'
    ];

// Method to check availability
    public function checkAvailability($accommodation_id, $check_in, $check_out) {
        return $this->where('accommodation_id', $accommodation_id)
                    ->groupStart()
                        ->where('check_in <=', $check_out)
                        ->where('check_out >=', $check_in)
                    ->groupEnd()
                    ->countAllResults() == 0;
    }

// Method to fetch all bookings with joined accommodation and user details
// public function getAllBookings() {
//     return $this->db->table('bookings')
//                 ->select('bookings.*, accommodations.title, accommodations.room_type, accommodations.price, 
//                           COALESCE(users.name, Unregistered_User.name, "Unknown") as customer_name,
//                           COALESCE(users.email, Unregistered_User.email, "Unknown") as customer_email,
//                           COALESCE(users.phone, Unregistered_User.phone, "Unknown") as customer_phone,
//                           COALESCE(users.country, Unregistered_User.country, "Unknown") as customer_country,
//                           COALESCE(users.nationality, Unregistered_User.nationality, "Unknown") as customer_nationality,')
//                 ->join('accommodations', 'accommodations.id = bookings.accommodation_id', 'left')
//                 ->join('users', 'users.id = bookings.user_id', 'left')
//                 ->join('Unregistered_User', 'Unregistered_User.id = bookings.user_id', 'left')
//                 ->orderBy('bookings.created_at', 'DESC')
//                 ->get()
//                 ->getResultArray();
// }


    public function calculateTotalPrice($check_in, $check_out, $price) {
        // Convert dates to DateTime objects for calculation
        $checkInDate = new \DateTime($check_in);
        $checkOutDate = new \DateTime($check_out);
        // Calculate the difference in days
        $interval = $checkInDate->diff($checkOutDate);
        $days = $interval->days; // Get the number of days
        
        // Calculate total price
        return $days * $price;
    }
    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
