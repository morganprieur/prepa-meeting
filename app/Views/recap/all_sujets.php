


<?php 

echo '<div class="main row bg-silver">
<table class="table table-striped">
  <thead>
    <th scope="col">Identifiant</th>
    <th scope="col">Sujet</th>
    <th scope="col">Quartier</th>
    <th scope="col">Adresse approx.</th>
    <th scope="col">Déjà vu ? O/N</th>
    <th scope="col">Réponse (si Oui)</th>
    <th scope="col">Suivi (si Oui)</th>
    <th scope="col">Commentaire</th>
    <th scope="col">Résolu ? (à retirer)</th>
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
          <td>'. esc($sujets_item['adresse']) .'</td>
          <td class="text-center">'. esc($sujets_item['deja_vu']) .'</td>
          <td>'. esc($sujets_item['reponse']) .'</td>
          <td>'. esc($sujets_item['suivi']) .'</td>
          <td>'. esc($sujets_item['commentaire']) .'</td>
          <td class="text-center">'. esc($sujets_item['resolu']) .'</td>
          <td class="text-center">
            <a href="/sujet/'.esc($sujets_item['id'], 'url').'">Voir le sujet</a>
            
            <a class="btn btn-orange strike" href="#">&nbsp;Modifier&nbsp;</a>
          </td>
        </tr>';


    endforeach;

    echo '</tbody>
    </table>
  </div>';

else : 

    echo '<h3>Aucun sujet pour le moment</h3>

    <p>Unable to find any subjects for you.</p>';

endif;



// protected $id;
//   protected $constat;
//   protected $fk_quartier;
//   protected $adresse;
//   protected $deja_vu;
//   protected $reponse;
//   protected $suivi;
//   protected $commentaire;
//   protected $resolu;
