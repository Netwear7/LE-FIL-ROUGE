$(document).ready(function(){
    $("#formAddNews").on("submit", function (event) {
        event.preventDefault();
        alert("hey");
        var formData = new FormData($(this));
        $.ajax({
            url: 'accueil.php',
            type: 'POST',
            data: formData,
            dataType: "json",
            async: true,
            success: function (data) {
                if(data.status != 'success'){
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAddNews" ).fadeIn(3000).fadeOut(9000);
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultAddNews" ).fadeIn(3000).fadeOut(9000);
    
                }                       
            },
            error: function(jqXHR,textStatus,errorThrown){
                $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#resultAddNews" ).fadeIn(3000).fadeOut(3500);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })
});