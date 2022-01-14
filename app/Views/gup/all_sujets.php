
<!-- <h4 style="font-size: 1.5em; margin-top: 30px; color: silver" class="color-silver">< ?= // esc($docwork)  ? ></h4> -->


<?php 


if (! empty($sujets) && is_array($sujets)) : 

  // Exports 
  //  csv + pdf 
  // echo 
  //   '<div id="exports" class="actions-float text-center row">
  //     <a class="btn btn-orange col-md-4 offset-2" href="exportCSV">Export CSV</a>&nbsp;<a class="btn btn-orange col-md-4" href="exportPDF">Export PDF</a>
  //   </div>';

  //  csv seulement  
  echo 
    '<div id="exports" class="actions-float text-center row">
      <a class="btn btn-orange col-md-6 offset-3 col-sm-8 offset 2" href="exportCSV">Export CSV</a>
    </div>';


  //  tableau récap classé par ids 
  echo '<div class="main padtop40">
    <table class="table table-striped table-hover">
      <thead>
        <th scope="col">Ident.</th>
        <th scope="col">Sujet</th>
        <th scope="col">Quartier</th>
        <th scope="col">Adresse approx.</th>
        <th scope="col">Déjà vu ?<br>OUI / NON</th>
        <th scope="col">Réponse si Oui</th>
        <th scope="col">Suivi si Oui</th>
        <th scope="col">Commentaire</th>
        
        <th scope="col">Actions</th>
      </thead>
      <tbody>';

    foreach ($sujets as $sujets_item): 

      echo 
        '<tr>
          <td scope="row" class="id text-center">'.esc($sujets_item['id']).'</td>
          <td class="constat">'. esc($sujets_item['constat']) .'</td>
          <td class="quartier">'. esc($sujets_item['quartier']) .'</td>
          <td class="adresse">'. esc($sujets_item['adresse']) .'</td>
          <td class="deja_vu text-center">'. esc($sujets_item['deja_vu']) .'</td> 
          <td class="reponse">'. esc($sujets_item['reponse']) .'</td>
          <td class="suivi">'. esc($sujets_item['suivi']) .'</td>
          <td class="commentaire">'. esc($sujets_item['commentaire']) .'</td>
          
          <td class="text-center">
            <p>  
              <a class="btn btn-orange" href="/gup/'.esc($sujets_item['id'], 'url').'">Voir le sujet</a>
            </p>
            
          </td>
        </tr>'; 
        /**
         * <p>  
         *   <a class="btn btn-orange strike" href="#">&nbsp;Modifier&nbsp;</a>
         * </p>
         */

        //  <td class="text-center">'. esc($sujets_item['resolu']) .'</td> 
          

    endforeach;

    echo '</tbody>
    </table>
  </div>';

else : 

    echo '<h4 class="color-white">Aucun sujet pour le moment</h4>';
    

endif;

echo 
'<div id="new-subject" class="actions-float text-center row">
  <p class="btn btn-orange col-md-6 offset-3">
    <a href="/gup/new_subject"><i class="fas fa-plus"></i>&nbsp;
      Ajouter<br>
      un sujet
    </a>
  </p>
</div>';

/*  exemple button BS4 
    <button type="button" class="btn btn-primary">Primary</button>
*/

