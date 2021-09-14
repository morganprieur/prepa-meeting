


<?php 

echo '<div class="main row bg-silver padtop40">
<table class="table table-striped">
  <thead>
    <th scope="col">Identifiant</th>
    <th scope="col">Sujet</th>
    <th scope="col">Quartier</th>
    <th scope="col">Adresse approx.</th>
    <th scope="col">Déjà vu ?<br>OUI / NON</th>
    <th scope="col">Réponse si Oui</th>
    <th scope="col">Suivi si Oui</th>
    <th scope="col">Commentaire</th>
    <th scope="col">Résolu ?<br>(à retirer)</th>
    <th scope="col">Actions</th>
  </thead>
  <tbody>';


if (! empty($sujets) && is_array($sujets)) : 

    foreach ($sujets as $sujets_item): 

      echo 
        '<tr>
          <td scope="row" class="text-center">'.esc($sujets_item['id']).'</td>
          <td>'. esc($sujets_item['constat']) .'</td>
          <td>'. esc($sujets_item['quartier']) .'</td>
          <td>'. esc($sujets_item['adresse']) .'</td>';
          if($sujets_item['deja_vu'] == '0') 
            echo '<td class="text-center">NON</td>';
          else 
            echo '<td class="text-center">OUI</td>';
            //'<td class="text-center">OUI'.  $sujets_item['deja_vu'] == 1 ? $sujets_item['deja_vu'] == 0 .'</td>
      echo 
          '<td>'. esc($sujets_item['reponse']) .'</td>
          <td>'. esc($sujets_item['suivi']) .'</td>
          <td>'. esc($sujets_item['commentaire']) .'</td>
          <td class="text-center">'. esc($sujets_item['resolu']) .'</td>
          <td class="text-center">
          <p>  
            <a class="btn btn-orange" href="/gup/'.esc($sujets_item['id'], 'url').'">Voir le sujet</a>
          </p>
          </td>
        </tr>';

        /** exemple button BS4 
         *           <p>  
          *  <a class="btn btn-orange strike" href="#">&nbsp;Modifier&nbsp;</a>
          * </p>
         */

    endforeach;

    echo '</tbody>
    </table>
  </div>';

else : 

    echo '<h3>Aucun sujet pour le moment</h3>

    <p>Unable to find any subjects for you.</p>';

endif;

echo 
'<div class="actions text-center">
  <p class="btn btn-orange">
    <a href="/gup/new_subject">Ajouter un sujet</a>
  </p>

  <button type="button" class="btn btn-primary">Primary</button>
</div>';


