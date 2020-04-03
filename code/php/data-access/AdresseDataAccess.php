<?php
    include_once '../Interfaces/InterfaceDao.php';

    class AdresseDataAccess implements InterfaceDao{
        public function connexion(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            return $mysqli;    
        }
        public function deconnexion($mysqli){
            $mysqli->close();
        }
        


        public function daoSelectAll(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT * from adresse');
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }



        public function daoSelect($id){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT * from adresse  where ID_ADRESSE = ?');
            $stmt->bind_param('i',$idAdresse);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }



        // count des adresses dans la bdd
        public function daoCount(){}



        // ajout des adresses dans la bdd
        public function daoAdd($adresse)
        {   
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $num = $adresse->getNumero();
            $rue = $adresse->getRue();
            $ville = $adresse->getVille();
            $cp = $adresse->getCodePostal();
            $stmt = $mysqli->prepare('INSERT INTO adresse (NUMERO,RUE,VILLE,CODE_POSTAL) VALUES (?,?,?,?) ');
            $stmt->bind_param('ssss',$num,$rue,$ville,$cp);
            $stmt->execute();
            $mysqli->close();
            return $result = $stmt ? "l'adresse a bien été ajoutée" : "L'ajout de l'adresse a échoué";
        }



        //fonction pour récup l'id Adresse directement après l'ajout afin de récupérer 
        //l'id pour pouvoir créer l'utilisateur totalement
        public function daoGetId($adresse)
        {
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $num = $adresse->getNumero();
            $rue = $adresse->getRue();
            $ville = $adresse->getVille();
            $cp = $adresse->getCodePostal();
            $stmt = $mysqli->prepare('SELECT ID_ADRESSE from adresse where NUMERO = ? AND RUE = ? and VILLE = ? and CODE_POSTAL = ?');
            $stmt->bind_param('ssss', $num, $rue, $ville, $cp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $id = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $id;
        }



        public function daoSearch($search)
        {

        }


        public function daoUpdate($parametres)
        {
            $mysqli = $this->connexion(); 
            foreach ($parametres as $key => $value2){
                if ($key =="updateUserInfos"){
                    $this->deconnexion($mysqli); 
                    return $result = "Modification effectuées !";
                }
                if ($key == "NUMERO" or $key == "RUE" or $key =="CODE_POSTAL" or $key == "VILLE"){
                    $stmt = $mysqli->prepare("UPDATE utilisateur SET ".$key." = ? where ID_ADRESSE = ?");
                    $stmt->bind_param("ss",$value2,$num);
                    $stmt->execute();
                }
            }      
            $this->deconnexion($mysqli); 
            return $result = "Modification effectuées !";  
        }


        public function daoDelete($idadresse){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('DELETE FROM adresse where ID_ADRESSE = ?');
            $stmt->bind_param('s', $idadresse);
            $stmt->execute();
            $mysqli->close();
            return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";
        }

        public function daoAfficherVille(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT DISTINCT ville FROM adresse as A INNER JOIN refuge as B ON A.id_adresse=B.id_adresse WHERE A.id_adresse IN (B.id_adresse)');
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $data;            
        }

        public function daoSelectLostAnimalCities(){
            $mysqli = new mysqli('localhost','root','','bddanimaux');
            $stmt = $mysqli->prepare('SELECT DISTINCT ville FROM adresse as A 
                                      INNER JOIN utilisateur as B ON A.id_adresse=B.id_adresse 
                                      INNER JOIN animaux as C ON B.id_utilisateur=C.id_utilisateur 
                                      INNER JOIN perte as D ON C.id_animal=D.id_animal
                                      WHERE C.id_animal IN (D.id_animal)');
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $mysqli->close();
            return $data;            
        }
    }
?>