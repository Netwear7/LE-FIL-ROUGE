<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class UtilisateurDataAccess extends LogBdd   implements InterfaceDao{
        public function __construct(){
    
        }








        // fonction pour le select de tout les utilisateurs
        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from utilisateur');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }



        
        // fonction pour le select d'un seul utilisateur
        public function daoSelect($id)
        {
            try{
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from utilisateur as A INNER JOIN adresse as B on A.ID_ADRESSE = B.ID_ADRESSE where A.ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli); 
            return $data;
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            }   
        }




        // fonction pour le count
        public function daoCount(){}




        // fonction pour l'ajout de l'utilisateur
        public function daoAdd($user)
        {
            $mysqli = $this->connexion();
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $pseudo = $user->getPseudo();
            $mdp = $user->getPassword();
            $mail = $user->getEmail();
            $num = $user->getNum();
            $role = $user->getRole();
            $idAdresse = $user->getIdAdresse();
            $stmt = $mysqli->prepare('INSERT INTO utilisateur (NOM, PRENOM, PSEUDO,MDP,ADRESSE_EMAIL,NUM,ROLE,ID_ADRESSE) VALUES (?,?,?,?,?,?,?,?)');
            $stmt-> bind_param('ssssssss',$nom, $prenom,$pseudo,$mdp,$mail,$num,$role,$idAdresse);
            $stmt->execute();
            $this->deconnexion($mysqli); 
            return $result = $stmt ? "L'ajout a bien été effectué ! " : "L'ajout a échoué :/";
        }



        public function daoGetId($user)
        {
            $mysqli = $this->connexion(); 
            $mail = $user->getEmail();
            $mdp = $user->getPassword();
            $stmt = $mysqli->prepare('SELECT ID_UTILISATEUR from utilisateur where ADRESSE_EMAIL = ? AND MDP = ?');
            $stmt->bind_param('ss',$mail,$mdp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $id = $rs->fetch_all(MYSQLI_ASSOC);
            $this->deconnexion($mysqli);  
            return $id;
        }



        // fonction pour la recherche
        public function daoSearch($search){
            $mysqli = $this->connexion();
            $searchValue = $search["ADRESSE_EMAIL"];
            $stmt = $mysqli->prepare('SELECT * from utilisateur where ADRESSE_EMAIL = ?');
            $stmt->bind_param('s', $searchValue);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }



        //fonction pour la modification PRENDS EN PARAMETRE LE POST
        public function daoUpdate($parametres)
        {

                try{
                $mysqli = $this->connexion(); 
                foreach ($parametres as $key => $value){
                    if ($key =="updateUserInfos" || $key =="idAdresse" || $key == "idUtilisateur"){
                        $this->deconnexion($mysqli);  
                        return $result = "Modification effectuées !";
                    }
                    if ($key == "NOM" or $key == "PRENOM" or $key =="NUM" or $key == "ADRESSE_EMAIL"){
                        $id = $parametres["idUtilisateur"];
                        $stmt = $mysqli->prepare("UPDATE utilisateur SET ".$key." = ? where ID_UTILISATEUR = ?");
                        $stmt->bind_param("ss",$value,$id);
                    } else{
                        $id = $parametres["idAdresse"];
                        $stmt = $mysqli->prepare("UPDATE adresse SET ".$key." = ? where ID_ADRESSE = ?");
                        $stmt->bind_param("ss",$value,$id);
                    }
                    
                    $stmt->execute();

                }      
                $this->deconnexion($mysqli);   
                } catch (mysqli_sql_exception $mse) {                   
                    throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
                }catch (Exception $e) {
                    throw $e;
                }   
                
        }


        
        public function daoUpdatePassword($id,$mdpHash)
        {
            try{
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('UPDATE utilisateur SET MDP = ? where ID_UTILISATEUR = ?');
            $stmt->bind_param('ss',$mdpHash,$id);
            $stmt->execute();
            $this->deconnexion($mysqli);
            return $result = $stmt ? true : false ;
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            }
        }

        
        public function daoVerifyActualPassword()
        {

        }



        // Fonction pour la suppression
        public function daoDelete($nom){
            $mysqli = $this->connexion(); 
            $stmt = $mysqli->prepare('DELETE FROM utilisateur where nom = ?');
            $stmt->bind_param('s',$nom);
            $stmt->execute();
            $this->deconnexion($mysqli);
            return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";
        }

        public function daoResetPassword($mail){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * FROM utilisateur where ADRESSE_EMAIL = ?');
            $stmt->bind_param('s',$mail);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
    }
?>