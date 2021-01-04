<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Contact extends Model
{
    protected $table      = 'contact';
    protected $primaryKey = 'contact_id';
    protected $allowedFields = ['alamat', 'no_telp', 'gmaps', 'facebook', 'twitter', 'youtube', 'instagram', 'email'];
}
