<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_SecretMenu extends Model
{
    protected $table      = 'secret_menu';
    protected $primaryKey = 'secret_id';
    protected $allowedFields = ['nama_menu', 'slug_menu', 'deskripsi', 'harga', 'foto', 'secret_jenis_menu_id', 'created_at', 'updated_at'];
}
