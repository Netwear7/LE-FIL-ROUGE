<?php


if(isset($_GET)){
    $id = key($_GET);
    echo '
            

        <div class="modal-dialog modal-dialog-centered" id="modalRetrouve" role="document">
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
                    <button type="button" id="confirmRetrouve" value="'.$id.'" class="btn btn-primary">Confirmer</button>
                </div>
            </div>
        </div>

         ';
        }

        ?>

<script src="../../javascript/animalRetrouve.js"></script>


    