<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Daerah extends Model
{
    protected $table      = 'daerah';
    protected $primaryKey = 'daerah_id';
    protected $allowedFields = ['nama_daerah', 'slug_daerah', 'ongkos'];
}
