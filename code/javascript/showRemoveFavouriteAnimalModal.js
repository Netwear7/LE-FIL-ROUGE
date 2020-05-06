$(document).ready(function(){
    $('button.removeFavoris').click(function(e){
        e.preventDefault();
        var idAnimalToRemove = $(this).val();
        alert(idAnimalToRemove);
        $('#modalRetrait').load('displayRemoveFavouriteAnimalModal.php',idAnimalToRemove);
    })
});