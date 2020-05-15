$(document).ready(function(){
    $('button.updateNews').click(function(e){
        e.preventDefault();
        id = $(this).val();
        var idNews = $(this).val();
        alert(idNews);
        $('#rowUpdateNews').load('../../php/controller/formUpdateNews.php',{id: idNews}, function(data){
            if (data.length > 1 ){
                $('#rowUpdateNews').toggle();
            } else {
                $( '<p class="alert alert-warning mt-2 mb-2 col-12" role="alert">Une erreur nous empêche momentanément d\'afficher la fonctionnalité de Modification, veuillez réessayer plus tard !</p>' ).appendTo( "#errorNews" )
            }
        });
    })
});