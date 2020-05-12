
$(document).ready(function (){
    $('#confirmRetrouve').click(function (e) {
        e.preventDefault();
        var idAnimalRetrouve = $(this).val();
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                data : {

                        "animalRetrouve" : true,
                        idAnimalRetrouve : idAnimalRetrouve


                },
                success: function (data) {
                    if(data.status != 'success'){
                        $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#bodyModalRetrouve" ).fadeIn(3000).fadeOut(3500);
                    } else {
                        $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#bodyModalRetrouve" ).fadeIn(3000).fadeOut(3500);
                        setTimeout(function(){
                            $('#rowAnimals').load('displayUserAnimals.php');
                            $('#modalRetrouve').modal('toggle').data( 'bs.modal', null );
                        }, 3500);
                    }                       
                },
                error: function(jqXHR,textStatus,errorThrown){
                    $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#bodyModalRetrouve" ).fadeIn(3000).fadeOut(3500);
                    setTimeout(function(){
                        $('#modalRetrouve').modal('toggle').data( 'bs.modal', null );
                    }, 3500);
                }
            }  
        )
    });
});


