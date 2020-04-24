function displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, poilValue, villeValue, urgenceValue){
    $('#display').load("../controller/displaySelection.php", 
    {
        nom_espece :  nomEspeceValue,
        nom_race : nomRaceValue,
        couleur : couleurValue,
        sexe : sexeValue,
        poil : poilValue,
        ville : villeValue,
        urgence : urgenceValue
    },
    function(e){
        $("#pagin li").remove();
        loadPagination();
    })

}

$("#urgence").click(function(e){
    if($("#urgence").prop("checked") == true){
        $("#urgence").attr("value", 1 );
        console.log($("#urgence").val())
        loadInfo();
    }
    if($("#urgence").prop("checked") == false){
        $("#urgence").attr("value", "" );
        console.log($("#urgence").val())
        loadInfo();
    }
});

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
        urgenceValue = $('#urgence').val();
        displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, poilValue, villeValue, urgenceValue);
    }
    else{
        nomEspeceValue = $('#nom_espece').val();
        nomRaceValue = $('#nom_race').val();
        couleurValue = $('#couleur').val();
        sexeValue = $('#sexe').val();
        poilValue = $('#poil').val();
        villeValue = $('#ville').val();
        urgenceValue = $('#urgence').val();
        displaySelection(nomEspeceValue, nomRaceValue, couleurValue, sexeValue, poilValue, villeValue, urgenceValue);
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