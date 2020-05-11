<?php

if(isset($_GET)){
    if(isset($_GET["paypal"])){
        echo '
        <div class="col-5 text-center mt-2">
                <h4>Montant :</h4>
                <input type="radio" name="radioDonation" checked value="10" id="radio10">
                <label for="radio10">10€</label>
                <input type="radio" name="radioDonation" value="20" id="radio20">
                <label for="radio20">20€</label>
                <input type="radio" name="radioDonation" value="50" id="radio50">
                <label for="radio50">50€</label>
                <input type="radio" name="radioDonation" value="100" id="radio100">
                <label for="radio100">100€</label>
        </div>
        <div class="col-5 mt-2">
            <h4>Montant Libre (en euros) :</h4>
            <input type="number" id="montantLibreDonation">     
        </div>
        <div class="col-2 mt-2">
            <button type="btn" id="validationPaypal" class="btn btn-outline-success">Valider</button>
            <button type="btn" id="annulationPaypal" class="btn btn-outline-infos">Annuler</button>
        </div>
          ';  
    } else if (isset($_GET["cb"])){
        echo '
        <div class="col-5 text-center mt-2">
                <h4>Montant :</h4>
                <input type="radio" name="radioDonationCB" checked value="10" id="radio10">
                <label for="radio10">10€</label>
                <input type="radio" name="radioDonationCB" value="20" id="radio20">
                <label for="radio20">20€</label>
                <input type="radio" name="radioDonationCB" value="50" id="radio50">
                <label for="radio50">50€</label>
                <input type="radio" name="radioDonationCB" value="100" id="radio100">
                <label for="radio100">100€</label>
        </div>
        <div class="col-5 mt-2">
            <h4>Montant Libre (en euros) :</h4>
            <input type="number" id="montantLibreDonation">     
        </div>
        <div class="col-2 mt-2">
            <button type="btn" id="validationCB" class="btn btn-outline-success">Valider</button>
            <button type="btn" id="annulationCB" class="">Annuler</button>
        </div>
          ';  
    } else{
        echo '
        <div class="col-5 text-center mt-2">
                <h4>Montant :</h4>
                <input type="radio" name="radioDonation" checked value="10" id="radio10">
                <label for="radio10">10€</label>
                <input type="radio" name="radioDonation" value="20" id="radio20">
                <label for="radio20">20€</label>
                <input type="radio" name="radioDonation" value="50" id="radio50">
                <label for="radio50">50€</label>
                <input type="radio" name="radioDonation" value="100" id="radio100">
                <label for="radio100">100€</label>
        </div>
        <div class="col-5 mt-2">
                <h4>Montant Libre (en euros) :</h4>
                <input type="number" id="montantLibreDonation">

        </div>
        <div class="col-2 mt-2">
            <button type="btn" id="validationPaypal" class="btn btn-outline-success">Valider</button>
            <button type="btn" id="annulationPaypal" class="btn btn-outline-warning">Annuler</button>
        </div>
          ';  
    }

}

?>
