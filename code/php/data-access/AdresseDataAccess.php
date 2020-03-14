<?php
include_once 'InterfaceDao.php';
    class AdresseDataAccess implements InterfaceDao{

        public function daoSelectAll()
        {
            
                $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');
                $stmt = $mysqli->prepare('SELECT * from adresse');
                $stmt->execute();
                $rs = $stmt->get_result();
                $data = $rs->fetch_all(MYSQLI_ASSOC);
                $rs->free();
                $mysqli->close();
                return $data;
        }


        public function daoSelect(string $id)
        {
            $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');
            $stmt = $mysqli->prepare('SELECT * from adresse  where ID_ADRESSE = ?');
            $stmt->bind_param('i',$idAdresse);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }

        public function daoCount()
        {

        }
        public function daoAjout(){}
        public function daoRecherche(){}
        public function daoModification(array $parametres){}


        public function daoDelete(string $idadresse)
        {
                $mysqli = new mysqli('localhost', 'Shakka', 'Shakkabdd62', 'projetfilrouge');
                $stmt = $mysqli->prepare('DELETE FROM adresse where ID_ADRESSE = ?');
                $stmt->bind_param('s',$idadresse);
                $stmt->execute();
                $mysqli->close();
                return   $result = $stmt ? "La suppression a bien été effectuée " : "La suppression a échouée ";
    
        }

    }
?>