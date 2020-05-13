$(document).ready(function (){

    $('button#removeFavoris').click(function(e){
        e.preventDefault();
        $('#loaderRemoveFavoris').show();
        $("button#removeFavoris").attr("disabled", true);
        var id = $(this).val();
        var idUser = $(this).attr('name');
        $.ajax(
            	{
                url: 'compteController.php',
                method: "POST",
                data : {
                                
                    "retraitFavoris" : id,
                    "id_utilisateur" : idUser
                                
					},
				success: function (data) {
						if(data.status != 'success'){
                            $('#loaderRemoveFavoris').hide();
                            $("button#removeFavoris").attr("disabled", false);
                            $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitFavoris" );
							} else {
								$( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitFavoris" );
                                setTimeout(function(){
                                    $('#loaderRemoveFavoris').hide();
                                    $('#rowFavouriteAnimals').load('displayUserFavouriteAnimal.php');
                                    $('#modalRetraitFavoris').modal('toggle').data( 'bs.modal', null );
                                }, 3500);
							}               
					},  
                }   
            )
        });
        $(document.body).on('hidden.bs.modal', function () {
            $('#modalRetraitFavoris').removeData('bs.modal')
        });
    });
