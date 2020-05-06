$(document).ready(function(){
    $('button.remove').click(function(e){
        e.preventDefault();
        var idAnimalToRemove = $(this).val();
        alert(idAnimalToRemove);
        $('#modalRetrait').load('displayRemoveAnimalModal.php',idAnimalToRemove);
    })
});