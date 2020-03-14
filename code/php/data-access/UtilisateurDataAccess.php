<?php

    include_once '../Interfaces/InterfaceDao.php';

    class UtilisateurDataAccess implements InterfaceDao{

        public function __construct()
        {

        }

        // fonction pour le select de tout les utilisateurs
        public function daoSelectAll()
        {

        }
        
        // fonction pour le select d'un seul utilisateur
        public function daoSelect($id)

        {
            $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');
            $idUtilisateur = $id;
            $stmt = $mysqli->prepare('SELECT * from utilisateur as A INNER JOIN adresse as B on A.ID_ADRESSE = B.ID_ADRESSE where ID_UTILISATEUR = ?');
            $stmt->bind_param('s',$idUtilisateur);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }

        // fonction pour le count
        public function daoCount()

        {

        }

        // fonction pour l'ajout

        public function daoAdd()

        {

        }

        // fonction pour la recherche
        public function daoSearch()

        {

        }

        

        //fonction pour la modification PRENDS EN PARAMETRE LE POST
        public function daoUpdate($parametres)

        {
            $sql ="";
            $num = '1';
            $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');


            if (!empty($parametres['nom'])) {
                $stmt = $mysqli->prepare("UPDATE utilisateur set NOM = ? where ID_UTILISATEUR = ?");
                $stmt->bind_param('ss',$parametres['nom'],$num);
                $stmt->execute();
            } else {
                false;
            }

            if (!empty($parametres['prénom'])) {
                $stmt = $mysqli->prepare("UPDATE utilisateur set PRENOM = ? where ID_UTILISATEUR = ?");
                $stmt->bind_param('ss',$parametres['prénom'],$num);
                $stmt->execute();
            } else {
                false;
            }

            if (!empty($parametres['tel'])) {
                $stmt = $mysqli->prepare("UPDATE utilisateur set NUM = ? where ID_UTILISATEUR = ?");
                $stmt->bind_param('ss',$parametres['tel'],$num);
                $stmt->execute();
            } else {
                false;
            }

            if (!empty($parametres['mail'])) {
                $stmt = $mysqli->prepare("UPDATE utilisateur set ADRESSE_EMAIL = ? where ID_UTILISATEUR = ?");
                $stmt->bind_param('ss',$parametres['mail'],$num);
                $stmt->execute();
            } else {
                false;
            }

            if (!empty($parametres['numero'])) {
                $stmt = $mysqli->prepare("UPDATE adresse set NUMERO = ? where ID_ADRESSE = ?");
                $stmt->bind_param('ss',$parametres['numero'],$num);
                $stmt->execute();

            }else {
                false;
            }

            if (!empty($parametres['rue'])) {
                $stmt = $mysqli->prepare("UPDATE adresse set RUE = ? where ID_ADRESSE = ?");
                $stmt->bind_param('ss',$parametres['rue'],$num);
                $stmt->execute();
            } else {
                false;
            }

            if (!empty($parametres['CP'])) {
                $stmt = $mysqli->prepare("UPDATE adresse set CODE_POSTAL = ? where ID_ADRESSE = ? " );
                $stmt->bind_param('ss',$parametres['CP'],$num);
                $stmt->execute();
            } else {
                false;
            }

            if (!empty($_POST['Ville'])) {
                $stmt = $mysqli->prepare("UPDATE adresse set VILLE = ? where ID_ADRESSE = ? " );
                $stmt->bind_param('ss',$parametres['Ville'],$num);
                $stmt->execute();
            } else {
                false;
            }

            
            $mysqli->close();




         //   $sql = !empty($parametres['nom']) ? "UPDATE utilisateur set NOM = '".$_POST['nom']."' where ID_UTILISATEUR = ".$num."; " : false;
        //    $sql .= !empty($parametres['prénom']) ? "UPDATE utilisateur set PRENOM = '".$parametres['prénom']."' where ID_UTILISATEUR = ".$num.";" : false;
           // $sql .= !empty($parametres['tel']) ? "UPDATE utilisateur set NUM = '".$parametres['tel']."' where ID_UTILISATEUR = ".$num.";" : false;
           // $sql .= !empty($parametres['mail']) ? "UPDATE utilisateur set ADRESSE_EMAIL = '".$parametres['mail']."' where ID_UTILISATEUR = ".$num.";" : false;
           // $sql .= !empty($parametres['numero']) ? "UPDATE adresse set NUMERO = '".$parametres['numero']."' where ID_ADRESSE = ".$num.";" : false;
           // $sql .= !empty($parametres['rue']) ? "UPDATE adresse set RUE = '".$parametres['rue']."' where ID_ADRESSE = ".$num.";" : false;
           // $sql .= !empty($parametres['CP']) ? "UPDATE adresse set CODE_POSTAL = '".$parametres['CP']."' where ID_ADRESSE = ".$num.";" : false;
           // $sql .= !empty($_POST['Ville']) ? "UPDATE adresse set VILLE = '".$parametres['Ville']."' where ID_ADRESSE = ".$num.";" : false;
            
           // return $result = $mysqli->multi_query($sql) === TRUE ? "Modification bien effectuées !" : "Erreur lors de l'ajout des informations :  " . $sql . "<br>"; 

        }

        public function daoUpdatePassword($id,$mdpHash)
        
        {
            $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');
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
        public function daoDelete($nom)

        {
            $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');
            $stmt = $mysqli->prepare('DELETE FROM utilisateurs where nom = ?');
            $stmt->bind_param('s',$nom);
            $stmt->execute();
            $mysqli->close();
            return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";

        }




    }
?>