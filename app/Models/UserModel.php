<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['first_name','middle_name','last_name','avatar','cover_photo','email','password','is_verified', 'otp', 'title', 'date_of_birth', 'phone', 'nationality', 'country', 'State', 'city',
                                   'street_address', 'postal_code', 'Role','Gender','is_seen','id_type','id_number','reset_code','resete_code_expiration_time', 'Password'];
    public function getAllUsers() {
        return $this->db->table('users')
                        ->select('*') // Select all columns from the users table
                        ->where('role', 'Customers')
                        ->get()
                        ->getResultArray();
    }
    public function insertUnregisteredUser($data)
    {
        $this->db->table('Unregistered_User')->insert($data);
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
