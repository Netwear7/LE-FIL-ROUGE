$(document).ready(function(){
    $('button.remove').click(function(e){
        e.preventDefault();
        var id= $(this).val();
        var couleur= $(this).attr('name');
        $('#modalRetrait').load('displayRemoveAnimalModal.php');
        $(".modal-footer #removeAnimal").val( id );
        $(".modal-footer #removeAnimal").attr('name',couleur);
        alert($(".modal-footer #removeAnimal").val());
        alert($(".modal-footer #removeAnimal").attr('name'))
        $('#modalRetrait').modal('toggle');
    })
});


