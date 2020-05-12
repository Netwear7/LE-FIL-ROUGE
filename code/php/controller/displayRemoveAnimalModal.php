<?php


if(isset($_POST))
{
    $id=$_POST["id"];
    $couleur=$_POST["couleur"];
    if(empty($id) || empty($couleur)){
        exit;
    }else {
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
                <div class="modal-footer" id="footerRetraitAnimal">
                    <form >
                        <button type="button" id="removeAnimal" name="'.$id.'" value="'.$couleur.'"  class="btn btn-outline-info">Confirmer le retrait</button>
                    </form>
                </div>
            </div>
        </div>
    
         ';
    }
}


?>

<script src="../../javascript/removeUserAnimal.js"></script>