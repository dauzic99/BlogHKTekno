<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Meja extends Model
{
    protected $table      = 'meja';
    protected $primaryKey = 'meja_id';
    protected $allowedFields = ['nomor_meja', 'unique_key', 'qr'];
}
