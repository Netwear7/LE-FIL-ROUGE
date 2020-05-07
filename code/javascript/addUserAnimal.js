$(document).ready(function(){

    $("#addUserAnimal").submit(function(e){
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
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(9000)
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(9000);
                    setTimeout(function(){
                        $('#list-addAnimal').removeClass( "active", "show" );
                    },5000);
                    setTimeout(function(){
                        $('#rowAnimals').load('displayUserAnimals.php');   
                        $('#animalTab').tab('show');
                    },5000);
                    $("#addAnimal-list").removeClass( "active" ).attr("aria-selected","false");
                }                       
            },
            cache: false,
            contentType: false,
            processData: false
        });
        
        return false;
    });

    
});


