window.onload=function() {
    $(".nom_especeModif").change(function(e){
        var espece = $('#nom_espece').val(); 
            $.ajax({
                url : 'displayRaceAnimal.php?nomEspece=' + espece,
                success : function(data){
                    $(".popSelectModif").html(data);
                }, 
                error : function(xhr, message, status){ 
                    alert("Erreur !!");
                }
            })
    });
}