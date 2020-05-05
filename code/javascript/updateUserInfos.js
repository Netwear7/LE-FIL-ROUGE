$(document).ready(function (){
    $('#updateUserInfos').submit(function (e) {

        e.preventDefault();
        var nom = $('#NOM').val();
        var prenom = $('#PRENOM').val();
        var num = $('#NUM').val();
        var mail = $('#ADRESSE_EMAIL').val();
        var numeroRue = $('#NUMERO').val();
        var rue = $('#RUE').val();
        var cp = $('#CODE_POSTAL').val();
        var ville = $('#VILLE').val();
        var idAdresse = $("#idAdresse").val();
        var idUtilisateur = $("#idUtilisateur").val()
        var infosPanel = $("#profilePanel");
        var updateUserInfosPanel = $("#updateUserInfosPanel");
        $.ajax(
            {
                url: 'compteController.php',
                method: "POST",
                data : {
                        NOM : nom,
                        PRENOM : prenom,
                        NUM : num,
                        ADRESSE_EMAIL : mail,
                        NUMERO : numeroRue,
                        RUE : rue ,
                        CODE_POSTAL : cp,
                        VILLE : ville,
                        idAdresse : idAdresse ,
                        idUtilisateur : idUtilisateur,
                        "updateUserInfos" : true

                    
                }
            }   
        ).done(function() {
            $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">Modifications effectuées avec succès !</div>' ).appendTo( "#resultModificationInfos" ).fadeIn(3000).fadeOut(2500);
        }).then(function(){
            $("#rowUserInfos").load("displayUserInfos.php");
        })
    });
});