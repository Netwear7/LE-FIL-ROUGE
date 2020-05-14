$( document ).ready(function() {
    $('#removeNews').click(function(e){
        e.preventDefault();
        id = $('#removeNews').val();
        var idPhoto = $(this).attr('name');
        $('#loaderRemoveNews').show();
        $.ajax({
            url: '../../php/controller/accueilController.php',
            method: 'POST',
            data: {
                idNews : id,
                idPhoto : idPhoto,
                "removeNews" : true
            },
            dataType: "json",
            success: function (data) {
                if(data.status != 'success'){
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitNews" ).fadeIn(3000).fadeOut(9000)
                    $('#loaderRemoveNews').hide();
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#footerRetraitNews" ).fadeIn(3000).fadeOut(9000);
                    setTimeout(function(){
                        $('#rowNews').load("AffichageNews.php");
                        $('#modalRetraitNews').modal('toggle').data( 'bs.modal', null );
                    }, 2000);
                }                       
            },
            error: function(jqXHR,textStatus,errorThrown){
                $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#footerRetraitNews" ).fadeIn(3000).fadeOut(3500);
                $('#rowNews').load("AffichageNews.php");
                setTimeout(function(){
                    $('#modalRetraitNews').modal('toggle').data( 'bs.modal', null );
                }, 2000);
            }
        })
    })
});