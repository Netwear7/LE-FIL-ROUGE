<?php

if(isset($_GET)){
    if(isset($_GET["paypal"])){
        echo '
        <div class="row">
            <div class="col-5">
            t
            </div>
            <div class="col-5">
            c
            </div>
            <div class="col-2">
            b
            </div>
        </div>
          ';  
    } else if (isset($_GET["cb"])){
        echo '
        <div class="row mt-2 mb-2">
            <div class="col-12">
                
            </div>
        </div>
        ';  
    }

}

?>


