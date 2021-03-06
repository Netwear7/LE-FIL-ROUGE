$(document).ready(function (){
    $('#removeAnimal').click(function (e) {
        $('#loaderRemoveAnimal').show();
        $("#removeAnimal").attr("disabled", true);
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
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitAnimal" ).fadeIn(3000).fadeOut(9000)
                    $('#loaderRemoveAnimal').hide();
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitAnimal" ).fadeIn(3000).fadeOut(9000);
                    setTimeout(function(){
                        $('#rowAnimals').load('displayUserAnimals.php');
                        $('#modalRetrait').modal('toggle').data( 'bs.modal', null );
                    }, 3500);
                }                       
            },
            error: function(jqXHR,textStatus,errorThrown){
                $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#footerRetraitAnimal" ).fadeIn(3000).fadeOut(3500);
                setTimeout(function(){
                    $('#modalRetrait').modal('toggle').data( 'bs.modal', null );
                }, 3500);
            }
        })
    });
    $(document.body).on('hidden.bs.modal', function () {
        $('#modalRetrait').removeData('bs.modal')
    });
});