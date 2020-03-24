<?php

include_once '../Interfaces/InterfaceDao.php';

    class AnimauxDataAccess implements InterfaceDao{
        public function connexion(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            return $mysqli;    
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
        public function daoSelectAll()
        {
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");
            $stmt -> execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectAllUserAnimals($id)
        {
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN avoir_couleur as C on A.ID_ANIMAL=C.ID_ANIMAL INNER JOIN couleur_animal as D on C.ID_COULEUR=D.ID_COULEUR  where ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelect($id){}
        public function daoCount(){}
        public function daoCountUserAnimal($id)
        {
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT count(ID_ANIMAL) from animaux  where ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $count = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $count;
        }
        public function daoAdd($objet){}
        public function daoSearch($search){}
        public function daoUpdate( $parametres){}

        public function daoDelete($id)
        {
            $mysqli = new mysqli('localhost', 'root', '', 'bddanimaux');
            $stmt = $mysqli->prepare('DELETE * FROM animaux where ID_ANIMAL = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $mysqli->close();
            return $stmt == true ? "Le retrait de la fiche a bien été effectué" : "Echec lors du retrait de la fiche";
        }
<<<<<<< HEAD
=======
    
>>>>>>> Changements sur le dao animaux
        public function selectAll(){
            $db=$this->connexion();
            $stmt = $db->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($db);  
            return $data;
        }
        public function selectRecherche($s_nomRace, $s_couleur){
            $db=$this->connexion();
            $stmt = $db->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur WHERE $s_nomRace AND $s_couleur");
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($db);  
            return $data;
        }
    }
?>