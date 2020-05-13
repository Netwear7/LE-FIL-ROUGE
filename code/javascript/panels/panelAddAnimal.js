$('#buttonAddAnimal').click(function(e){
    $("#buttonAddAnimal").attr("disabled", true);
    $('#panelAddAnimal').load('formAddAnimal.php',function(){
        setTimeout(function(){
            $('#animalTab').removeClass( "active", "show" );
            $('#panelAddAnimal').tab('show');
        },1000);
    });
})





