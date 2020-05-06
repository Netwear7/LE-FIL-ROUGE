
$(document).ready(function (){
    $('#formRetrouve').submit(function (e) {
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
            $( '<p class="alert alert-success mt-2 mb-2" role="alert">Votre animal a bien été signalé comme étant Retrouvé !</p>' ).appendTo( "#bodyModalRetrouve" ).fadeIn(3000).fadeOut(3500);
            setTimeout(location.reload.bind(location), 3500);
        })
    });
});