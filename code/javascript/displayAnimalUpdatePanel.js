$(document).ready(function(){
    $('button.updateAnimal').click(function(e){
        e.preventDefault();
        var idAnimalToUpdate = $(this).val();
        $('#panelModifyAnimal').load('displayUserAnimalsUpdatePanel.php',idAnimalToUpdate, function(data){
            if(data.length > 0){
                $('#list-myanimals-list').removeClass( "active");
                $('#animalTab').removeClass( "active", "show" );
                $('#panelModifyAnimal').tab('show');
            }
        });
    })
});
