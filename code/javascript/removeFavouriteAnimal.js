$(document).ready(function (){

    $('button#removeFavoris').click(function(e){
        e.preventDefault();
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
							$( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitFavoris" );
							setTimeout(function(){ location.reload(); }, 4000);
							} else {
								$( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitFavoris" );
								setTimeout(function(){ location.reload(); }, 4000);
							}               
					},  
                }   
            )
        })
    });
