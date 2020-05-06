<?php

if(isset($_GET)){
    $id = key($_GET);

echo '

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRetraitCenterTitle">Êtes vous sûr de vouloir retirer la fiche?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>En cliquant sur le bouton ci-dessous vous confirmez le retrait de la fiche animale de vos fiches. Une fois l\'action validée, la fiche ne sera plus disponible</p>
                <p class="mt-2">Confirmer le retrait ?</p>
            </div>
            <div class="modal-footer">
                <form id="formRetraitFavoris">
                    <input type="hidden" name="idAnimalRetrait" value="'.$id .'"></input>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button type="button submit"  class="btn btn-outline-info" name="removeUserAnimal" value="'.$id .'">Confirmer le retrait</button>
                </form>
            </div>
        </div>
    </div>

     ';
}
