<?php
    include_once '../Interfaces/InterfaceDao.php';
    include_once 'LogBdd.php';

    class PhotoAnimalDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from photo_animal');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        //Comprendre select all du tableau photoanimal mais que les photos de profil :
        public function daoSelectAllProfil(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT DISTINCT * from photo_animal where PHOTO_PROFIL = true');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectAllLostProfil(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT a.* from photo_animal as a
            INNER JOIN perte as b
            ON a.ID_ANIMAL = b.ID_ANIMAL
            where PHOTO_PROFIL = true');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectAllProfilMalade(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * FROM `est_infecte_par` as a 
            INNER JOIN photo_animal as b ON a.ID_ANIMAL = b.ID_ANIMAL');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($idAnimal){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from photo_animal where ID_PHOTO_ANIMAL = 3 and ID_ANIMAL = ?');
            $stmt->bind_param('i', $idAnimal);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoCount(){}
        public function daoAdd($photo){
            $bool = 1;
            $blob = $photo->getBlob();
            $photoNom = $photo->getPhotoNom();
            $photoTaille = $photo->getPhotoTaille();
            $photoType = $photo->getPhotoType();
            $idAnimal = $photo->getIdAnimal();
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO photo_animal(PHOTO,PHOTO_PROFIL,PHOTO_NOM,PHOTO_TAILLE,PHOTO_TYPE, ID_ANIMAL) VALUES(?,?,?,?,?,?)');
            $stmt->bind_param('sissss',$blob,$bool, $photoNom, $photoTaille, $photoType,$idAnimal);
            $stmt->execute();                
            $this->deconnexion($mysqli);
        }
        public function daoSearch($search){}
        public function daoUpdate( array $array){

        }
        public function Update($photo){
            $blob = $photo->getBlob();
            $photoNom = $photo->getPhotoNom();
            $photoTaille = $photo->getPhotoTaille();
            $photoType = $photo->getPhotoType();
            $idAnimal = $photo->getIdAnimal();
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('UPDATE photo_animal SET PHOTO = ?, PHOTO_NOM = ? , PHOTO_TAILLE = ?, PHOTO_TYPE = ? WHERE ID_ANIMAL = ?');
            $stmt->bind_param('sssss',$blob, $photoNom, $photoTaille, $photoType,$idAnimal);
            $stmt->execute();                
            $this->deconnexion($mysqli);
        }
        public function daoDelete($infos){
            $id = $infos["idAnimal"];
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('DELETE FROM photo_animal where ID_ANIMAL = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $this->deconnexion($mysqli);
            return $stmt == true ? "Le retrait de la fiche a bien été effectué" : "Echec lors du retrait de la fiche";
        }
    }
?>