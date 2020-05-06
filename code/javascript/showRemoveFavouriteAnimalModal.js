$(document).ready(function(){
    $('button.removeFavoris').click(function(e){
        e.preventDefault();
        var idAnimalToRemove = $(this).val();
        $('#modalRetraitFavoris').load('displayRemoveFavouriteAnimalModal.php',idAnimalToRemove);
    })
});