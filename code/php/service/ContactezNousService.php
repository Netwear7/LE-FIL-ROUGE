<?php

    include_once("../data-access/ContactezNousDataAccess.php");
    include_once("../model/ContactezNous.php");
    include_once('../service/ServiceCommun.php');
    include_once('../Interfaces/InterfaceService.php');

    class ContactezNousService extends ServiceCommun implements InterfaceService{
        /**
         * Ajout Du message contactezNous en base de donnée.
         * Je ne suis pas passer dans la fonction serviceAdd mais dans insertMessage car serviceAdd demande un objet. 
         * Moi je lui envoie le post, faudrait qu'on y regarde.
         * */
        public function InsertPostToEntityAndAdd(array $post){
            $contactezNous = new ContactezNous($post["message"], $post["motif"], $post["name"], $post["fname"], $post["id"]);
            $this->getDataAccessObject()->daoAdd($contactezNous);
        }
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){

        }
        public function serviceCount(){

        }
        public function serviceAdd(object $var){

        }
        public function serviceSearch($search){

        }
        public function serviceUpdate(array $post){

        }
        public function serviceDelete($nom){

        }

    }
?>