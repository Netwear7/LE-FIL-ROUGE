<?php


if(isset($_POST))
{
    $id= $_POST["id"];
    $idPhoto = $_POST["idPhoto"];
    
    if(empty($id) || empty($idPhoto)){
        exit;
    }else {
        echo '

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalRetraitCenterTitle">Êtes vous sûr de vouloir retirer la News?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>En cliquant sur le bouton ci-dessous vous confirmez le retrait de la News</p>
                    <p class="mt-2">Confirmer le retrait ?</p>
                </div>
                <div class="modal-footer" id="footerRetraitNews">
                <div id="loaderRemoveNews" style="display: none"></div>
                    <form >
                        <button type="button" id="removeNews" name="'.$idPhoto.'" value="'.$id.'"  class="btn btn-outline-info">Confirmer le retrait</button>
                    </form>
                </div>
            </div>
        </div>
    
         ';
    }
}


?>

<script src="../../javascript/accueil/removeNews.js"></script>