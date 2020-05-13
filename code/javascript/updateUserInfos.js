$(document).ready(function (){
    $('#updateUserInfos').submit(function (e) {
        $("#updateUserInfosBtn").attr("disabled", true);
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
                    "updateUserInfos" : true,                 
                },
                dataType: "json",
                success: function (data) {
                    if(data.status != 'success'){
                        $( '<div class="alert alert-warning col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultModificationInfos" ).fadeIn(3000).fadeOut(9000);
                        $("#updateUserInfosBtn").attr("disabled", false);
                        } else {
                            $( '<div class="alert alert-success col-12 mt-2 mb-2" role="alert">'+data.message+'</div>' ).appendTo( "#resultModificationInfos" ).fadeIn(3000).fadeOut(9000);
                            $('#rowUserInfos').load("displayUserInfos.php");
                            setTimeout(function(){
                                $('#updateUserInfosPanel').removeClass( "active", "show" );
                            },4000);
                            setTimeout(function(){
                                $('#profilePanel').tab('show');
                            },4000);
                            $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
                        }                       
                },
                error: function(jqXHR,textStatus,errorThrown){
                    $( '<div class="alert alert-primary col-12 mt-2 mb-2" role="alert">'+errorThrown+'</div>' ).appendTo( "#resultModificationInfos" ).fadeIn(3000).fadeOut(3500);
                    setTimeout(function(){
                        $('#updateUserInfosPanel').removeClass( "active", "show" );
                    },4000);
                    setTimeout(function(){
                        $('#profilePanel').tab('show');
                    },4000);
                    $("#modifierInfos").removeClass( "active" ).attr("aria-selected","false");
                }  
            }   
        )
    });
});

