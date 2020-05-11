$( document ).ready(function() {

    $('#selectDonationMode').change(function(){
        val = $(this).val();
        $('#loadDonation').load("whichDonation.php", val);
    })
});

$('#validationPaypal').click(function(e){
    e.preventDefault();
    alert("paypal");
    var val = $("input[name='radioradioDonationCB']:checked").val();
    alert(val);
    if(!val){
        val = $('#montantLibreDonation').val();
        alert(val);
    }
})

$('#validationCB').click(function(e){
    e.preventDefault();
    alert("cb");
    var val = $("input[name='radioradioDonationCB']:checked").val();
    alert(val);
})