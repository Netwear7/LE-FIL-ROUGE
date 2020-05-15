<?php

include_once '../data-access/LogBdd.php';
include_once '../Interfaces/InterfaceDao.php';
include_once '../model/MysqliQueryException.php';
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class AnimauxDataAccess extends LogBdd implements InterfaceDao{
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from animaux');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectAllAdoptableAnimals(){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare("SELECT A.*, B.*, D.*, E.*, F.*, G.* FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur
                                      INNER JOIN photo_animal as E on A.id_animal=E.id_animal
                                      INNER JOIN refuge as F on A.id_refuge=F.id_refuge
                                      INNER JOIN adresse as G on F.id_adresse=G.id_adresse
                                      WHERE A.id_refuge IS NOT NULL");
            $stmt -> execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectAllLostAnimals(){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare("SELECT A.*, A.nom, B.*, D.*, G.*, H.*, I.*, J.* 
                                      FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race 
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
                                      INNER JOIN appartenir_espece as E on B.id_race=E.id_race
                                      INNER JOIN espece as F on F.id_espece=E.id_espece
                                      INNER JOIN utilisateur as G on A.id_utilisateur=G.id_utilisateur
                                      INNER JOIN adresse as H on G.id_adresse=H.id_adresse
                                      INNER JOIN perte as I on I.id_animal=A.id_animal 
                                      INNER JOIN photo_animal as J on A.id_animal=J.id_animal
                                      WHERE A.id_animal IN (I.id_animal)");
            $stmt -> execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectLostAnimalById($idAnimal){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare("SELECT A.*, A.nom, B.*, D.*, G.*, H.*, I.*, J.* 
                                      FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race 
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
                                      INNER JOIN appartenir_espece as E on B.id_race=E.id_race
                                      INNER JOIN espece as F on F.id_espece=E.id_espece
                                      INNER JOIN utilisateur as G on A.id_utilisateur=G.id_utilisateur
                                      INNER JOIN adresse as H on G.id_adresse=H.id_adresse
                                      INNER JOIN perte as I on I.id_animal=A.id_animal 
                                      INNER JOIN photo_animal as J on A.id_animal=J.id_animal
                                      WHERE A.id_animal IN (I.id_animal) AND A.id_animal=?");
            $stmt->bind_param('i', $idAnimal);
            $stmt -> execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs -> free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectAllAnimalMalade(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query("SELECT * FROM animaux as A 
            INNER JOIN race as B on A.id_race = B.id_race 
            INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
            INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
            INNER JOIN appartenir_espece as E on B.id_race=E.id_race
            INNER JOIN espece as F on F.id_espece=E.id_espece
            INNER JOIN est_infecte_par as S on S.id_animal=A.id_animal
            INNER JOIN maladie as K on K.id_maladie=S.id_maladie
            INNER JOIN refuge as Y on Y.id_refuge=A.id_refuge
            INNER JOIN adresse as H on H.id_adresse=Y.id_adresse
            INNER JOIN photo_animal as J on A.id_animal=J.id_animal");
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelectAllUserAnimals($id){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN appartenir_espece as C on A.id_race = C.id_race INNER JOIN espece as D on C.ID_ESPECE = D.ID_ESPECE INNER JOIN avoir_couleur as E on A.ID_ANIMAL=E.ID_ANIMAL INNER JOIN couleur_animal as F on E.ID_COULEUR=F.ID_COULEUR INNER JOIN photo_animal as G on A.ID_ANIMAL = G.ID_ANIMAL  where ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelect($id){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from animaux as A INNER JOIN race as B on A.id_race = B.id_race INNER JOIN appartenir_espece as C on A.id_race = C.id_race INNER JOIN espece as D on C.ID_ESPECE = D.ID_ESPECE INNER JOIN avoir_couleur as E on A.ID_ANIMAL=E.ID_ANIMAL INNER JOIN couleur_animal as F on E.ID_COULEUR=F.ID_COULEUR INNER JOIN photo_animal as G on A.ID_ANIMAL = G.ID_ANIMAL  where A.ID_ANIMAL = ?');
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }


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

        public function daoAdd($object)
        {
        }
        
        public function daoAddRefugeAnimal($animal){
            $idRefuge = $animal->getIdRefuge();
            $nomAnimal = $animal->getNomAnimal();
            $dateNaissance= $animal->getDateNaissanceAnimal();
            $raceAnimal = $animal->getRaceAnimal();
            $sexeAnimal = $animal->getSexeAnimal();
            $numeroPuce = $animal->getNoPuce();
            $caractere= $animal->getCaractereAnimal();
            $robe = $animal->getRobeAnimal();
            // $couleur = $animal->getCouleurAnimal();
            $taille = $animal->getTailleAnimal();
            $dateArrivee = $animal->getDateArrivee();
            $dateSortie =  $animal->getDateSortie();
            $poids = $animal->getPoidsAnimal();
            $specificites = $animal->getSpecificiteAnimal();
    
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO animaux(NOM,DATE_NAISSANCE,POIDS,NO_PUCE,CARACTERE,SPECIFICITE,TAILLE,ROBE,DATE_ARRIVEE_ANIMAL,DATE_SORTIE_ANIMAL,ID_RACE,ID_UTILISATEUR, ID_REFUGE, SEXE) VALUES(?,?,?,?,?,?,?,?,?,?,?,NULL,?,?)');
            $stmt->bind_param('sssssssssssss', $nomAnimal,$dateNaissance,$poids,$numeroPuce, $caractere,$specificites,$taille,$robe,$dateArrivee, $dateSortie, $raceAnimal,$idRefuge, $sexeAnimal);
            $stmt->execute();
            $this->deconnexion($mysqli);
        }
        
        public function daoAddUserAnimal($animal)
        {
            try{
            $idUtilisateur = $animal->getIdUtilisateurAnimal();
            $nomAnimal = $animal->getNomAnimal();
            $dateNaissance= $animal->getDateNaissanceAnimal();
            $raceAnimal = $animal->getRaceAnimal();
            $sexeAnimal = $animal->getSexeAnimal();
            $numeroPuce = $animal->getNoPuce();
            $caractere= $animal->getCaractereAnimal();
            $robe = $animal->getRobeAnimal();
            $couleur = $animal->getCouleurAnimal();
            $taille = $animal->getTailleAnimal();
            $poids = $animal->getPoidsAnimal();
            $specificites = $animal->getSpecificiteAnimal();
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO animaux(NOM,DATE_NAISSANCE,POIDS,NO_PUCE,CARACTERE,SPECIFICITE,TAILLE,ROBE,DATE_ARRIVEE_ANIMAL,DATE_SORTIE_ANIMAL,ID_RACE,ID_UTILISATEUR, ID_REFUGE, SEXE) VALUES(?,?,?,?,?,?,?,?,NULL,NULL,?,?,NULL,?)');
            $stmt->bind_param('sssssssssss', $nomAnimal,$dateNaissance,$poids,$numeroPuce,$caractere,$specificites,$taille,$robe,$raceAnimal,$idUtilisateur, $sexeAnimal);
            $stmt->execute();   
            $id = mysqli_insert_id($mysqli);              
            $this->deconnexion($mysqli);
            return $id;
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            } 
        }



        public function daoGetId($animal)
        {
            try{
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
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            } 

        }
        public function daoGetIdAnimalOfRefuge($animal)
        {
            $mysqli = $this->connexion(); 
            $nom = $animal->getNomAnimal();
            $id = $animal->getIdRefuge();
            $stmt = $mysqli->prepare('SELECT ID_ANIMAL from animaux where NOM = ? AND ID_REFUGE = ?');
            $stmt->bind_param('ss',$nom,$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $id = $rs->fetch_all(MYSQLI_ASSOC);
            $this->deconnexion($mysqli);
            return $id;
        }


        

        public function daoSearch($search){}


        public function daoUpdate($parametres){
            try{
            $mysqli = $this->connexion();
            $num = $parametres["idAnimal"];
            foreach ($parametres as $key => $value){
                if ($key =="updateAnimalInfos" || $key == "idAnimal"){
                    $this->deconnexion($mysqli); 
                    return $result = "Modification effectuées !";
                }
                if ($key == "nomAnimal" or $key == "raceAnimale" or $key == "dateNaissance" or $key =="poids" or $key == "sexeAnimal" or $key == "numeroPuce" or $key == "taille" or $key == "specificite" or $key == "caractere" or $key =="robe"){
                    $key == "nomAnimal" ? $key = "NOM": false;
                    $key == "dateNaissance" ? $key ="DATE_NAISSANCE" : false ;
                    $key =="poids" ? $key ="POIDS": false ;
                    $key == "sexeAnimal" ? $key ="SEXE" : false;
                    $key == "robe" ? $key ="ROBE" : false;
                    $key == "numeroPuce" ? $key ="NO_PUCE" : false ;
                    $key == "taille" ? $key ="TAILLE" : false ;
                    $key == "specificite" ? $key ="SPECIFICITE" : false ;
                    $key == "caractere" ? $key ="CARACTERE" : false ;
                    $key =="raceAnimale"? $key ="ID_RACE" : false ; 
                    $stmt = $mysqli->prepare("UPDATE animaux SET ".$key." = ? where ID_ANIMAL = ?");
                    $stmt->bind_param("ss",$value,$num);
                    $stmt->execute();
                } elseif ($key == "couleur"){
                    $key="ID_COULEUR";
                    $stmt = $mysqli->prepare("UPDATE avoir_couleur SET ".$key." = ? where ID_ANIMAL = ?");
                    $stmt->bind_param("ss",$value,$num);
                    $stmt->execute();

                } 

            }      
            $this->deconnexion($mysqli);   
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            } 
        }
        

        public function daoDelete($infosAnimal)
        {
            try{
            $id = $infosAnimal["idAnimal"];
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('DELETE FROM animaux where ID_ANIMAL = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $this->deconnexion($mysqli);
            return $stmt == true ? "Le retrait de la fiche a bien été effectué" : "Echec lors du retrait de la fiche";
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            }  
        } 
 
        
        public function daoSearchAnimals($request,$type,$arrayOfValues){
            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT A.*, B.*, D.*, G.*, H.*,  K.* FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race 
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
                                      INNER JOIN appartenir_espece as E on B.id_race=E.id_race
                                      INNER JOIN espece as F on F.id_espece=E.id_espece
                                      INNER JOIN refuge as G on A.id_refuge=G.id_refuge
                                      INNER JOIN adresse as H on G.id_adresse=H.id_adresse
                                      INNER JOIN est_infecte_par as I on A.id_animal=I.id_animal
                                      INNER JOIN maladie as J on I.id_maladie=J.id_maladie
                                      INNER JOIN photo_animal as K on A.id_animal=K.id_animal
                                      WHERE $request");
            $stmt->bind_param($type, ...$arrayOfValues);
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;
        }

        public function daoSearchAnimals2($request,$type,$arrayOfValues){
            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT A.*, B.*, D.*, I.*, G.*, H.* FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race 
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
                                      INNER JOIN appartenir_espece as E on B.id_race=E.id_race
                                      INNER JOIN espece as F on F.id_espece=E.id_espece
                                      INNER JOIN refuge as G on A.id_refuge=G.id_refuge
                                      INNER JOIN adresse as H on G.id_adresse=H.id_adresse
                                      INNER JOIN photo_animal as I on A.id_animal=I.id_animal
                                      WHERE $request");
            $stmt->bind_param($type, ...$arrayOfValues);
            $stmt->execute();  
            $rs = $stmt->get_result();          
            $data= $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);  
            return $data;
        }

        public function daoSearchLostAnimals($request,$type,$arrayOfValues){

            $mysqli=$this->connexion();
            $stmt = $mysqli->prepare("SELECT A.*, A.nom, B.*, D.*, G.*, H.*, I.*, J.* FROM animaux as A 
                                      INNER JOIN race as B on A.id_race = B.id_race 
                                      INNER JOIN avoir_couleur as C on A.id_animal=C.id_animal 
                                      INNER JOIN couleur_animal as D on C.id_couleur=D.id_couleur 
                                      INNER JOIN appartenir_espece as E on B.id_race=E.id_race
                                      INNER JOIN espece as F on F.id_espece=E.id_espece
                                      INNER JOIN utilisateur as G on A.id_utilisateur=G.id_utilisateur
                                      INNER JOIN adresse as H on G.id_adresse=H.id_adresse
                                      INNER JOIN perte as I on I.id_animal=A.id_animal
                                      INNER JOIN photo_animal as J on A.id_animal=J.id_animal
                                      WHERE A.id_animal IN (I.id_animal) AND $request");
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