<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_JenisMenu extends Model
{
    protected $table      = 'jenis_menu';
    protected $primaryKey = 'jenis_menu_id';
    protected $allowedFields = ['nama_jenis', 'slug_jenis'];
}
