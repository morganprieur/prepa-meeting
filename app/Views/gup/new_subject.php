<?php 

echo '<div class="main one padtop40 color-silver">';

\Config\Services::validation()->listErrors();

echo 
'<form action="/gup/new_subject" method="post">'
    . csrf_field() . 

    '<div class="row mb-3">
        <div class="form-group col-md-12">
            <label class="form-label" for="constat">Constat&nbsp; (brièvement)&nbsp;</label>
            <input class="form-control" type="input" name="constat" />
        </div>
    </div>


    <div class="row mb-3">
        <div class="form-group col-md-12">
            <label class="form-label" for="quartier">Quartier : &nbsp; </label><br>
            <select class="form-select" name="quartier" id="quartier">
                <option value="">Choisir</option>
                <option value="SAB">Sabatot</option>
                <option value="CEN">Centre ancien</option>
                <option value="Les deux">Les deux</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col-md-12">
            <label class="form-label" for="adresse">Adresse approximative&nbsp;</label>
            <input class="form-control" type="input" name="adresse" />
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col-md-12">
            <label class="form-label" for="commentaire">Commentaire&nbsp;</label><br>
            <textarea rows="6" name="commentaire"></textarea>
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group col-md-12">
            <label class="form-label" for="deja_vu">Déjà vu ?&nbsp;</label><br>
            <select class="form-select" name="deja_vu" id="deja_vu">
                <option value="NON">NON</option>
                <option value="OUI">OUI</option>
            </select>
        </div>
    </div>

    <div class="row">
        <p class="col-md-2">Si oui : </p>
        <div class="col-md-10">
            <div class="row mb-3">
                <div class="form-group col-md-12">
                    <label class="form-label" for="reponse">Réponse&nbsp;</label>
                    <textarea rows="6" name="reponse"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="form-group col-md-12">
                    <label class="form-label" for="suivi">Suivi&nbsp;</label>
                    <textarea rows="6" name="suivi"></textarea>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="resolu" value="0" />
    
    <div class="row mb-3">
        <div class="form-group col-md-12">
        <button type="submit" class="btn btn-warning center" name="submit">Enregistrer</button>
        </div>
    </div>


</form>

</div>';

/*
<div class="row mb-3">
    <div class="form-group col-md-12">
        <label class="form-label" for="deja_vu">Déjà vu ?&nbsp;</label>
        <input class="form-control" type="input" name="deja_vu" />
    </div>
</div>
*/



