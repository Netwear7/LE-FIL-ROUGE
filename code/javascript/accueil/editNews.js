$(document).ready(function(){
    $("#formUpdateNews").submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        // var form = $('formAddNews')[0]; // You need to use standard javascript object here
        // var formData = new FormData(form);
        $.ajax({
            url: 'accueilController.php',
            type: 'POST',
            data: formData,
            dataType: "json",
            async: true,
            success: function (data) {
                if(data.status != 'success'){
                    $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultUpdateNews" ).fadeIn(3000).fadeOut(9000);
                } else {
                    $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultUpdateNews" ).fadeIn(3000).fadeOut(9000);
                    $('#rowNews').load("AffichageNews.php");
                    setTimeout(function(){
                        $("div#rowUpdateNews").slideUp();
                    },700)
    
                }                       
            },
            error: function(jqXHR,textStatus,errorThrown){
                $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#resultUpdateNews" ).fadeIn(3000).fadeOut(3500);
            },
            cache: false,
            contentType: false,
            processData: false
        });
    })
});
