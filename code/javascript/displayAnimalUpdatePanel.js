$(document).ready(function(){
    $('button.updateAnimal').click(function(e){
        e.preventDefault();
        alert("hello");
        var idAnimalToUpdate = $(this).val();
        alert(idAnimalToUpdate);
        $('#formUpdateAnimals').load('displayUserAnimalsUpdatePanel.php',idAnimalToUpdate);
    })
});