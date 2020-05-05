$(document).ready(function (){
    $('.formRetrait').submit(function (e) {
        e.preventDefault();
        var couleurAnimalRetrait = $(this).find('input[name=couleurAnimalRetrait]').val();
        var idAnimalRetrait = $(this).find('textarea[name="idAnimalRetrait"]').val();
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                data : {

                        "removeUserAnimal" : true,
                        couleurAnimalRetrait : couleurAnimalRetrait,
                        idAnimalRetrait : idAnimalRetrait

                    
                }
            }   
        ).done(function() {
            $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">Le retrait a bien étéé effectué</div>' ).appendTo( "#resultRetraitAnimal" ).fadeIn(3000).fadeOut(2500);
        }).then(function(){
            setTimeout(location.reload.bind(location), 2200);
        })
    });
});