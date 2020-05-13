$(document).ready(function(){

    $("#addUserAnimal").submit(function(e){
        $("#addAnimalButton").attr("disabled", true);
        e.preventDefault();
        var nom = $('#nomAnimal').val();
        var dateNaissance = $('#dateNaissance').val();
        var raceAnimale = $('#popSelect option:selected').val();
        var sexe = $('#selectSexe option:selected').val();
        var numeroPuce = $('#numeroPuce').val();
        var caractere = $('#textAreaCaractere').val();
        var robe = $('#robe option:selected').val();
        var couleur = $('#couleur option:selected').val();
        var taille = $('#taille').val();
        var poids = $('#poids').val();
        var specificites = $('#specificites').val();
        var idUtilisateur = $('#idUtilisateur').val();
        var inputFile = $('#photo');
        e.stopPropagation();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: 'compteController.php',
            type: 'POST',
            data: formData,
            dataType: "json",
            async: true,
            success: function (data) {
                if(data.status != 'success'){
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(9000);
                    $("#addAnimalButton").attr("disabled", false);
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(9000);
                    setTimeout(function(){
                        $('#buttonAddAnimal').removeClass( "active", "show" );
                    },5000);
                    setTimeout(function(){
                        $('#rowAnimals').load('displayUserAnimals.php');   
                        $('#panelAddAnimal').removeClass( "active", "show" );   
                        $('#animalTab').tab('show');
                        $("#buttonAddAnimal").removeClass( "active" ).attr("aria-selected","false");
                    },5000);

                }                       
            },
            error: function(jqXHR,textStatus,errorThrown){
                $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(3500);
                setTimeout(function(){
                    $('#buttonAddAnimal').removeClass( "active", "show" );
                },5000);
                setTimeout(function(){
                    $('#rowAnimals').load('displayUserAnimals.php');
                    $('#panelAddAnimal').removeClass( "active", "show" );   
                    $('#animalTab').tab('show');
                    $("#buttonAddAnimal").removeClass( "active" ).attr("aria-selected","false");
                },5000);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        
        return false;
    });

    
});


