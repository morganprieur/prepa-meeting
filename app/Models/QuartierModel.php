<?php

namespace App\Models;

use CodeIgniter\Model;

class QuartierModel extends Model
{
    protected $table = 'quartier';

    public function getQuartiers($slug=false) {
        if($slug==false) {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['qu_id'=>$qu_id])
                    ->first();
    }


}



