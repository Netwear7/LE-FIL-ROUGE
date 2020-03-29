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
        nom_espece = $(this).val();
        console.log(nom_espece);
        loadInfo();
    });
    $("#nom_race").change(function(e){
        nom = $(this).val();
        console.log(nom_race);
        loadInfo();
    });
    $("#couleur").change(function(e){
        prenom = $(this).val();
        console.log(couleur);
        loadInfo();
    });
    $("#sexe").change(function(e){
        salmin = $(this).val();
        console.log(sexe);
        loadInfo();
    });
    $("#ville").change(function(e){
        salmax = $(this).val();
        console.log(ville);
        loadInfo();
    });
}