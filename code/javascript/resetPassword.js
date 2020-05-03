$(document).ready(function (){

    $('#resetPassword').click(function (e) {
        e.preventDefault();
        var email = $('#mail').val()
            data = { mail : email,
                },
            $('#resultReset').load("resetPassword.php", data);
        });
    });


