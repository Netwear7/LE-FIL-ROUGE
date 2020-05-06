$(document).ready(function(){
    $('button.updateAnimal').click(function(e){
        e.preventDefault();
        var idAnimalToUpdate = $(this).val();
        $('#formUpdateAnimals').load('displayUserAnimalsUpdatePanel.php',idAnimalToUpdate);
    })
});