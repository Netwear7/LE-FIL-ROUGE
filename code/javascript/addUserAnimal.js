$(document).ready(function(){

    $("#addUserAnimal").submit(function(e){
        e.preventDefault();
        alert("hello");
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
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                data : {
                    addAnimal : "true",
                    nomAnimal : nom,
                    dateNaissance : dateNaissance,
                    raceAnimale : raceAnimale,
                    sexeAnimal : sexe,
                    numeroPuce : numeroPuce,
                    caractere : caractere,
                    robe : robe,
                    couleur : couleur,
                    taille : taille,
                    poids : poids,
                    specificites : specificites,
                    idUtilisateur : idUtilisateur,
                    file : {
                        file: file,
                    }

                    
                },
            }   
        ).done(function() {
            $( '<div class="alert alert-success col-12 mt-5" role="alert">L\'ajout de votre animal à bien été effectué !</div>' ).appendTo( "#resultAjoutAnimal" ).fadeIn(3000).fadeOut(2500);
        }).then(function(){
            setTimeout(location.reload.bind(location), 3000);
        });;
    });

    
});


