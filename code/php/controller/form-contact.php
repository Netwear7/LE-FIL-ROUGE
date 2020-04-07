<?php
    include_once("../service/ContactezNousService.php");

    $contact = new ContactezNousService();
    session_start();

    if(isset($_POST["action"]) && $_POST["action"] == "InsertMessage"){
        if(isset($_POST["message"]) && isset($_POST["motif"])
            && is_string($_POST["message"]) 
            && is_string($_POST["motif"]) 
            && preg_match("/^[a-zA-Z.0-9!?,]+$/", $_POST["message"])
            && preg_match("/^[a-zA-Z.0-9!?,]+$/", $_POST["motif"])){
            $contact->InsertMessage($_POST);
        }
    }
?>

<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS et CSS-->    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../../css/header-and-color-test.css">
        
        <!-- Titre onglet -->
        <title>Page d'accueil</title>

        <!-- script Javascript-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- Include en javascript-->
        
        <link rel="stylesheet" href="../../css/global.css">
        <script src="../../javascript/navbarScroll.js"></script>
    </head>
    <body>
        <?php
            include_once("header.php");
        ?>
        <!--#################  CODE PRINCIPALE  #################-->
        <div class="container-fluid">

            <div class="row mt-5">
                <div class="col-lg-4 offset-lg-1">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="row" style="height: 350px;">
                                <img class="img-fluid w-100" src="../../img/dog-on-the-phone.png" alt="chien standardiste">
                            </div>
                            <div class="row">
                                <h3 class="ml-4 my-5">Contactez-nous</h3>
                            </div>
                            <div class="row">
                                <p class="mx-4">Avoir une communication ouverte est l’une des valeurs principales de notre marque.</p>

                                <p class="mx-4"> Notre section FAQ est la façon la plus rapide de trouver des réponses pour les questions les plus communes. Cliquez ici pour plus d’info.</p>
                                    
                                <p class="mx-4"> Vous ne trouvez pas la réponse que vous cherchez ? Notre service client est là pour vous aider, de 8h à 21h du lundi au vendredi.</p>
                                    
                                <p class="mx-4"> Vous pouvez également nous contacter par email en remplissant le formulaire ci-dessous.</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 bg-grey-ligth">
                    <div class="row justify-content-center mb-5">
                        <h1 class="mt-4">Formulaire de contact :</h1>
                    </div>

                    <form action="" method="POST">
                        <input type="hidden" name="action" value="InsertMessage">
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <input type="text" placeholder="Nom" name="name" class="form-control" <?php 
                                    if(!isset($_SESSION["user_id"])){
                                        echo "value=''";
                                    }
                                    else{
                                        $daoUtilisateur = new UtilisateurDataAccess();
                                        $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
                                        $data = $serviceUtilisateur->serviceSelect($_SESSION["user_id"]);
                                        $utilisateur = new Utilisateur($data);
                                        echo "value='".$utilisateur->getNom()."'";
                                    }
                                ?> aria-label="Text input with dropdown button">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <input type="text" placeholder="Prénom" name="fname" class="form-control" <?php 
                                    if(!isset($_SESSION["user_id"])){
                                        echo "value=''";
                                    }
                                    else{
                                        $daoUtilisateur = new UtilisateurDataAccess();
                                        $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
                                        $data = $serviceUtilisateur->serviceSelect($_SESSION["user_id"]);
                                        $utilisateur = new Utilisateur($data);
                                        echo "value='".$utilisateur->getPrenom()."'";
                                    }
                                ?> aria-label="Text input with dropdown button">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <input type="text" placeholder="Adresse Email" name="email" class="form-control" <?php 
                                    if(!isset($_SESSION["user_id"])){
                                        echo "value=''";
                                    }
                                    else{
                                        $daoUtilisateur = new UtilisateurDataAccess();
                                        $serviceUtilisateur = new UtilisateurService($daoUtilisateur);
                                        $data = $serviceUtilisateur->serviceSelect($_SESSION["user_id"]);
                                        $utilisateur = new Utilisateur($data);
                                        echo "value='".$utilisateur->getEmail()."'";
                                    }
                                ?> aria-label="Text input with dropdown button">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="motif" placeholder="Motif" aria-label="Text input with dropdown button">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" placeholder="Message" id="exampleFormControlTextarea3" rows="8"></textarea>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 offset-lg-1 mb-3">
                                <input class="btn btn-lg col-lg-12 bg-primary mb-3 text-white" type="submit" value="Envoyer">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--###############  FIN CODE PRINCIPALE  ##############-->
        <?php
            include_once("footer.php");
        ?>

    </body>
</html>