$(document).ready(function(){
    $('button.remove').click(function(e){
        e.preventDefault();
        var idAnimalToRemove = $(this).val();
        $('#modalRetrait').load('displayRemoveAnimalModal.php',idAnimalToRemove);
    })
});