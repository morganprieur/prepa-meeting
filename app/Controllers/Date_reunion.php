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

  /**
   * Modifier la date :
   * 1er affichage : form vierge (todo : prérempli)
   * 2è affichage : si validations ok --> envoie au model pour mettre à jour la bdd 
   */
  public function modify_date(int $id = null) {  
 
    helper(['form', 'url']);
    
    $model = new Date_reunionModel();
    // echo '<br>'.__METHOD__.' $id : ';
    // var_dump($id);
    
    // $id = $this->request->getVar('id');
    
    $data = [
      'id' => $id, 
      'date_reu' => $this->request->getVar('date_reu'),
      'title' => 'Modifier la date de la Prochaine réunion GUP',
      'retour_title' => 'voir tous les sujets',
      'success' => 'La date a bien été modifiée'
    ];
    
    // echo '<br>'.__METHOD__.' $data : ';
    // var_dump($data);

    if($this->request->getMethod() === 'post' && $this->validate([
      'date_reu' => 'required|max_length[10]'
    ])) {
      $save = $model->update_date_reu($id,$data);
      
      echo view('templates/header', $data);
      echo view('statics/success', $data);
      // echo view('templates/retour', $data);
      echo view('templates/footer');

      // return redirect()->to( base_url('student') );

    } else {

      echo view('templates/header', $data);
      echo view('gup/modifier_date', $data);
      echo view('templates/retour', $data);
      echo view('templates/footer');

    }  
  }

}
