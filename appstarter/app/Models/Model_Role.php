<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Role extends Model
{
    protected $table      = 'role';
    protected $primaryKey = 'role_id';
    protected $allowedFields = ['nama_role'];
}
