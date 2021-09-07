<?php 

namespace App\Controllers;

use App\Models\SujetModel;
use CodeIgniter\Controller;

class Sujet extends Controller {

  public function index() {
    $sujet_model = new SujetModel();
    

    $data = [
      'sujets' => $sujet_model->getSujets(),
      'title' => 'Tous les sujets'
    ];

    echo view('templates/header', $data);
    echo view('recap/all_sujets', $data);
    echo view('templates/footer', $data);
  }

  public function view($id = null) {
        $sujet_model = new SujetModel();
        // $quartier_model = new QuartierModel();

        $data['sujet'] = $sujet_model->getSujets($id);
        // $data['sujet']['quartier'] = $quartier_model->getQuartiers($data['sujet']['fk_quartier']);

        if(empty($data['sujet'])) {
          throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the subject: '.$id);
        }
        $data['title'] = $data['sujet']['id'].' '.$data['sujet']['constat'];
        
        echo view('templates/header', $data);
        echo view('one_sujet.php', $data);
        echo view('templates/footer', $data);
    }

}



