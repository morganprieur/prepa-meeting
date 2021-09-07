


<?php 
if (! empty($sujet)) : 

        echo '<div class="main">
          <p>
          quartier : '. esc($sujet['quartier']) .'<br>
          adresse approximative : '. esc($sujet['adresse']) .'<br>
          déjà vu ? '. esc($sujet['deja_vu']) .'<br>
          réponse précédente : '. esc($sujet['reponse']) .'<br>
          suivi ? : '. esc($sujet['suivi']) .'<br>
          commentaire : '. esc($sujet['commentaire']) .'<br>
          résolu ? (à ne pas afficher, sert seult à trier les archives) '. esc($sujet['resolu']) .'<br>
        </div>';


else : 

    echo '<h3>Aucun sujet pour le moment</h3>

    <p>Unable to find any subjects for you.</p>';

endif;



