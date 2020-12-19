<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard | WARJAM Admin Page'
		];
		echo view('admin/pages/dashboard/index', $data);
	}
}
