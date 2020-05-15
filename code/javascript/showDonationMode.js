$( document ).ready(function() {
    $('#loadDonation').load("whichDonation.php");
    $('#selectDonationMode').change(function(){
        val = $(this).val();
        $('#loadDonation').load("whichDonation.php", val);
    })
});
