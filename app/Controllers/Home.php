<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		$data = [
			'title' => 'Bienvenue sur cette page',
			'retour_title' => 'Voir la liste des sujets'
		];

		
		echo view('templates/header', $data);
		echo view('templates/travaux');
		echo view('welcome', $data);
		echo view('templates/retour', $data);
		echo view('templates/footer', $data);
	}
}
