<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		$data = [
			'title' => 'Bienvenue sur cette page'

		];

		return view('templates/header', $data);
		return view('welcome');
		return view('templates/footer');
	}
}
