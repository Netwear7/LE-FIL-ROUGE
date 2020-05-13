$(document).ready(function (){
    $('#formPerte').submit(function (e) {
        e.preventDefault(); 
        $('#loaderLostAnimal').show();
        $("#lostButton").attr("disabled", true);
        var datePerte = $(this).find('input[name=datePerte]').val();
        var precisionPerte = $(this).find('textarea[name="precisionPerte"]').val();
        var idAnimalPerdu = $(this).find('input[name="idAnimalPerdu"]').val();
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                data : {

                        "perte" : true,
                        datePerte : datePerte,
                        precisionPerte : precisionPerte,
                        idAnimalPerdu : idAnimalPerdu

                    
                },
                success: function (data) {
                    if(data.status != 'success'){
                        $('#loaderLostAnimal').hide();
                        $("#lostButton").attr("disabled", false);
                        $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#bodyModalPerte" ).fadeIn(3000).fadeOut(3500);
                    } else {
                        $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#bodyModalPerte" ).fadeIn(3000).fadeOut(3500);
                        setTimeout(function(){
                            $('#loaderLostAnimal').hide();
                            $('#rowAnimals').load('displayUserAnimals.php');
                            $('#modalPerdu').modal('toggle').data( 'bs.modal', null );
                        }, 3500);
                    }                       
                },
                error: function(jqXHR,textStatus,errorThrown){
                    $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#bodyModalPerte" ).fadeIn(3000).fadeOut(3500);
                    setTimeout(function(){
                        $('#modalPerdu').modal('toggle').data( 'bs.modal', null );
                    }, 3500);
                }
            }   
        )
    });
    $(document.body).on('hidden.bs.modal', function () {
        $('#modalPerdu').removeData('bs.modal')
    });
});

