<?php
    include_once '../Interfaces/InterfaceDao.php';

    class PhotoAnimalDataAccess implements InterfaceDao{
        public function connexion(){
            return new mysqli('localhost', 'root', '', 'bddanimaux');
        }
        public function daoSelectAll(){

        }
        public function daoSelect($idImage){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from photo_animal where ID_PHOTO_ANIMAL = ?');
            $stmt->bind_param('i', $idImage);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }
        public function daoCount(){

        }
        public function daoAdd($object){

        }
        public function daoSearch($search){

        }
        public function daoUpdate($parametres){
            
        }
        public function daoDelete($nom){
            
        }
    }
?>