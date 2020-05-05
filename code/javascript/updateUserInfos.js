$(document).ready(function (){

    $('#updateUserInfos').submit(function (e) {
        alert("hello");
        e.preventDefault();
        var nom = $('#NOM').val();
        var prenom = $('#PRENOM').val();
        var num = $('#NUM').val();
        var mail = $('#ADRESSE_EMAIL').val();
        var numeroRue = $('#NUMERORUE').val();
        var rue = $('#RUE').val();
        var cp = $('#CODE_POSTAL').val();
        var ville = $('#VILLE').val();
        var idAdresse = $("#idAdresse").val();
        var idUtilisateur = $("#idUtilisateur").val()
            data = ({  NOM : nom, PRENOM : prenom, NUM : num, ADRESSE_EMAIL : mail, NUMERO : numeroRue, RUE : rue , CODE_POSTAL : cp, VILLE : ville,idAdresse : idAdresse , idUtilisateur : idUtilisateur, "updateUserInfos" : true})
            $('#resultUpdatePassword').reload("compteController.php", data);
        });
});