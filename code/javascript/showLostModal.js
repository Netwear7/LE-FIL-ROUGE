$(document).ready(function(){
    $('button.lost').click(function(e){
        e.preventDefault();
        var idAnimalPerdu = $(this).val();
        $('#modalPerdu').load('displayLostAnimalModal.php',idAnimalPerdu);
    })
});