<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';


    class UtilisateurService extends ServiceCommun implements InterfaceService {


        // fonction pour select tout les utilisateurs
        public function serviceSelectAll()
        {
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }

        //Select Utilisateur
        public function serviceSelect($id)
        {   
            try{
            $data = $this->getDataAccessObject()->daoSelect($id);
            return $data;
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }
        public function serviceSelectId($id)
        {   
            try{
            $data = $this->getDataAccessObject()->daoSelectId($id);
            return $data;
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
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
            try{
            $this->getDataAccessObject()->daoUpdate($parametres);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }

        public function serviceUpdatePassword($id,$infos)
        {
            try{
            return $this->getDataAccessObject()->daoUpdatePassword($id,password_hash($infos["newPassword"], PASSWORD_DEFAULT));
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
                
            
            
        }

        public function serviceVerifyActualPassword($id, $mdpActuel)
        {   
            try{
            $data = $this->serviceSelect($id);
            return  password_verify($mdpActuel,$data["MDP"]);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }

        // fonction de Suppression Utilisateur
        public function serviceDelete($nom)
        {
            $this->getDataAccessObject()->daoDelete($nom);
            return "Suppression réussie";
        }

        public function serviceResetPassword($mail){
            return $this->getDataAccessObject()->daoResetPassword($mail);
        }

    }
?> 