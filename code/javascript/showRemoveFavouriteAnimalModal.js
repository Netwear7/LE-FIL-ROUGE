$(document).ready(function(){
    $('button.removeFavoris').click(function(e){
        e.preventDefault();
        var idAnimalToRemove = $(this).val();
        $('#modalRetraitFavoris').load('displayRemoveFavouriteAnimalModal.php',idAnimalToRemove, function(data)
        {
            if (data.length > 1 ){
                $('#modalRetraitFavoris').modal('toggle');
            } else {
                $( '<p class="alert alert-warning mt-2 mb-2 col-12" role="alert">Une erreur nous empêche momentanément d\'afficher la fonctionnalité de Signalement, veuillez réessayer plus tard !</p>' ).appendTo( "#resultRemoveFavourite" );
            }
        });
    })
});