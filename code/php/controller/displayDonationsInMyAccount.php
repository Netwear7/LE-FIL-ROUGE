<?php

include_once '../service/DonationService.php';
include_once '../data-access/DonationDataAccess.php';


session_start();

    $donationDataAccess = new DonationDataAccess();
    $donationService = new DonationService($donationDataAccess);
    $dataDonations = $donationService->serviceSelectAllUserDonations($_SESSION["user_id"]);
    $count = count($dataDonations);
    if (empty($dataDonations)){
        echo 
        '
        <div class="row mt-2">
            <div class="col-8 offset-2 text-center componentContainer">
                <div class="row m-3 ">
                    <div class="col-12 text-center">
                        <h5>Vous n\'avez pas encore effectué de Donation</h5>
                        <p> Pour effectuer une donation,  cliquez <a href="don.php" class="btn btn-link">Içi</a> </p>
                    </div>
                </div>
            </div>                                
        </div>
        ';
    } else {
        echo 
        '
        <div class="row mt-2 mb-3">
            <div class="col-8 offset-2 text-center componentContainer">
                <div class="row mt-3 ">
                    <div class="col-12 text-center">
                        <p> Pour effectuer une nouvelle Donation, cliquez <a href="don.php" class="btn btn-link">içi</a> </p>
                    </div>
                </div>
            </div>                                
        </div>

        <div class="row mt-2 mb-3">
            <div class="col-8 offset-2 text-center componentContainer">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Montant (en euros)</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                ';
                    for ($i = 0; $i < $count; $i++){
                        echo '
                        <tr>
                            <td>'.$dataDonations[$i]["montant"].'    </td>
                            <td>'.dateFr($dataDonations[$i]["DATE_DONATION"]).'</td>
                        </tr>
                        ';
                    }
            echo'
                    </tbody>
                </table>
            </div>   
        </div>
        ';

    }

    function dateFr($date){
        return strftime('%d-%m-%Y',strtotime($date));
    }



?>