$(document).ready(function(){
    $('button.remove').click(function(e){
        e.preventDefault();
        var id= $(this).val();
        var couleur= $(this).attr('name');
        $('#modalRetrait').load('displayRemoveAnimalModal.php', {id: id, couleur: couleur}, function(data){
            if (data.length > 1 ){
                $('#modalRetrait').modal('toggle');
            } else {
                $( '<p class="alert alert-warning mt-2 mb-2 col-12" role="alert">Une erreur nous empêche momentanément d\'afficher la fonctionnalité de Retrait, veuillez réessayer plus tard !</p>' ).appendTo( "#errorAnimal" )
            }
        });

    })
});


