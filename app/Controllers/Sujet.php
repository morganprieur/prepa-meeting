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
    echo view('gup/all_sujets', $data);
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
    echo view('gup/one_sujet', $data);
    echo view('templates/retour', $data);
    echo view('templates/footer', $data);
  }

  public function create() { 
    $sujet_model = new SujetModel();

    if ($this->request->getMethod() === 'post' && $this->validate([
        // 'title' => 'required|min_length[3]|max_length[255]',
        // 'body'  => 'required',
        'constat' => 'required|max_length[240]'
    ])) {
        $sujet_model->save([
            'constat' => $this->request->getPost('constat'),
            // 'slug'  => url_title($this->request->getPost('title'), '-', true),
            'quartier'  => $this->request->getPost('quartier'),
            'adresse'  => $this->request->getPost('adresse'),
            'deja_vu'  => $this->request->getPost('deja_vu'),
            'reponse'  => $this->request->getPost('reponse'),
            'suivi'  => $this->request->getPost('suivi'),
            'commentaire'  => $this->request->getPost('commentaire'),
            'resolu'  => $this->request->getPost('resolu')
        ]);

        echo view('statics/success');
        echo view('templates/retour');

    } else {
        echo view('templates/header', ['title' => 'Ajouter un sujet']);
        echo view('gup/new_subject');
        echo view('templates/retour');
        echo view('templates/footer');
    }
  }

}



