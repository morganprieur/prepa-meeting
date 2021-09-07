<?php 
// afficher les erreurs /!\ #devOnly /!\  ***
// error_reporting(E_ALL);
// ini_set("display_errors", 1);
// end #devOnly
?> 
<h2><?= esc($title) ?></h2>

<?php if (! empty($quartier) && is_array($quartier)) : ?>

    <?php foreach ($quartier as $quartier_item): ?>

        <h3><?= esc($quartier_item['nom_quartier']) ?></h3>

        <!-- div class="main">
            <?php /* esc($quartier_item['body']) */ ?>
        </div -->
        <p><?php if(!empty($quartier_item['slug'])) 
          echo '<a href="/gup/'.esc($quartier_item['slug'], 'url').'">View article</a>';
          ?>
        </p>
    <?php endforeach; ?>

<?php else : ?>

    <h3>Aucun quartier</h3>

    <p>Unable to find any news for you.</p>

<?php endif ?>