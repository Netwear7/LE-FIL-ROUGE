<?php
    include_once('../data-access/LogBdd.php');
    include_once('../Interfaces/InterfaceDao.php');

class AnimauxFavorisDataAccess extends LogBdd implements InterfaceDao{



    public function daoSelectAll(){}


    public function daoSelectAllUserFavouritesAnimals($id)
    {
        $mysqli = $this->connexion();
        $stmt = $mysqli->prepare('SELECT * from etre_favoris as A INNER JOIN animaux as B on A.ID_ANIMAL = b.ID_ANIMAL INNER JOIN race as c on b.id_race = c.id_race INNER JOIN appartenir_espece as d on c.id_race = d.id_race inner join espece as e on d.ID_ESPECE = e.ID_ESPECE inner join avoir_couleur as f on f.ID_ANIMAL = A.ID_ANIMAL inner join couleur_animal as g on f.ID_COULEUR = g.ID_COULEUR INNER JOIN photo_animal as h on B.ID_ANIMAL = h.ID_ANIMAL where A.ID_UTILISATEUR =  ?');
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $this->deconnexion($mysqli);
        return $data;
    }


    public function daoSelect(int $id){
        $mysqli = $this->connexion();
        $stmt = $mysqli->prepare('SELECT * from etre_favoris as A INNER JOIN animaux as B on A.ID_ANIMAL = b.ID_ANIMAL INNER JOIN race as c on b.id_race = c.id_race INNER JOIN appartenir_espece as d on c.id_race = d.id_race inner join espece as e on d.ID_ESPECE = e.ID_ESPECE inner join avoir_couleur as f on f.ID_ANIMAL = A.ID_ANIMAL inner join couleur_animal as g on f.ID_COULEUR = g.ID_COULEUR INNER JOIN photo_animal as h on B.ID_ANIMAL = h.ID_ANIMAL where A.ID_UTILISATEUR =  ?');
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $rs->free();
        $this->deconnexion($mysqli);
        return $data;
    }
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

    public function daoVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal){

        $mysqli = $this->connexion(); 
        $stmt = $mysqli->prepare('SELECT * from etre_favoris where id_utilisateur=? AND id_animal=?');
        $stmt->bind_param('ii', $idUser, $idAnimal);
        $stmt->execute();
        $rs = $stmt->get_result();
        $data = $rs->fetch_all(MYSQLI_ASSOC);
        $this->deconnexion($mysqli);
        return $data;

    }

    public function daoAddFavouriteAnimal($idUser, $idAnimal){

        $mysqli = $this->connexion();
        $stmt = $mysqli->prepare('INSERT INTO etre_favoris(id_utilisateur,id_animal)  VALUES(?,?)');
        $stmt->bind_param('ii', $idUser, $idAnimal);
        $stmt->execute();
        $this->deconnexion($mysqli);

    }

    public function daoRemoveFavouriteAnimal($idUser, $idAnimal){

        $mysqli = $this->connexion();
        $stmt = $mysqli->prepare('DELETE FROM etre_favoris where id_utilisateur=? AND id_animal=?');
        $stmt->bind_param('ii', $idUser, $idAnimal);
        $stmt->execute();
        $this->deconnexion($mysqli);

    }

}
?>