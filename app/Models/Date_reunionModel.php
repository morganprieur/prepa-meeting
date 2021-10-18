<?php 

Namespace App\Models;

use CodeIgniter\Model;


class Date_reunionModel extends Model {

  protected $table = 'date_reunion'; 

  protected $allowedFields = [
    'date_reu'
  ];


  /**
   * get date réunion
   * select date_reunion.date_reu where id = 1 
   */
  public function getDate_reunion() {

    return $this->asArray()
                ->where(["id" => '1'])
                ->first();

  }

  public function update_date_reu(int $id = 1, array $date) {

    // echo '<br>'.__METHOD__.' $id : ';
    // var_dump($id);
    
    return $this->update(1, $date);
  }
  
}

