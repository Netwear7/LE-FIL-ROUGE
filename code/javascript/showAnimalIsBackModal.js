$(document).ready(function(){
    $('button.isBack').click(function(e){
        e.preventDefault();
        var idAnimalRetrouve = $(this).val();
        $('#modalRetrouve').load('displayAnimalIsBackModal.php',idAnimalRetrouve);
    })
});




