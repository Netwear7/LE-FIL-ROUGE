function displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, poilValue, villeValue){
    $('#display').load("../controller/displayLostAnimals.php", 
    {
        nom_espece:  nomEspeceValue,
        nom_race : nomRaceValue,
        couleur : couleurValue,
        sexe : sexeValue,
        poil : poilValue,
        ville : villeValue
    },
    function(e){
        $("#pagin li").remove();
        loadPagination();
    })
}

$(".simple-select").change(function(e){
    loadInfo();
});

$("#ville").change(function(e){
    loadInfo();
});

function loadInfo(){
    nomEspeceValue=$('#nom_espece').val();
    if(nomEspeceValue.length==0){
        nomRaceValue = "";
        couleurValue = "";
        sexeValue = "";
        poilValue = "";
        villeValue = $('#ville').val();
        displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, poilValue, villeValue);
    }
    else{
        nomEspeceValue = $('#nom_espece').val();
        nomRaceValue = $('#nom_race').val();
        couleurValue = $('#couleur').val();
        sexeValue = $('#sexe').val();
        poilValue = $('#poil').val();
        villeValue = $('#ville').val();
        displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, poilValue, villeValue);
    }
}

function loadPagination(){
    var pageSize = 24;

    var pageCount =  $(".contentDisplay").length / pageSize;
    
    console.log($(".contentDisplay").length);
    console.log(pageCount);
    
    for(var i = 0 ; i<pageCount;i++){
    
    $("#pagin").append('<li class="page-item"><a class="page-link" href="#">'+(i+1)+'</a></li> ');
    }
    $("#pagin li").first().find("a").addClass("current");

    showPage = function(page) {
    $(".contentDisplay").hide();
    $(".contentDisplay").each(function(n) {
        if (n >= pageSize * (page - 1) && n < pageSize * page)
            $(this).show();
    });        
	}
    
	showPage(1);

	$("#pagin li a").click(function() {
	    $("#pagin li a").removeClass("current");
	    $(this).addClass("current");
	    showPage(parseInt($(this).text())) 
	});
}


window.onload=function() {
    loadInfo();
    $("#nom_espece").change(function(e){
        loadInfo();
        var espece = $('#nom_espece').val(); 
            $.ajax({
                url : 'displayLostAnimalResearchMenu.php?nomEspece=' + espece,
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