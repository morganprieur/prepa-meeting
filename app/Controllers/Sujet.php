<?php 

namespace App\Controllers;

//  class Controller
use CodeIgniter\Controller;
//  Model des sujets 
use App\Models\SujetModel;

class Sujet extends Controller {

  /**
   * Page récap des sujets dans un tableau
   * url : /gup
   */
  public function index() {
    $sujet_model = new SujetModel();
    
    $data = [
      'sujets' => $sujet_model->getSujets(),
      'title' => 'Tous les sujets',
      'docwork' => 'Document de travail'
    ];

    echo view('templates/header', $data);
    echo view('gup/all_sujets', $data);
    echo view('templates/footer', $data);
  }


  /**
   * Affichage d'1 sujet, en colonne
   * url : /gup/{id}
   */
  public function view($id = null) {
    $sujet_model = new SujetModel();
    // $quartier_model = new QuartierModel();

    $data = [
      'sujet' => $sujet_model->getSujets($id),
      'retour_title' => 'Retour liste des sujets',
      'docwork' => 'Document de travail'
    ];
    // $data['sujet']['quartier'] = $quartier_model->getQuartiers($data['sujet']['fk_quartier']);

    if(empty($data['sujet'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the subject: '.$id);
    }
    $data['title'] = $data['sujet']['id'].' - '.$data['sujet']['constat'];
    
    echo view('templates/header', $data);
    echo view('gup/one_sujet', $data);
    echo view('templates/retour', $data);
    echo view('templates/footer', $data);
  }


  /** 
   * Formulaire d'ajout d'un sujet : formulaire 
   * url : /gup/new_subject
   */
  public function create() { 
    $sujet_model = new SujetModel();

    $data = [
      'title' => 'Ajouter un sujet',
      'retour_title' => 'Retour liste des sujets',
      'success' => 'Le sujet a bien été enregistré'
    ];

    //  Si les données du formulaire sont validées, les envoyer au modèle et afficher la page de succès
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
            'commentaire'  => $this->request->getPost('commentaire'),
            'deja_vu'  => $this->request->getPost('deja_vu'),
            'reponse'  => $this->request->getPost('reponse'),
            'suivi'  => $this->request->getPost('suivi'),
            'resolu'  => $this->request->getPost('resolu')
        ]);

        echo view('templates/header', $data);
        echo view('statics/success', $data);
        // echo view('templates/retour', $data);
        echo view('templates/footer');

        //  sinon afficher le formulaire 
    } else {
        echo view('templates/header', $data);
        echo view('gup/new_subject');
        echo view('templates/retour', $data);
        echo view('templates/footer');
    }
  }


  /**
   * export de tous les sujets en cours (hors photos) en csv
   */
  public function exportCSV() {

    // header('Content-type: text/csv');
    // header('Content-Disposition: attachment; filename="' . 'export_'.$object.'_'.date('Y-m-d_H-i-s').'.csv' . '"');

    //  exemple
    $filename = 'sujets_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachement; filename=$filename");
    header("Content-Type: application/csv;");
    //  fin exemple 

    // get data 
    // 'sujet' => $sujet_model->getSujets($id)
    $sujets = new SujetModel();
    $sujetsData = $sujets->select('*')->findAll();

    //  file creation 
    $file = fopen('php://output', 'W');
    // $file = fopen('/assets/exports', 'W');

    $header = array("Identifiant", 
                    "Sujet", 
                    "Quartier", 
                    "Adresse approx.", 
                    "Déjà vu ?", 
                    "Réponse si Oui", 
                    "Suivi si Oui", 
                    "Commentaire");
    fputcsv($file, $header);
    foreach($sujetsData as $key=>$line) {
      fputcsv($file, $line);
    }
    fclose($file);
    exit;

  }


}



