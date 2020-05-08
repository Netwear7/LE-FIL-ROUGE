$(document).ready(function (){
    $('#formPerte').submit(function (e) {
        e.preventDefault(); 
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
                        $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#bodyModalPerte" ).fadeIn(3000).fadeOut(3500);
                    } else {
                        $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#bodyModalPerte" ).fadeIn(3000).fadeOut(3500);
                        $('#modalPerte').modal('hide');
                    }                       
                }
            }   
        )
    });
});

