<?php
    include_once('../data-access/LogBdd.php');
    include_once('../Interfaces/InterfaceDao.php');

class AnimauxFavorisDataAccess extends LogBdd implements InterfaceDao{



    public function daoSelectAll(){}


    public function daoSelectAllUserFavouritesAnimals($id)
    {
        $mysqli = new mysqli('localhost','root','','bddanimaux');
        $stmt = $mysqli->prepare('SELECT DISTINCT A.ID_UTILISATEUR, B.ID_ANIMAL, b.NOM, b.DATE_NAISSANCE, b.POIDS, b.NO_PUCE, b.CARACTERE, b.SPECIFICITE, b.TAILLE, b.ROBE,g.COULEUR, b.SEXE, c.NOM_RACE, e.NOM_ESPECE from etre_favoris as A INNER JOIN animaux as B on A.ID_ANIMAL = b.ID_ANIMAL INNER JOIN race as c on b.id_race = c.id_race INNER JOIN appartenir_espece as d on c.id_race = d.id_race inner join espece as e on d.ID_ESPECE = e.ID_ESPECE inner join avoir_couleur as f on f.ID_ANIMAL = A.ID_ANIMAL inner join couleur_animal as g on f.ID_COULEUR = g.ID_COULEUR where A.ID_UTILISATEUR =  ?');
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $mysqli->close();
        return $data;
    }


    public function daoSelect(int $id){}
    public function daoCount(){}
    public function daoAdd($object){}
    public function daoSearch($search){}
    public function daoUpdate($parametres){}


    public function daoDelete($infosRetraitFavoris){

        $idAnimal = $infosRetraitFavoris["retraitFavoris"];
        $idUtilisateur = $infosRetraitFavoris["id_utilisateur"];
        // a finir // 
        $mysqli = $this->connexion();
        $stmt = $mysqli->prepare('DELETE FROM etre_favoris where ID_ANIMAL = ? and ID_UTILISATEUR = ? ');
        $stmt->bind_param('ss',$idAnimal, $idUtilisateur);
        $stmt->execute();
        $this->deconnexion($mysqli);
    }
}
?>