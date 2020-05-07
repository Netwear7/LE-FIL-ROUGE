$(document).ready(function (){
    $('#removeAnimal').click(function (e) {
        var couleur = $(this).val();
        var idAnimal = $(this).attr('name');
        $.ajax({
            url: 'compteController.php',
            method: 'POST',
            data: {
                couleur : couleur,
                idAnimal : idAnimal,
                "removeUserAnimal" : true
            }
        })
    });
});