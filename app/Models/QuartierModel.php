<?php

namespace App\Models;

use CodeIgniter\Model;

class QuartierModel extends Model
{
    protected $table = 'quartier';

    public function getQuartier($slug=false) {
        if($slug==false) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug'=>$smug])
                    ->first();
    }


}



