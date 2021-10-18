<?php 

Namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Date_reunionModel;




class Date_reunion extends controller {

  public function date_reu() {

    $date_reu_model = new Date_reunionModel();

    $data = [
      'date' => $date_reu_model->getDate_reunion(),
      'title' => 'Date de la réunion GUP',
      'retour_title'=> 'Liste des sujets'
    ];

    echo view('gup/date', $data);

  }

  
  public function modify_date() {  
 
    helper(['form', 'url']);
    
    $model = new Date_reunionModel();
    
    // $id = $this->request->getVar('segment');

    // echo '<br>'.__METHOD__.' $_GET : ';
    // var_dump($_GET);
    // echo '<br>'.__METHOD__.' $_SERVER["REQUEST_URI""] : ';
    // var_dump($_SERVER['REQUEST_URI']);
    // echo '<br>'.__METHOD__.' $_POST : ';
    // var_dump($_POST);
    // echo '<br>'.__METHOD__.' $id : ';
    // var_dump($id);
    
    $data = [
      'date_from_db' => $model->getDate_reunion(),
      'title' => 'Modifier la date',
      'retour_title' => 'Retour liste des sujets',
      'success' => 'La date a bien été modifiée',
      'date_reu' => $this->request->getVar('date_reu')
      // 'mobile'  => $this->request->getVar('txtMobile'),
    ];

    //  Si les données sont validées : les envoyer au modèle et afficher la page de succès
    if($this->request->getMethod() === 'post' && $this->validate([
      'date_reu' => 'required|max_length[10]'
    ])) {
      // $save = $model->update_date_reu($id, $data);
      $save = $model->update_date_reu(1, $data);
      var_dump($this->request->getPost('date_reu'));
      // $date_reu_model->update_date_reu(1, [
      //   'date_reu' => $this->request->getPost('date_reu')
      // ]);
      
      echo view('templates/header', $data);
      echo view('statics/success', $data);
      // echo view('templates/retour', $data);
      echo view('templates/footer');

    } else {

      echo view('templates/header', $data);
      echo view('gup/modifier_date', $data);
      echo view('templates/retour', $data);
      echo view('templates/footer');

    }
    
    // return redirect()->to( base_url('student') );
  }

}
