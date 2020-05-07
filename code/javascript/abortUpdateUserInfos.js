$('button#abortUpdate').click(function(){
    setTimeout(function(){
        $('#updateUserInfosPanel').removeClass( "active", "show" );
    },500);
    setTimeout(function(){
        $('#profilePanel').tab('show');
    },500);
    $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
})


$('a#list-profile-list').click(function(){
    setTimeout(function(){
        $('#updateUserInfosPanel').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#profilePanel').tab('show');
    },200);
    $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myanimals-list').click(function(){
    setTimeout(function(){
        $('#updateUserInfosPanel').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#animalTab').tab('show');
    },200);
    $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myfavourites-list').click(function(){
    setTimeout(function(){
        $('#updateUserInfosPanel').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#list-favourites').tab('show');
    },200);
    $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
})

$('a#list-myDonations-list').click(function(){
    setTimeout(function(){
        $('#updateUserInfosPanel').removeClass( "active", "show" );
    },200);
    setTimeout(function(){
        $('#list-donations').tab('show');
    },200);
    $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
})