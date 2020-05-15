<?php

if(isset($_GET)){
    if(isset($_GET["paypal"])){
        echo '
        <div class="col-12 text-center">
            <h3>Via Paypal</h3>
        </div>

        <div class="col-lg-5 col-sm-12">
            <h4>Montant :</h4>
            <input type="radio" name="radioDonation" value="10" id="radio10">
            <label for="radio10">10€</label>
            <input type="radio" name="radioDonation" value="20" id="radio20">
            <label for="radio20">20€</label>
            <input type="radio" name="radioDonation" value="50" id="radio50">
            <label for="radio50">50€</label>
            <input type="radio" name="radioDonation" value="100" id="radio100">
            <label for="radio100">100€</label>
        </div>
        <div class="col-lg-5 col-sm-12">
            <h4>Montant Libre (en euros) :</h4>
            <input type="number" name="montantLibreDonation" id="montantLibreDonation"> 
            <input type="hidden" name="donation">   
        </div>
        <div class="col-lg-1 col-sm-12">
        <button type="btn submit" id="validation" name="donationPaypal" class="btn btn-outline-success btn-lg">Valider</button>
        </div>


          ';  
    } else if (isset($_GET["cb"])){
        echo '

        <div class="col-12 text-center">
        <h3>Via Cb</h3>
        </div>

        <div class="col-lg-5 col-sm-12">
            <h4>Montant :</h4>
            <input type="radio" name="radioDonation" value="10" id="radio10">
            <label for="radio10">10€</label>
            <input type="radio" name="radioDonation" value="20" id="radio20">
            <label for="radio20">20€</label>
            <input type="radio" name="radioDonation" value="50" id="radio50">
            <label for="radio50">50€</label>
            <input type="radio" name="radioDonation" value="100" id="radio100">
            <label for="radio100">100€</label>
        </div>
        <div class="col-lg-5 col-sm-12">
            <h4>Montant Libre (en euros) :</h4>
            <input type="number" name="montantLibreDonation" id="montantLibreDonation">    
            <input type="hidden" name="donation"> 
        </div>
        <div class="col-lg-1 col-sm-12">
        <button type="btn submit validation" name="cb" class="btn btn-outline-success btn-lg">Valider</button>
        </div>

          ';  

    } else {
        echo '
        <div class="col-12 text-center">
            <h3>Via Paypal</h3>
        </div>

        <div class="col-lg-5 col-sm-12">
            <h4>Montant :</h4>
            <input type="radio" name="radioDonation" value="10" id="radio10">
            <label for="radio10">10€</label>
            <input type="radio" name="radioDonation" value="20" id="radio20">
            <label for="radio20">20€</label>
            <input type="radio" name="radioDonation" value="50" id="radio50">
            <label for="radio50">50€</label>
            <input type="radio" name="radioDonation" value="100" id="radio100">
            <label for="radio100">100€</label>
        </div>
        <div class="col-lg-5 col-sm-12">
            <h4>Montant Libre (en euros) :</h4>
            <input type="number" name="montantLibreDonation" id="montantLibreDonation">  
            <input type="hidden" name="donation">   
        </div>
        <div class="col-lg-1 col-sm-12">
        <button type="btn submit validation" name="donPaypal" class="btn btn-outline-success btn-lg">Valider</button>
        </div>


          ';  
    }    
}

?>


