<?php

    include_once '../data-access/LogBdd.php';
    include_once '../Interfaces/InterfaceDao.php';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class UtilisateurDataAccess extends LogBdd   implements InterfaceDao{
        public function __construct(){
    
        }








        // fonction pour le select de tout les utilisateurs
        public function daoSelectAll(){

        }



        
        // fonction pour le select d'un seul utilisateur
        public function daoSelect($id)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT * from utilisateur as A INNER JOIN adresse as B on A.ID_ADRESSE = B.ID_ADRESSE where A.ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$id);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }




        // fonction pour le count
        public function daoCount(){}




        // fonction pour l'ajout de l'utilisateur
        public function daoAdd($user)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $nom = $user->getNom();
            $prenom = $user->getPrenom();
            $pseudo = $user->getPseudo();
            $mdp = $user->getPassword();
            $mail = $user->getEmail();
            $num = $user->getNum();
            $idAdresse = $user->getIdAdresse();
            $stmt = $mysqli->prepare('INSERT INTO utilisateur (NOM, PRENOM, PSEUDO,MDP,ADRESSE_EMAIL,NUM,ID_ADRESSE) VALUES (?,?,?,?,?,?,?) ');
            $stmt-> bind_param('sssssss',$nom, $prenom, $pseudo, $mdp, $mail, $num, $idAdresse);
            $stmt->execute();
            $mysqli->close();
            return $result = $stmt ? "L'ajout a bien été effectué ! " : "L'ajout a échoué :/";
        }



        public function daoGetId($user)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');   
            $mail = $user->getEmail();
            $mdp = $user->getPassword();
            $stmt = $mysqli->prepare('SELECT ID_UTILISATEUR from utilisateur where ADRESSE_EMAIL = ? AND MDP = ?');
            $stmt->bind_param('ss',$mail,$mdp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $id = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
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

            
                $mysqli = $this->connexion(); 
                foreach ($parametres as $key => $value){
                    if ($key =="updateUserInfos" || $key =="idAdresse" || $key == "idUtilisateur"){
                        $mysqli->close();
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
                $mysqli->close();      
                
        }


        
        public function daoUpdatePassword($id,$mdpHash)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux'); 
            $stmt = $mysqli->prepare('UPDATE utilisateur SET MDP = ? where ID_UTILISATEUR = ?');
            $stmt->bind_param('ss',$mdpHash,$id);
            $stmt->execute();
            $mysqli->close();
            return $result = $stmt ? "La modification a bien été effectuée " : "La modification a échouée ";
        }

        
        public function daoVerifyActualPassword()
        {

        }



        // Fonction pour la suppression
        public function daoDelete($nom){
            $mysqli = new mysqli('localhost','root','','bddanimaux'); 
            $stmt = $mysqli->prepare('DELETE FROM utilisateur where nom = ?');
            $stmt->bind_param('s',$nom);
            $stmt->execute();
            $mysqli->close();
            return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";
        }
    }
?>