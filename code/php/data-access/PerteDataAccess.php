<?php

    include_once '../Interfaces/InterfaceDao.php';
    include_once '../data-access/LogBdd.php';
    include_once '../model/MysqliQueryException.php';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    class PerteDataAccess extends LogBdd implements InterfaceDao{

        public function daoSelectAll(){
            $mysqli = $this->connexion();
            $rs = $mysqli->query('SELECT * from perte');
            $data = $rs->fetch_all(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoSelect(int $id){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from perte WHERE ID_ANIMAL = ? ');
            $stmt-> bind_param('s', $id );
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }
        public function daoSelectIdPerte(int $id){
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('SELECT * from perte WHERE ID_PERTE = ? ');
            $stmt-> bind_param('s', $id );
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $this->deconnexion($mysqli);
            return $data;
        }

        public function daoCount(){}

        public function daoAdd($perte){
            try{
            $datePerte = $perte->getDatePerte();
            $descPerte = $perte->getDescPerte();
            $idAnimal = $perte->getIdAnimal();
            $mysqli = $this->connexion();
            $stmt = $mysqli->prepare('INSERT INTO perte (DATE_PERTE, DESC_PERTE, ID_ANIMAL) VALUES (?,?,?) ');
            $stmt-> bind_param('sss', $datePerte,$descPerte,$idAnimal );
            $stmt->execute();
            $this->deconnexion($mysqli);
            return $result = $stmt ? "L'ajout a bien été effectué ! " : "L'ajout a échoué :/";
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            }    
        }
        public function daoSearch($search){}

        public function daoUpdate(array $parametres){}
        
        public function daoDelete($idAnimalRetrouve){
            try {
                $mysqli = $this->connexion();
                $stmt = $mysqli->prepare('DELETE FROM perte WHERE ID_ANIMAL = ?');
                $stmt-> bind_param('s',$idAnimalRetrouve);
                $stmt-> execute();
                $this->deconnexion($mysqli);   
            } catch (mysqli_sql_exception $mse) {                   
                throw new MysqliQueryException("Erreur SQL", $mse->getCode());                
            }catch (Exception $e) {
                throw $e;
            }            
        }
    }
?>



