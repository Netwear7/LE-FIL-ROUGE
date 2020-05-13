$(document).ready(function(){
    $('button.back').click(function(e){
        e.preventDefault();
        var idAnimalRetrouve = $(this).val();
        $('#modalRetrouve').load('displayAnimalIsBackModal.php',idAnimalRetrouve, function(data)
        {
            if (data.length > 1 ){
                $('#loaderAnimalIsBack').load('../../html/doggo.html');
                $('#modalRetrouve').modal('toggle');
            } else {
                $( '<p class="alert alert-warning mt-2 mb-2 col-12" role="alert">Une erreur nous empêche momentanément d\'afficher la fonctionnalité de Signalement, veuillez réessayer plus tard !</p>' ).appendTo( "#errorAnimal" );
            }
        });
    });
});






