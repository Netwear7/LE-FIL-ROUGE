$(document).ready(function (){
    $('.formRetrouve').submit(function (e) {
        e.preventDefault();
        var idAnimalRetrouve = $(this).find('input[name="idAnimalRetrouve"]').val();
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                data : {

                        "animalRetrouve" : true,
                        idAnimalRetrouve : idAnimalRetrouve

                    
                }
            }   
        ).done(function(){

        })
    });
});