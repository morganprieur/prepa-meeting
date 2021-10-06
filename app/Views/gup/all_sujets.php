
<h4 style="font-size: 1.5em; margin-top: 30px; color: silver" class="color-silver"><?= esc($docwork) ?></h4>

<h3 class="padtop40 color-white"><?= esc($title) ?></h3>
      
<a href="export">Export</a>

<?php 
//   row bg-silver
echo '<div class="main padtop40">
<table class="table table-striped table-hover">
  <thead>
    <th scope="col">Identifiant</th>
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

  //  <th scope="col">Résolu ?<br>(à retirer)</th> 

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
          
          <td class="text-center">
          <p>  
            <a class="btn btn-orange" href="/gup/'.esc($sujets_item['id'], 'url').'">Voir le sujet</a>
          </p>
          <p>  
            <a class="btn btn-orange strike" href="#">&nbsp;Modifier&nbsp;</a>
          </p>
          </td>
        </tr>';

        //  <td class="text-center">'. esc($sujets_item['resolu']) .'</td> 
          

    endforeach;

    echo '</tbody>
    </table>
  </div>';

else : 

    echo '<h3>Aucun sujet pour le moment</h3>

    <p>Unable to find any subjects for you.</p>';
    

endif;

echo 
'<div class="actions-float text-center row">
  <p class="btn btn-orange col-md-5">
    <a href="/gup/new_subject"><i class="fas fa-plus"></i>&nbsp;
      Enregistrer<br>un sujet</a>
    </p>

</div>';

/*  exemple button BS4 
    <button type="button" class="btn btn-primary">Primary</button>
*/

