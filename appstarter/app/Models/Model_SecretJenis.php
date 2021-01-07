<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_SecretJenis extends Model
{
    protected $table      = 'secret_jenis_menu';
    protected $primaryKey = 'secret_jenis_menu_id';
    protected $allowedFields = ['nama_jenis', 'slug_jenis'];
}
