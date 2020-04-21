function displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, villeValue){
    $('#display').load("../controller/displaySelection.php", 
    {
        nom_espece:  nomEspeceValue,
        nom_race : nomRaceValue,
        couleur : couleurValue,
        sexe : sexeValue,
        ville : villeValue
    })
}
function loadInfo(){
    nomEspeceValue=$('#nom_espece').val();
    $(".simple-select").change(function(e){
        loadInfo();
    });
    if(nomEspeceValue.length==0){
        nomRaceValue = "";
        couleurValue = "";
        sexeValue = "";
        villeValue = $('#ville').val();
        displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, villeValue);
    }
    else{
        nomEspeceValue = $('#nom_espece').val();
        nomRaceValue = $('#nom_race').val();
        couleurValue = $('#couleur').val();
        sexeValue = $('#sexe').val();
        villeValue = $('#ville').val();
        displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, villeValue);
    }
}


window.onload=function() {
    loadInfo();
    $("#nom_espece").change(function(e){
        loadInfo();
        var espece = $('#nom_espece').val(); 
            $.ajax({
                url : 'displayRaceByType.php?nomEspece=' + espece,
                success : function(data){
                    $("#popSelect").html(data);
                    $(".simple-select").change(function(e){
                        loadInfo();
                    });
                }, 
                error : function(xhr, message, status){ 
                    alert("Erreur !!");
                }
            })
    });
}