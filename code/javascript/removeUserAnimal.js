$(document).ready(function (){
    $('#removeAnimal').click(function (e) {
        alert("hello");
        var couleur = $(this).attr('name');
        alert(couleur);
        var idAnimal = $(this).val();
        alert(idAnimal);
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