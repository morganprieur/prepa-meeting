<?php 

echo '<div class="main one padtop40 color-silver">';

echo \Config\Services::validation()->listErrors();

// echo '<br>'.__METHOD__.' $id : ';
// var_dump($id);

echo 
  '<form action="'.base_url("gup/modifier_date/".$id).'" method="post">'
    . csrf_field() . 

    '<div class="row mb-3">
        <div class="form-group col-md-12">
            <label class="form-label" for="date_reu">Date&nbsp; </label>
            <input class="form-control" type="text" name="date_reu" />
        </div>
    </div>


    
    <div class="row mb-3">
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-warning center" name="submit">Enregistrer</button>
        </div>
    </div>


  </form>

</div>';






