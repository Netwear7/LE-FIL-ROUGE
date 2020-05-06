<?php
include_once '../service/AnimauxService.php';
include_once '../data-access/AnimauxDataAccess.php';

if(isset($_GET)){
    $id = key($_GET);
    echo '
            

        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" class="modalRetrouvéTitle1">Confirmez vous avoir Retrouvé votre animal?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="bodyModalRetrouve">
                    <small id="lostAnimal" class="form-text text-muted">Si c\'est bien le cas, nous somme heureux que vous ayez pu le retrouver</small>
                </div>
                <div class="modal-footer">
                    <form id="formRetrouve">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="hidden" name="idAnimalRetrouve" value="'.$id.'"></input>
                        <button type="button submit" class="btn btn-primary name="animalRetrouve">Confirmer</button>
                    </form>
                </div>
            </div>
        </div>

         ';
        }

        ?>
        <script src="../../javascript/animalRetrouve.js"></script>
    