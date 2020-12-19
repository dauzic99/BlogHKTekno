<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Menu extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'menu_id';
    protected $allowedFields = ['nama_menu', 'slug_menu', 'deskripsi', 'harga', 'foto', 'jenis_menu_id', 'created_at', 'updated_at'];
}
