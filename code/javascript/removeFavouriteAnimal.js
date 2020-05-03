$(document).ready(function (){

    $('.removeFavouriteAnimal').submit(function (e) {
        e.preventDefault();
        var userId = $('#id_utilisateur').val();
        var animalId = $('#id_animal').val();
            data = ({ "retraitFavoris" : true, "actual" : actualPassword, "newPassword" : newPassword, "confirmedNew" : confirmedNew })
            $('#resultRemoveFavourite').load("compteController.php", data);
        });
    });
