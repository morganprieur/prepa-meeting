<?php 

Namespace App\Models;

use CodeIgniter\Model;

class SujetModel extends Model {

  protected $table = 'sujet';

  protected $allowedFields = [
    'constat', 
    'quartier', 
    'adresse', 
    'commentaire', 
    'deja_vu', 
    'reponse', 
    'suivi', 
    'resolu'
  ];

  /**
   * Select from sujet 
   * Si $id : récupère ce sujet, sinon récupère tous les sujets
   * --> controller 
   *      Sujet::index
   *      Sujet::view
   */
  public function getSujets($id = FALSE) {

    if($id == FALSE) {
      $sujets = $this->findAll();

      // $i;
      $sujets_actifs = array();
      for($i = 0; $i < count($sujets); $i++) {
        if($sujets[$i]['resolu'] == '0') {
          $sujets_actifs[] = $sujets[$i]; 
        }
      }
        return $sujets_actifs; 
    }

    return $this->asArray()
                ->where(['id' => $id])
                ->first();

    /**************** DOC À VOIR : PASSER LES RÉSULTATS SOUS FORME D'OBJETS **************************/
    // Return as standard objects
    // $users = $userModel->asObject()->where('status', 'active')->findAll();

    // Return as custom class instances
    // $users = $userModel->asObject('User')->where('status', 'active')->findAll();
    /**************** FIN DOC ************************************************************************/
  }

  /**
   * insert into sujet 
   * Enregistrer un nouveau sujet
   * --> controller
   *      Sujet::create
   */
  public function setSujet() {  //  id=FALSE 

    $data = [
      'constat' => $constat,
      'quartier' => $quartier,
      'adresse' => $adresse,
      'commentaire' => $commentaire,
      'deja_vu' => $deja_vu,
      'reponse' => $reponse,
      'suivi' => $suivi,
      'resolu' => $resolu
    ];

    //  voir la doc : 
    return $this->insert($data);
  }
}

// echo '<br>'.__METHOD__.' $sujets[$i] : ';
// var_dump($sujets[$i]);




