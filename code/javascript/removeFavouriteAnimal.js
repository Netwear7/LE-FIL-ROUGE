$(document).ready(function (){

        $('button#removeFavoris').click(function(e){
                e.preventDefault();
                var id = $(this).val();
                var idUser = $(this).attr('name');
                alert(idUser);
                alert(id);
                $.ajax(
                        {
                            url: 'compteController.php',
                            method: "POST",
                            data : {
                                
                                    "retraitFavoris" : id,
                                    "id_utilisateur" : idUser
                                
                            }
                        }   
                    )
        })
    });
