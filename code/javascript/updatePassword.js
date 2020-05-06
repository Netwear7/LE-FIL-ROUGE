$(document).ready(function (){

    $('#updatePassword').submit(function (e) {
        e.preventDefault();
        var actualPassword = $('#inputPassword2').val();
        var newPassword = $('#inputPassword3').val();
        var confirmedNew = $('#inputPassword3').val();
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
                success: function(response){
                    var len = response.length;
                    for(var i=0; i<len; i++){
                        alert(response[i].error);
                        alert(response[i].code);
                    }        
                }
            }   
        )
        });
    });
