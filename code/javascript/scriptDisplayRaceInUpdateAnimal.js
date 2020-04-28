

$(document).ready(function (){

        $('.selectEspece').change(function () {
            var espece = $(this).val();
            var elem = $(this).closest('div').nextAll('div').first().find('select');
            $.ajax({           
                url : 'displayRaceAnimal.php?nomEspece=' + espece,
                success : function(data){
                    elem.html(data);
                }, 
                error : function(xhr, message, status){ 
                    alert("Erreur !!");
                }
            })
        });

});