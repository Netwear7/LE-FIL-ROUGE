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
            },
            dataType: "json",
            success: function (data) {
                if(data.status != 'success'){
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultRetraitAnimal" ).fadeIn(3000).fadeOut(9000)
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultRetraitAnimal" ).fadeIn(3000).fadeOut(9000);
                    setTimeout(location.reload.bind(location), 3500);
                }                       
            },
        })
    });
});