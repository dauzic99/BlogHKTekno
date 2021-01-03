<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_User extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['nama_lengkap', 'username', 'password', 'role_id', 'last_login_at', 'is_active'];
}
