
$("#nom_espece").change(function(e){
    alert("hello");
    var espece = $('#nom_espece').val(); 
        $.ajax({
            url : 'displayRaceAnimal.php?nomEspece=' + espece,
            success : function(data){
                $("#popSelect").html(data);
            }, 
            error : function(xhr, message, status){ 
                alert("Erreur !!");
            }
        })
    });