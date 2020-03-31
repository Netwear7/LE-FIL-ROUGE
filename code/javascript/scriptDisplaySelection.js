function loadInfo(){
    $('#display').load("../controller/displaySelection.php", 
    {
        nom_espece:  $('#nom_espece').val(),
        nom_race : $('#nom_race').val(),
        couleur : $('#couleur').val(),
        sexe : $('#sexe').val(),
        ville : $('#ville').val()
    })
}


window.onload=function() {
    loadInfo();
    $("#nom_espece").change(function(e){
        loadInfo();
        var espece = $('#nom_espece').val(); 
            $.ajax({
                url : 'displayRaceByType.php?nomEspece=' + espece,
                success : function(data){
                    $("#nom_race").html(data);
                }, 
                error : function(xhr, message, status){ 
                    alert("Erreur !!");
                }
            })
    });
    $(".simple-select").change(function(e){
        loadInfo();
    });
}