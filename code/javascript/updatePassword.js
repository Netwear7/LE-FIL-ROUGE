$(document).ready(function (){

    $('#updatePassword').submit(function (e) {
        e.preventDefault();
        var actualPassword = $('#inputPassword2').val();
        var newPassword = $('#inputPassword3').val();
        var confirmedNew = $('#inputPassword4').val();
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                dataType: 'JSON',
                data : {
                    updatePassword : true, 
                    actual : actualPassword, 
                    newPassword : newPassword, 
                    confirmedNew : confirmedNew

                    
                },
                success: function(data){ 
                    if(data.status != 'success'){
                        $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultUpdatePassword" ).fadeIn(3000).fadeOut(9000);
                        } else {
                            $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultUpdatePassword" ).fadeIn(3000).fadeOut(9000);
                        }     
                },
                error: function(jqXHR,textStatus,errorThrown){
                    $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#resultUpdatePassword" ).fadeIn(3000).fadeOut(3500);
                },
            }   
        )
        });
    });
