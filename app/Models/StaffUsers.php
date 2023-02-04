<?php

namespace App\Models;

use CodeIgniter\Model;

class StaffUsers extends Model
{
    protected $table = 'staff_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'user_id',
        'name',
        'role',
        'created_at'
    ];
}
