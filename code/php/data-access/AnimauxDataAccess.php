<?php

include_once '../Interfaces/InterfaceDao.php';

    class AnimauxDataAccess implements InterfaceDao{


        public function connexion(){
            $db = new mysqli('localhost','root','','bddanimaux');
            return $db;    
        }

        public function daoModificationMdp($a,$b){}
        public function daoSelectAll()
        {

        }
        public function daoSelect($id){}
        public function daoCount(){}
        public function daoAjout(){}
        public function daoRecherche(){}
        public function daoModification( $parametres){}
        public function daoSuppression($nom){}

        public function deconnexion($db){
            $db -> close();
        }

        public function selectAll(){
            $db=$this->connexion();
            $stmt = $db -> prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);  
            return $data;
        }

        public function selectRecherche($s_nomRace, $s_couleur){
            $db=$this->connexion();
            $stmt = $db -> prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur WHERE $s_nomRace AND $s_couleur");
            $stmt -> execute();  
            $rs = $stmt -> get_result();          
            $data= $rs -> fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($db);  
            return $data;
        }

    }
?>