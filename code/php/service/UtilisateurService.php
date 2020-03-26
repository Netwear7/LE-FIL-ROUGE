<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';


    class UtilisateurService extends ServiceCommun implements InterfaceService {


        // fonction pour select tout les utilisateurs
        public function serviceSelectAll(){
            // if admin ok sinon non
        }

        //Select Utilisateur
        public function serviceSelect($id)
        {
            $data = $this->getDataAccessObject()->daoSelect($id);
            return $data;
        }

        public function serviceVerifyPassword(){

        }

        // Function pour le count Utilisateur
        public function serviceCount()
        {
            $this->getDataAccessObject()->daoCount();
        }

        // function pour l'ajout Utilisateur
        public function serviceAdd($user)
        {
            $this->getDataAccessObject()->daoAdd($user);
            $id = $this->getDataAccessObject()->daoGetId($user);
            $user->setIdUtilisateur($id[0]["ID_UTILISATEUR"]);
        }

        //function pour la recherche Utilisateur
        public function serviceSearch($search)
        {
            $data = $this->getDataAccessObject()->daoSearch($search);
            return $data;
        }

        //Fonction de modification des données utilisateur, prends comme parametre le post avec tout les inputs a modifier
        public function serviceUpdate($parametres)
        {
            $this->getDataAccessObject()->daoUpdate($parametres);
        }

        public function serviceUpdatePassword($id,$infos)
        {
            $mdpActuel = $infos["oldMdp"];
            $confirm = $infos["confirmNewMdp"] == $infos["newMdp"] ? True : False;
            $this->serviceVerifyActualPassword($id,$mdpActuel);
            return $confirm ? $this->getDataAccessObject()->daoUpdatePassword($id,$mdp = password_hash($infos["newMdp"], PASSWORD_DEFAULT)) : "Mots de passe incorect";
        }

        public function serviceVerifyActualPassword($nom, $mdpActuel)
        {
            $data = $this->serviceSelect($nom);
            password_verify($mdpActuel,$data["MDP"]);
        }

        // fonction de Suppression Utilisateur
        public function serviceDelete($nom)
        {
            $this->getDataAccessObject()->daoDelete($nom);
            return "Suppression réussie";
        }

        public function utilisateurServiceDisplayinfos($id)
        {
            $data = $this->serviceSelect($id); 
            echo
            '
            <div class="col-8 offset-2 border rounded border-black mt-2">
                <div class="row">
                    <div class="col-lg-6 mt-3">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 pb-2">
                                <div class="row">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Nom :</strong> '. $data["NOM"].'</li>
                                        <li class="list-group-item"><strong>Prénom :</strong> '.  $data["PRENOM"].'</li>
                                        <li class="list-group-item"><strong>Tel :</strong> '. $data["NUM"] .'</li>
                                        <li class="list-group-item"><strong>Email :</strong> '.$data["ADRESSE_EMAIL"].'</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 pb-2 ">
                                <div class="row">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><strong>Adresse : </strong> '. $data["NUMERO"]." ".$data["RUE"]. '  </li>
                                        <li class="list-group-item"><strong>Ville :</strong> '. $data["VILLE"].' </li>
                                        <li class="list-group-item"><strong>Code Postal : </strong>'. $data["CODE_POSTAL"].' </li>
                                        <li class="list-group-item"><strong>Pays : </strong> France </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }

        
        public function utilisateurServiceUpdatePanel($id)
        {
            $data = $this->serviceSelect($id);
            echo 
            '
                <div class="row">
                    <div class="col-lg-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <label for="userName">Nom :</label>
                                <input type="text" maxlength="50" class="form-control" name="NOM"  value="'. $data["NOM"].'" aria-describedby="UserName">
                            </li>
                            <li class="list-group-item">
                                <label for="userNickName">Prénom :</label>
                                <input type="text" maxlength="50" class="form-control" name="PRENOM"  value="'. $data["PRENOM"].'" aria-describedby="UserNickName">
                            </li>
                            <li class="list-group-item">
                                <label for="userPhone">Tel :</label>
                                <input type="text" maxlength="50" class="form-control" name="NUM"  value="'. $data["NUM"].'" aria-describedby="UserPhone">
                            </li>
                            <li class="list-group-item">
                                <label for="userMail">Adresse mail : </label>
                                <input type="email" class="form-control"  aria-describedby="emailHelp" name="ADRESSE_EMAIL" value="'. $data["ADRESSE_EMAIL"].'">
                                <small id="emailHelp" class="form-text text-muted">Nous ne partagerons pas votre adresse mail</small>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <label for="userAdress">Numero :</label>
                                <input type="text" maxlength="50" class="form-control" name="NUMERO" value="'. $data["NUMERO"].'" aria-describedby="UserAdressNumber">
                            </li>
                            <li class="list-group-item">
                                <label for="userAdress">Rue :</label>
                                <input type="text" maxlength="50" class="form-control" name="RUE" value="'. $data["RUE"].'" aria-describedby="UserRue">
                            </li>
                            <li class="list-group-item">
                                <label for="userCP">Code Postal : </label>
                                <input type="text" maxlength="50" class="form-control" name="CODE_POSTAL" value="'. $data["CODE_POSTAL"].'" aria-describedby="UserName">
                            </li>
                            <li class="list-group-item">
                                <label for="userTown">Ville : </label>
                                <input type="text" maxlength="50" class="form-control" name="VILLE" value="'. $data["VILLE"].'" aria-describedby="UserName">
                            </li>
                        </ul>
                    </div>
                </div>
                <!--PARTIE OU IL Y A LES BOUTONS VALIDER ET ANNULER -->
                <div class="row">
                    <div class="col-8 offset-2 borber rounded border-black mt-2">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 ">
                                <div class="row justify-content-center">
                                    <button type="button submit" class="btn btn-outline-primary" name="updateUserInfos">Valider les modifications</button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="row justify-content-center">
                                    <button type="button submit" class="btn btn-outline-secondary">Annuler les modifications</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            ';
        }


    }
?> 