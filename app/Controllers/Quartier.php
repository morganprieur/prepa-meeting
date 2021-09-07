<?php

namespace App\Controllers;

use App\Models\QuartierModel;
use CodeIgniter\Controller;

class Quartier extends Controller {
    public function index() {
        $model = new QuartierModel();

        $data = [
          'quartier' => $model->getQuartiers(),
          'title' => 'Tous les quartiers'
        ];

        echo view('templates/header', $data);
        echo view('recap/all_quartiers.php', $data);
        echo view('templates/footer', $data);
    }

    // public function view($qu_id = null) {
    //     $model = new QuartierModel();

    //     $data['quartier'] = $model->getQuartier($qu_id);

    //     if(empty($data['quartier'])) {
    //       throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the dept: '.$slug);
    //     }
    //     $data['title'] = $data['quartier']['nom_quartier'];
        
    //     echo view('templates/header', $data);
    //     echo view('recap/all_quartiers.php', $data);
    //     echo view('templates/footer', $data);
    // }
}
