$('button#abortAddAnimal').click(function(){
    setTimeout(function(){
        $("#panelAddAnimal").removeClass( "active" ).attr("aria-selected","false");
    },1000);
    setTimeout(function(){
        $('#animalTab').tab('show');
        $("#buttonAddAnimal").attr("disabled", false);
    },1000);

})


$('a#list-profile-list').click(function(){
    $("#buttonAddAnimal").attr("disabled", false);
    setTimeout(function(){
        $('#panelAddAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#profilePanel').tab('show');
    },200);
    $("#panelAddAnimal").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myanimals-list').click(function(){
    $("#buttonAddAnimal").attr("disabled",false);
    setTimeout(function(){
        $('#panelAddAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#animalTab').tab('show');
    },200);
    $("#panelAddAnimal").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myfavourites-list').click(function(){
    $("#buttonAddAnimal").attr("disabled", false);
    setTimeout(function(){
        $('#panelAddAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#list-favourites').tab('show');
    },200);
    $("#panelAddAnimal").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myDonations-list').click(function(){
    $("#buttonAddAnimal").attr("disabled",false);
    setTimeout(function(){
        $('#panelAddAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#list-donations').tab('show');
    },200);
    $("#panelAddAnimal").removeClass( "active" ).attr("aria-selected","false");
})