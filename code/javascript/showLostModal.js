$(document).ready(function(){
    $('button.lost').click(function(e){
        e.preventDefault();
        var idAnimalPerdu = $(this).val();
        $.ajaxSetup ({
            // Disable caching of AJAX responses
            cache: false
        });
        $('#modalPerdu').load('displayLostAnimalModal.php',idAnimalPerdu, function(data)
        {
            if (data.length > 1 ){
                $('#modalPerdu').modal('toggle');
            } else {
                $( '<p class="alert alert-warning mt-2 mb-2 col-12" role="alert">Une erreur nous empêche momentanément d\'afficher la fonctionnalité de Retrait, veuillez réessayer plus tard !</p>' ).appendTo( "#errorAnimal" );
            }
        });
        
    })
    $(document.body).on('hidden.bs.modal', function () {
        $('#modalPerdu').removeData('bs.modal')
    });
});

