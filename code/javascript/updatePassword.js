$(document).ready(function (){

    $('#updatePassword').submit(function (e) {
        e.preventDefault();
        var actualPassword = $('#inputPassword2').val();
        var newPassword = $('#inputPassword3').val();
        var confirmedNew = $('#inputPassword3').val();
                data = ({ "updatePassword" : true, "actual" : actualPassword, "newPassword" : newPassword, "confirmedNew" : confirmedNew })
                $('#resultUpdatePassword').load("compteController.php", data);
        });
    });
