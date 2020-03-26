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
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT * from animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN appartenir_espece as C on A.id_race = C.id_race INNER JOIN espece as D on C.ID_ESPECE = D.ID_ESPECE INNER JOIN avoir_couleur as E on A.ID_ANIMAL=E.ID_ANIMAL INNER JOIN couleur_animal as F on E.ID_COULEUR=F.ID_COULEUR  where ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }


        public function daoSelect($id){}


        public function daoCount(){}

        
        public function daoCountUserAnimal($id)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT count(ID_ANIMAL) from animaux  where ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $count = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $count;
        }


        public function daoAdd($objet)
        {
            
        }

        
        public function daoAddUserAnimal($animal)
        {
            
            $idUtilisateur = $animal->getIdUtilisateurAnimal();
            $nomAnimal = $animal->getNomAnimal();
            $dateNaissance= $animal->getDateNaissanceAnimal();
            $especeAnimal = $animal->getEspeceAnimal();
            $raceAnimal = $animal->getRaceAnimal();
            $sexeAnimal = $animal->getSexeAnimal();
            $numeroPuce = $animal->getNoPuce();
            $caractere= $animal->getCaractereAnimal();
            $robe = $animal->getRobeAnimal();
            $couleur = $animal->getCouleurAnimal();
            $taille = $animal->getTailleAnimal();
            $poids = $animal->getPoidsAnimal();
            $specificites = $animal->getSpecificiteAnimal();
            $raceAnimal == "Main coon" ? $raceAnimal = "1" : false;
                $mysqli = new mysqli('localhost','root','','bddanimaux');
                $stmt = $mysqli->prepare('INSERT INTO animaux(NOM,DATE_NAISSANCE,POIDS,NO_PUCE,CARACTERE,SPECIFICITE,TAILLE,ROBE,DATE_ARRIVEE_ANIMAL,DATE_SORTIE_ANIMAL,ID_RACE,ID_UTILISATEUR, ID_REFUGE, ID_GARDERIE, SEXE) VALUES(?,?,?,?,?,?,?,?,NULL,NULL,?,?,NULL,NULL,?)');
                $stmt->bind_param('sssssssssss', $nomAnimal,$dateNaissance,$poids,$numeroPuce,$caractere,$specificites,$taille,$robe,$raceAnimal,$idUtilisateur, $sexeAnimal);
                $stmt->execute();
                
                $mysqli->close();
        }

        public function daoGetId($animal)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');   
            $nom = $animal->getNomAnimal();
            $id = $animal->getIdUtilisateurAnimal();
            $stmt = $mysqli->prepare('SELECT ID_ANIMAL from animaux where NOM = ? AND ID_UTILISATEUR = ?');
            $stmt->bind_param('ss',$nom,$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $id = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $id;
        }

        

        public function daoSearch($search){}
        public function daoUpdate( $parametres){}

        public function daoDelete($id)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('DELETE * FROM animaux where ID_ANIMAL = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $mysqli->close();
            return $stmt == true ? "Le retrait de la fiche a bien été effectué" : "Echec lors du retrait de la fiche";
        }

        
        public function selectAll(){
            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;
        }
        public function daoSearchAnimals($s_nomRace, $s_couleur){
            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur WHERE $s_nomRace AND $s_couleur");
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;
        }
    }
?>