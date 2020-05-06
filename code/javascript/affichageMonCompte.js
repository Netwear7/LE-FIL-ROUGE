$( document ).ready(function() {
    $('#rowUserInfos').load("displayUserInfos.php");
    $('#updateUserInfos').load("displayUserUpdatePanel.php");
    $('#rowDonations').load('displayDonationsInMyAccount.php');
    $('#rowAnimals').load('displayUserAnimals.php');
    $('#rowFavouriteAnimals').load('displayUserFavouriteAnimal.php');
    $('#popCouleur').load('displayColorsOptions.php');
    $('#modalRetrouve').load('displayAnimalIsBackModal.php');
    $('#modalRetrait').load('displayRemoveAnimalModal.php');
});