<?php
  session_start();
  
?>

<!DOCTYPE html>
<html lang=fr>
    <head>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <title>Aidez-nous</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
        <link rel="stylesheet" href="../../css/global.css">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/global.css">
        <script src="../../javascript/navbarScroll.js"></script>

    </head>
    <body>
        <?php
            include_once("header.php");
        ?>
        <div class="container ">
            <div class="row mt-5">
                <div class="col text-center">
                    <h3>Vous souhaitez nous Soutenir ?</h3>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 col-sm-12 d-flex align-items-center justify-content-center">
                    <h2>Faites un don !</h2>
                </div>
                <article class="col-lg-8 col-sm-12">
                    <p class="mt-3">

                         Le Don blablablablaHoc inmaturo interitu ipse quoque sui pertaesus excessit e vita aetatis nono anno atque vicensimo cum quadriennio imperasset. natus apud Tuscos in Massa Veternensi, patre Constantio Constantini fratre imperatoris, matreque Galla sorore Rufini et Cerealis, quos trabeae consulares nobilitarunt et praefecturae.
                        
                        Procedente igitur mox tempore cum adventicium nihil inveniretur, relicta ora maritima in Lycaoniam adnexam Isauriae se contulerunt ibique densis intersaepientes itinera praetenturis provincialium et viatorum opibus pascebantur.
                        
                        est uttem non indicabant denique etiam idem ad usque discrimen vitae vexatus nihil fateri conpulsus est.
                    </p>
                </article>
            </div>
            <div class="row mt-5 ">
                <div class="col-2">
                    <label for="selectDonationMode">Selectionnez un mode de Donation : </label>
                    <select id="selectDonationMode" class="form-control">
                        <option value="paypal">Paypal</option>
                        <option value="cb">Carte bancaire</option>
                    </select>
                </div>
                <div class="col-8">
                    <form id="donation">
                    <div class="row bg-grey-light p-3 componentContainer" id="loadDonation">   

                    </div>
                    </form>
                </div>  


            </div>
            <div class="row mt-2" id="resultDonation">
                
            </div>      
            <div class="row mt-3">
                <p>Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions Conditions  Conditions Conditions Conditions </p>
            </div>
        </div>
        <?php
            include_once("footer.php");
        ?>
    </body>
    <script src="../../javascript/showDonationMode.js"></script>
    <script src="../../javascript/donation.js"></script>
</html>
