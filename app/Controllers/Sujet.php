<?php 

namespace App\Controllers;

//  class Controller
use CodeIgniter\Controller;
//  Model des sujets 
use App\Models\SujetModel;
use App\Models\Date_reunionModel;

use App\Controllers\Date_reunion;

class Sujet extends Controller {

  /**
   * Page récap des sujets dans un tableau
   * url : /gup
   */
  public function index() {
    $sujet_model = new SujetModel();
    $date_control = new Date_reunion();
    
    $data = [
      'sujets' => $sujet_model->getSujets(),
      'title' => 'Tous les sujets'
    ];

    echo view('templates/header', $data);
    $date = [
      'date_reu' => $date_control->date_reu()
    ];
    // echo view('gup/date', $date);
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
   * Modifier un sujet :
   * 1er affichage : form vierge (todo : prérempli)
   * 2è affichage : si validations ok --> envoie au model pour mettre à jour la bdd 
   */
  public function modify_subj(int $id = null) {  
 
    helper(['form', 'url']);
    
    $sujet_model = new SujetModel();
    // echo '<br>'.__METHOD__.' $id : ';
    // var_dump($id);
    
    // $id = $this->request->getVar('id');

    // if ($this->request->getMethod() === 'post' && $this->validate([
    //   // 'title' => 'required|min_length[3]|max_length[255]',
    //   // 'body'  => 'required',
    //   'constat' => 'required|max_length[240]'
    // ])) {
    //   $sujet_model->save([
          
    //   ]);
    
    $data = [
      'sujet' => $sujet_model->getSujets($id),
      'id' => $id, 
      // 'date_reu' => $this->request->getVar('date_reu'),
      'title' => 'Modifier',
      'retour_title' => 'voir tous les sujets',
      'success' => 'Le sujet a bien été modifié', 
      'constat' => $this->request->getPost('constat'),
      // 'slug'  => url_title($this->request->getPost('title'), '-', true),
      'quartier'  => $this->request->getPost('quartier'),
      'adresse'  => $this->request->getPost('adresse'),
      'commentaire'  => $this->request->getPost('commentaire'),
      'deja_vu'  => $this->request->getPost('deja_vu'),
      'reponse'  => $this->request->getPost('reponse'),
      'suivi'  => $this->request->getPost('suivi'),
      'resolu'  => $this->request->getPost('resolu')
    ];
    
    // echo '<br>'.__METHOD__.' $data : ';
    // var_dump($data);

    if($this->request->getMethod() === 'post' && $this->validate([
      // 'title' => 'required|min_length[3]|max_length[255]',
      // 'body'  => 'required',
      'constat' => 'required|max_length[240]'
    ])) {
      $save = $model->update_sujet($id, $data);
      
      echo view('templates/header', $data);
      echo view('statics/success', $data);
      // echo view('templates/retour', $data);
      echo view('templates/footer');

      // return redirect()->to( base_url('student') );

    } else {

      echo view('templates/header', $data);
      echo view('gup/modifier_sujet', $data);
      echo view('templates/retour', $data);
      echo view('templates/footer');

    }  
  }


  /**
   * export de tous les sujets en cours (hors photos) en csv
   */
  public function exportCSV() {

    //  nom du fichier + date 
    $filename = 'sujets_'.date('Ymd').'.csv';
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachement; filename=$filename");
    header("Content-Type: application/csv;");

    
    $date_model = new Date_reunionModel();

    $data = [
      'date_reu' => $date_model->getDate_reunion()
    ];
    
    // $date_today = date('d-m-Y');
    // $date_form = str_replace('-', '/', $date_today);

    $file = fopen('php://output', 'a+');
    // $file = fopen('/assets/exports', 'a');

    //  Titre page :
    $line_title = 'Réunion GUP du '.$data['date_reu']['date_reu']; 
    $file_title = array($line_title, ' ', ' ', ' ', ' ', ' ', ' ', ' ');
    fputcsv($file, $file_title);

    //  get sujets 
    $sujets = new SujetModel();
    $sujetsDejaVus = $sujets->select('id, constat, quartier, adresse, deja_vu, reponse, suivi, commentaire')->findAll();
    $sujetsNouveaux = $sujets->select('id, constat, quartier, adresse, deja_vu, commentaire')->findAll();

    //  ligne vide 
    $empty_line = array(" ", " ", " ", " ", " ", " ", " ", " ");

    fputcsv($file, $empty_line);

    $header_deja_vu = array("Identifiant", 
                    "Sujet", 
                    "Quartier", 
                    "Adresse approx.", 
                    "Déjà vu ?", 
                    "Réponse", 
                    "Suivi", 
                    "Commentaire");
    fputcsv($file, $header_deja_vu);
    foreach($sujetsDejaVus as $key=>$line) {
      if($line["deja_vu"] == ('OUI')) {
        if($line["quartier"] == 'SAB')
          fputcsv($file, $line);
      }
    }
    foreach($sujetsDejaVus as $key=>$line) {
      if($line["deja_vu"] == ('OUI')) {
        if($line["quartier"] == 'CEN')
          fputcsv($file, $line);
      }
    }

    fputcsv($file, $empty_line);

    $header_new_subject = array("Identifiant", 
                    "Sujet", 
                    "Quartier", 
                    "Adresse approx.", 
                    "Déjà vu ?", 
                    "Commentaire");
    fputcsv($file, $header_new_subject);
    foreach($sujetsNouveaux as $key=>$line) {
      if($line["deja_vu"] == 'NON') {
        if($line["quartier"] == 'SAB')
          fputcsv($file, $line);
      }
    }
    foreach($sujetsNouveaux as $key=>$line) {
      if($line["deja_vu"] == 'NON') {
        if($line["quartier"] == 'CEN')
          fputcsv($file, $line);
      }
    }

    fclose($file);
    exit;

  }


}

