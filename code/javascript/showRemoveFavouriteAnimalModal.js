$(document).ready(function(){
    $('button.removeFavoris').click(function(e){
        e.preventDefault();
        var idAnimalToRemove = $(this).val();
        alert(idAnimalToRemove);
        $('#modalRetraitFavoris').load('displayRemoveFavouriteAnimalModal.php',idAnimalToRemove);
    })
});