<?php 

echo '<div class="main one padtop40 color-silver text-center">';

\Config\Services::validation()->listErrors();

echo 
'<form action="/gup/new_subject" method="post">'
    . csrf_field() . 

    '<p>
    <label for="constat">Constat</label>
    <input type="input" name="constat" />
    </p>

    <p>
    <label for="quartier">Quartier</label>
    <input type="input" name="quartier" />
    <p>

    <p>
    <label for="constat">Adresse approximative</label>
    <input type="input" name="constat" />
    <p>

    <p>
    <label for="deja_vu">Déjà vu ? </label>
    <input type="input" name="deja_vu" />
    <p>

    <p>
    <label for="reponse">Si oui : réponse </label>
    <input type="input" name="reponse" />
    <p>

    <p>
    <label for="suivi">Si oui : suivi </label>
    <input type="input" name="suivi" />
    <p>

    <p>
    <label for="commentaire">Commentaire</label>
    <textarea name="commentaire"></textarea>
    <p>

    <p>
    <label for="resolu">Résolu ? </label>
    <input type="input" name="resolu" />
    <p>

    <p>
    <input type="submit" name="submit" value="Enregistrer" />
    <p>
</form>

</div>';



