<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';


    class UtilisateurService extends ServiceCommun implements InterfaceService {

        private $nom="STOEV";
        private $id = '1';



        
        // fonction pour select tout les utilisateurs
        public function serviceSelectAll()
        {
            // if admin ok sinon non // 
        }

        
        //Select Utilisateur
        public function serviceSelect()

        {
            $data = $this->getDataAccessObject()->daoSelect($this->id);
            return $data;
        }

        public function serviceVerificationMDP()
        
        {

        }




        // Function pour le count Utilisateur
        public function serviceCount()

        {
            $this->getDataAccessObject()->daoCount();
        }



        // function pour l'ajout Utilisateur
        public function serviceAjout()

        {
            $this->getDataAccessObject()->daoAjout();
        }



        //function pour la recherche Utilisateur
        public function serviceRecherche()

        {
            $this->getDataAccessObject()->daoRecherche();
        }




        //Fonction de modification des données utilisateur, prends comme parametre le post avec tout les inputs a modifier
        public function serviceModification($parametres)
        
        {
            $this->getDataAccessObject()->daoModification($parametres);
        }

        public function serviceModificationMdp($infos)
        
        {
            $mdpActuel = $infos["oldMdp"];
            $nouveauMdp = $infos["newMdp"];
            $confirm = $infos["confirmNewMdp"] == $infos["newMdp"] ? True : False;
            $this->serviceVerificationMdpActuel($this->id,$mdpActuel);
            return $confirm ? $this->getDataAccessObject()->daoModificationMDP($this->id,$mdp = password_hash($infos["newMdp"], PASSWORD_DEFAULT)) : "Mots de passe incorect";
        }

        public function serviceVerificationMdpActuel($nom, $mdpActuel)
        
        {
            $data = $this->serviceSelect($nom);
            password_verify($mdpActuel,$data[0]["MDP"]);
        }



        // fonction de Suppression Utilisateur
        public function serviceSuppression($nom){
            $this->getDataAccessObject()->daoSuppression($nom);
            return "Suppression réussie";
        }





        public function utilisateurServiceAffichageinfos(){
            $data = $this->serviceSelect(); 
            echo
            '
            <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="row">
                    <div class="col-lg-10 offset-lg-2 pb-2">
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Nom :</strong> '. $data[0]["NOM"].'</li>
                                <li class="list-group-item"><strong>Prénom :</strong> '.  $data[0]["PRENOM"].'</li>
                                <li class="list-group-item"><strong>Tel :</strong> '. $data[0]["NUM"] .'</li>
                                <li class="list-group-item"><strong>Email :</strong> '.$data[0]["ADRESSE_EMAIL"].'</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="row">
                    <div class="col-lg-10 offset-lg-2 pb-2 ">
                        <div class="row">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Numero :</strong> '. $data[0]["NUMERO"].'  </li>
                                <li class="list-group-item"><strong>Rue :</strong> '. $data[0]["RUE"].'  </li>
                                <li class="list-group-item"><strong>Ville :</strong> '. $data[0]["VILLE"].' </li>
                                <li class="list-group-item"><strong>Code Postal : </strong>'. $data[0]["CODE_POSTAL"].' </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            ';
        }
        public function utilisateurServicePanneauModification(){
            $data = $this->serviceSelect();
            echo 
            '
                <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="userName">Nom :</label>
                            <input type="text" maxlength="50" class="form-control" name="nom"  value="'. $data[0]["NOM"].'" aria-describedby="UserName">
                        </li>
                        <li class="list-group-item">
                            <label for="userNickName">Prénom :</label>
                            <input type="text" maxlength="50" class="form-control" name="prénom"  value="'. $data[0]["PRENOM"].'" aria-describedby="UserNickName">
                        </li>
                        <li class="list-group-item">
                            <label for="userPhone">Tel :</label>
                            <input type="text" maxlength="50" class="form-control" name="tel"  value="'. $data[0]["NUM"].'" aria-describedby="UserPhone">
                        </li>
                        <li class="list-group-item">
                            <label for="userMail">Adresse mail : </label>
                            <input type="email" class="form-control"  aria-describedby="emailHelp" name="mail" value="'. $data[0]["ADRESSE_EMAIL"].'">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse mail</small>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="userAdress">Numero :</label>
                            <input type="text" maxlength="50" class="form-control" name="numero" value="'. $data[0]["NUMERO"].'" aria-describedby="UserAdressNumber">
                        </li>
                        <li class="list-group-item">
                            <label for="userAdress">Rue :</label>
                            <input type="text" maxlength="50" class="form-control" name="rue" value="'. $data[0]["RUE"].'" aria-describedby="UserRue">
                         </li>
                        <li class="list-group-item">
                            <label for="userCP">Code Postal : </label>
                            <input type="number" maxlength="50" class="form-control" name="CP" value="'. $data[0]["CODE_POSTAL"].'" aria-describedby="UserName">
                        </li>
                        <li class="list-group-item">
                            <label for="userTown">Ville : </label>
                            <input type="text" maxlength="50" class="form-control" name="Ville" value="'. $data[0]["VILLE"].'" aria-describedby="UserName">
                        </li>
                    </ul>
                </div>
            </div>
            ';
        }





    }
?> 