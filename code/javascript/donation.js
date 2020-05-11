$( document ).ready(function() {
    $('#loadDonation').load("whichDonation.php");

    $('#selectDonationMode').change(function(){
        val = $(this).val();
        alert(val);
        $('#loadDonation').load("whichDonation.php", val);
    })
});