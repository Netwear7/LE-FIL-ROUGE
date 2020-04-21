window.onload=function() {
    loadInfo();
    $("#nom_espece").change(function(e){
        loadInfo();
        var espece = $('#nom_espece').val(); 
            $.ajax({
                url : 'displayRaceIn,.php?nomEspece=' + espece,
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