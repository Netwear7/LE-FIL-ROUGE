$( document ).ready(function() {
    $('#rowUserInfos').load("displayUserInfos.php");
    $('#updateUserInfos').load("displayUserUpdatePanel.php");
    $('#rowDonations').load('displayDonationsInMyAccount.php');
    $('#rowAnimals').load('displayUserAnimals.php');
    $('#rowFavouriteAnimals').load('displayUserFavouriteAnimal.php');

    

});