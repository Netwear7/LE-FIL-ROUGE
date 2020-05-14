$(document).ready(function(){
    $('button.removeNews').click(function(e){
        e.preventDefault();
        id = $(this).val();
        var idPhoto = $(this).attr('name');
        $('#modalRetraitNews').load('../../php/controller/modalRetraitNews.php',{id: id, idPhoto: idPhoto}, function(data){
            if (data.length > 1 ){
                $('#modalRetraitNews').modal('show');
            } else {
                $( '<p class="alert alert-warning mt-2 mb-2 col-12" role="alert">Une erreur nous empêche momentanément d\'afficher la fonctionnalité de Retrait, veuillez réessayer plus tard !</p>' ).appendTo( "#errorNews" )
            }
        });
    })
});