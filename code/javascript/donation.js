$('#donation').submit(function(e){
    e.preventDefault();
    montantLibre = $('#montantLibreDonation').val();
    montantRadio = $("input[type='radio']:checked").val();
    paypal = true;
    var formData = new FormData($(this)[0]);
    $.ajax({
        url: 'compteController.php',
        type: 'POST',
        data: formData,
        dataType: "json",
        async: true,
        success: function (data) {
            if(data.status != 'success'){
                $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultDonation" ).fadeIn(3000).fadeOut(9000);
            } else {
                $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultDonation" ).fadeIn(3000).fadeOut(9000);

            }                       
        },
        error: function(jqXHR,textStatus,errorThrown){
            $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#resultDonation" ).fadeIn(3000).fadeOut(3500);
        },
        cache: false,
        contentType: false,
        processData: false
    });
})


