<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';

class AnimauxDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            // Sans info en entrée, on peut utiliser 
            //$mysqli->query directement, et donc pas besoin de stmt->execute()

            /*
            $rs = $mysqli->query("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");  
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            ...
            */

            $stmt = $mysqli->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race");
            $stmt -> execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectAllAdoptableAnimals(){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare("SELECT A.nom, B.nom_race FROM animaux as A INNER JOIN race as B on A.id_race = B.id_race WHERE A.id_refuge IS NOT NULL");
            $stmt -> execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);
            return $data;
        }


        public function daoSelectAllUserAnimals($id){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN appartenir_espece as C on A.id_race = C.id_race INNER JOIN espece as D on C.ID_ESPECE = D.ID_ESPECE INNER JOIN avoir_couleur as E on A.ID_ANIMAL=E.ID_ANIMAL INNER JOIN couleur_animal as F on E.ID_COULEUR=F.ID_COULEUR  where ID_UTILISATEUR = ?');
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
                $mysqli = $this->connexion();
                $stmt = $mysqli->prepare('INSERT INTO animaux(NOM,DATE_NAISSANCE,POIDS,NO_PUCE,CARACTERE,SPECIFICITE,TAILLE,ROBE,DATE_ARRIVEE_ANIMAL,DATE_SORTIE_ANIMAL,ID_RACE,ID_UTILISATEUR, ID_REFUGE, ID_GARDERIE, SEXE) VALUES(?,?,?,?,?,?,?,?,NULL,NULL,?,?,NULL,NULL,?)');
                $stmt->bind_param('sssssssssss', $nomAnimal,$dateNaissance,$poids,$numeroPuce,$caractere,$specificites,$taille,$robe,$raceAnimal,$idUtilisateur, $sexeAnimal);
                $stmt->execute();                
                $this->deconnexion($mysqli);
        }



        public function daoGetId($animal)
        {
            $mysqli = $this->connexion(); 
            $nom = $animal->getNomAnimal();
            $id = $animal->getIdUtilisateurAnimal();
            $stmt = $mysqli->prepare('SELECT ID_ANIMAL from animaux where NOM = ? AND ID_UTILISATEUR = ?');
            $stmt->bind_param('ss',$nom,$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $id = $rs->fetch_all(MYSQLI_ASSOC);
            $this->deconnexion($mysqli);
            return $id;
        }


        

        public function daoSearch($search){}


        public function daoUpdate($parametres){
            $mysqli = $this->connexion();
            foreach ($parametres as $key => $value2){
                if ($key =="updateAnimalInfos"){
                    $this->deconnexion($mysqli); 
                    return $result = "Modification effectuées !";
                }
                if ($key == "NOM" or $key == "PRENOM" or $key =="NUM" or $key == "ADRESSE_EMAIL"){
                    $stmt = $mysqli->prepare("UPDATE animaux SET ".$key." = ? where ID_ANIMAL = ?");
                } else{
                    $stmt = $mysqli->prepare("UPDATE avoir_couleur SET ".$key." = ? where ID_ANIMAL = ?");

                }
                $stmt->bind_param("ss",$value2,$num);
                $stmt->execute();

            }      
            $this->deconnexion($mysqli);    
        }
        

        public function daoDelete($infosAnimal)
        {
            $id = $infosAnimal["idAnimalRetrait"];
            $idCouleur = $infosAnimal["couleurAnimalRetrait"];
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('DELETE FROM animaux where ID_ANIMAL = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $stmt2 = $mysqli->prepare('DELETE from avoir_couleur where ID_ANIMAL = ? and ID_COULEUR = ?');
            $stmt2->bind_param('ss',$id, $idCouleur);
            $stmt2->execute();

            $this->deconnexion($mysqli);
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
 
        
        public function daoSearchAnimals($request,$type,$arrayOfValues){
            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT A.nom, B.nom_race FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race 
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
                                      INNER JOIN appartenir_espece as E on B.id_race=E.id_race
                                      INNER JOIN espece as F on F.id_espece=E.id_espece
                                      INNER JOIN refuge as G on A.id_refuge=G.id_refuge
                                      INNER JOIN adresse as H on G.id_adresse=H.id_adresse
                                      WHERE $request");
            $stmt->bind_param($type, ...$arrayOfValues);
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;
        }

        public function daoDisplaySelectGender(){

            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT DISTINCT sexe FROM animaux");
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;

        }
    }
?>