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

        public function serviceVerifyPassword()
        
        {

        }




        // Function pour le count Utilisateur
        public function serviceCount()

        {
            $this->getDataAccessObject()->daoCount();
        }



        // function pour l'ajout Utilisateur
        public function serviceAdd()

        {
            $this->getDataAccessObject()->daoAdd();
        }



        //function pour la recherche Utilisateur
        public function serviceSearch()

        {
            $this->getDataAccessObject()->daoSearch();
        }




        //Fonction de modification des données utilisateur, prends comme parametre le post avec tout les inputs a modifier
        public function serviceUpdate($parametres)
        
        {
            $this->getDataAccessObject()->daoUpdate($parametres);
        }

        public function serviceUpdatePassword($infos)
        
        {
            $mdpActuel = $infos["oldMdp"];
            $confirm = $infos["confirmNewMdp"] == $infos["newMdp"] ? True : False;
            $this->serviceVerifyActualPassword($this->id,$mdpActuel);
            return $confirm ? $this->getDataAccessObject()->daoUpdatePassword($this->id,$mdp = password_hash($infos["newMdp"], PASSWORD_DEFAULT)) : "Mots de passe incorect";
        }

        public function serviceVerifyActualPassword($nom, $mdpActuel)
        
        {
            $data = $this->serviceSelect($nom);
            password_verify($mdpActuel,$data[0]["MDP"]);
        }



        // fonction de Suppression Utilisateur
        public function serviceDelete($nom){
            $this->getDataAccessObject()->daoDelete($nom);
            return "Suppression réussie";
        }





        public function utilisateurServiceDisplayinfos(){
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
        public function utilisateurServiceUpdatePanel(){
            $data = $this->serviceSelect();
            echo 
            '
                <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="userName">Nom :</label>
                            <input type="text" maxlength="50" class="form-control" name="NOM"  value="'. $data[0]["NOM"].'" aria-describedby="UserName">
                        </li>
                        <li class="list-group-item">
                            <label for="userNickName">Prénom :</label>
                            <input type="text" maxlength="50" class="form-control" name="PRENOM"  value="'. $data[0]["PRENOM"].'" aria-describedby="UserNickName">
                        </li>
                        <li class="list-group-item">
                            <label for="userPhone">Tel :</label>
                            <input type="text" maxlength="50" class="form-control" name="NUM"  value="'. $data[0]["NUM"].'" aria-describedby="UserPhone">
                        </li>
                        <li class="list-group-item">
                            <label for="userMail">Adresse mail : </label>
                            <input type="email" class="form-control"  aria-describedby="emailHelp" name="ADRESSE_EMAIL" value="'. $data[0]["ADRESSE_EMAIL"].'">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse mail</small>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <label for="userAdress">Numero :</label>
                            <input type="text" maxlength="50" class="form-control" name="NUMERO" value="'. $data[0]["NUMERO"].'" aria-describedby="UserAdressNumber">
                        </li>
                        <li class="list-group-item">
                            <label for="userAdress">Rue :</label>
                            <input type="text" maxlength="50" class="form-control" name="RUE" value="'. $data[0]["RUE"].'" aria-describedby="UserRue">
                         </li>
                        <li class="list-group-item">
                            <label for="userCP">Code Postal : </label>
                            <input type="text" maxlength="50" class="form-control" name="CODE_POSTAL" value="'. $data[0]["CODE_POSTAL"].'" aria-describedby="UserName">
                        </li>
                        <li class="list-group-item">
                            <label for="userTown">Ville : </label>
                            <input type="text" maxlength="50" class="form-control" name="VILLE" value="'. $data[0]["VILLE"].'" aria-describedby="UserName">
                        </li>
                    </ul>
                </div>
            </div>
            ';
        }





    }
?> 