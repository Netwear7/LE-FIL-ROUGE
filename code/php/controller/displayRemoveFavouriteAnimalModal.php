<?php
session_start();

if(isset($_GET)){
    $id = key($_GET);

echo '

    <div class="modal-dialog modal-dialog-centered" role="document" id="modalRemoveFavourite">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalRetraitCenterTitle">Retirez l\'animal de vos favoris ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Celui-ci ne sera plus visible dans vos Animaux Favoris mais sera toujours visible sur le site !</p>
                <p class="mt-2">Confirmer le retrait ?</p>
            </div>
            <div class="modal-footer" id="footerRetraitFavoris">
                <form id="formRetrait">
                <button type="button" class="btn btn-outline-info" name="'.$_SESSION["user_id"].'" id="removeFavoris" value="'.$id .'">Confirmer le retrait</button>
                </form>
            </div>
        </div>
    </div>

     ';
}

?> 

<script src="../../javascript/removeFavouriteAnimal.js"></script>

