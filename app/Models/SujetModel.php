<?php 

Namespace App\Models;

use CodeIgniter\Model;

class SujetModel extends Model {

  protected $table = 'sujet';

  public function getSujets($id = FALSE) {

    // $sujets = $this->join(
    //   'quartier', 
    //   'quartier.qu_id=sujet.fk_quartier')
    //                   ->asArray()
    //                   ->where(['sj_id' => $sj_id])
    //                   ->first();
    // join($table, $cond[, $type = ''[, $escape = null]])
    // Parameters:	

    //     $table (string) – Table name to join
    //     $cond (string) – The JOIN ON condition
    //     $type (string) – The JOIN type
    //     $escape (bool) – Whether to escape values and identifiers


    if($id == FALSE) {
      return $this->findAll();
    }

    // echo '<br>'.__METHOD__.' id : ';
    // var_dump($id);

    return $this->asArray()
                ->where(['id' => $id])
                ->first();
    // return $sujets;
  }

}


