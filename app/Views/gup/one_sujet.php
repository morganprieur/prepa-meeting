
<!-- <h4 style="font-size: 1.5em; margin-top: 30px; color: silver" class="color-silver">
  <?= esc($docwork) ?>
</h4> -->

<!-- <h3 class="padtop40 color-white"><?= esc($title) ?></h3> -->

<?php 

if (! empty($sujet)) : 

        echo '<div class="main one padtop40">
          <p>
          <span class="color-silver">quartier :</span> <span class="color-white">'. esc($sujet['quartier']) .'</span><br>
          <span class="color-silver">adresse approximative :</span> <span class="color-white">'. esc($sujet['adresse']) .'</span><br>
          <span class="color-silver">déjà vu ?</span> <span class="color-white">'. esc($sujet['deja_vu']) .'</span><br>
          <span class="color-silver">réponse précédente :</span> <span class="color-white">'. esc($sujet['reponse']) .'</span><br>
          <span class="color-silver">suivi ?</span> <span class="color-white">'. esc($sujet['suivi']) .'</span><br>
          <span class="color-silver">commentaire :</span> <span class="color-white">'. esc($sujet['commentaire']) .'</span><br>
          <span class="color-silver">résolu ? (à ne pas afficher, sert seult à trier les archives) :</span> <span class="color-white">'
          . esc($sujet['resolu']) .'</span><br>
        </div>';


else : 

    echo '<h3>Aucun sujet pour le moment</h3>';

    // <p>Unable to find any subjects for you.</p>';

endif;




