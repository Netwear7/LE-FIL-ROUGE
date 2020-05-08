$('button#abortUpdateAnimal').click(function(e){
    e.preventDefault();
    setTimeout(function(){
        $('#panelModifyAnimal').removeClass( "active", "show" );
    },500);
    setTimeout(function(){        
        $('#animalTab').tab('show');
    },500);
    $("#addAnimal-list").removeClass( "active" ).attr("aria-selected","false");
})


$('a#list-profile-list').click(function(){
    setTimeout(function(){
        $('#panelModifyAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#profilePanel').tab('show');
    },200);
    $("#addAnimal-list").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myanimals-list').click(function(){
    setTimeout(function(){
        $('#panelModifyAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#animalTab').tab('show');
    },200);
    $("#addAnimal-list").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myfavourites-list').click(function(){
    setTimeout(function(){
        $('#panelModifyAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#list-favourites').tab('show');
    },200);
    $("#addAnimal-list").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myDonations-list').click(function(){
    setTimeout(function(){
        $('#panelModifyAnimal').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#list-donations').tab('show');
    },200);
    $("#addAnimal-list").removeClass( "active" ).attr("aria-selected","false");
})