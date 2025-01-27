<?php

namespace App\Models;

use CodeIgniter\Model;
class UnregisteredUserModel extends Model
{
    protected $table = 'Unregistered_User';
    protected $allowedFields = ['title','first_name', 'middle_name','last_name','email', 'phone', 'date_of_birth', 'gender', 'nationality', 'country', 'state', 'city', 'street_address', 'postal_code', 'created_at','id_type','id_number'];
}