<?php

namespace App\Models;

use CodeIgniter\Model;

class AccommodationModel1 extends Model
{
    protected $table            = 'accommodations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['user_id', 'title', 'content', 'image','price','amenities','floor_number','status', 'reserved_rooms','room_type','balcony','jacuzzi','has_lounge_area','bed_type','room_view','Room_Number','Least_Checkout_Date', 'created_at', 'updated_at','status'];
    public function searchAvailable($checkin, $checkout)
    {
        return $this->groupStart()
                    ->where('Least_Checkout_Date <=', $checkin)
                    ->orWhere('Least_Checkout_Date', null)
                    ->groupEnd()
                    ->groupBy('room_type')
                    ->findAll();
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
