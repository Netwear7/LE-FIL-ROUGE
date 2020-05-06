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

                    
                }
            }   
        ).done(function(){

        })
    });
});