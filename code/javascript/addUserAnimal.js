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
                if(data.status == 'success'){
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+nom+' !</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(2500);
                }else if(data.status == 'error'){
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+' cela fait que '+nom+' n\'a pas pu être ajouté ! Veuillez réessayer</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(2500);
                }

            },

            error: function(data){ 
            
               alert(data.message);
            },
            cache: false,
            contentType: false,
            processData: false
        });
        
        return false;
    });

    
});


