<?php
if(isset($_GET)){
    $id = key($_GET);

    echo '


<div class="modal-dialog modal-dialog-centered" role="document" id="modalPerte">
    <form id="formPerte">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalRetrouveTitle">Signaler votre animal comme étant perdu ?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" id="bodyModalPerte">
        <p>Date de la disparition :</p>
            <input type="date" name="datePerte" class="mb-3"/>
            <label for="textAreaperte">Quelques précisions concernant le lieu ? L\'heure ?</label>
            <textarea class="form-control mb-3" name="precisionPerte" rows="3"></textarea>
            <p>Une fois la perte déclarée, votre animal sera affiché dans la section "Animaux perdus" visible en cliquant <a href="animaux-perdus.php">ici</a> , <br/> Les utilisateurs pourront avoir accès aux informations de contact présentes sur votre profil dans le cas ou ils auraient des informations ou peut-être apercu votre animal.</p>
        </div>
        <div class="modal-footer">
                <input type="hidden" name="idAnimalPerdu" value="'.$id.'"></input>
            <button type="button submit"  class="btn btn-primary lost">Signaler Perdu</button>
        </div>
    </div>
    </form>
</div>

         ';

}
?>

<script src="../../javascript/lostAnimal.js"></script>

