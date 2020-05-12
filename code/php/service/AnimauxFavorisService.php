<?php
include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

class AnimauxFavorisService extends ServiceCommun implements InterfaceService{

    public function serviceSelectAll(){}
    
    public function serviceSelectAllUserFavouriteAnimals($id)
    {
        $data = $this->getDataAccessObject()->daoSelectAllUserFavouritesAnimals($id);
        return $data;
    }

    public function serviceSelect($id){
        return $this->getDataAccessObject()->daoSelect($id);
    }
    public function serviceCount(){}
    public function serviceAdd(object $var){}
    public function serviceSearch($search){}
    public function serviceUpdate($post){}

    public function serviceDelete($infosRetraitFavoris){
        try{
        $this->getDataAccessObject()->daoDelete($infosRetraitFavoris);
        }catch (MysqliQueryException $mqe) {
            throw $mqe;
        }
    }
    public function serviceCountUserFavouriteAnimals($id){}


    public function serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal){
        $data = $this->getDataAccessObject()->daoVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);
        return $data;
    }

    public function  serviceAddOrRemoveFavouriteAnimal($idUser, $idAnimal){

        $data=$this->serviceVerifyIfAnimalAlreadyFavourite($idUser, $idAnimal);

        if(count($data)>0){
            $this->getDataAccessObject()->daoRemoveFavouriteAnimal($idUser, $idAnimal);
        }
        else{
            $this->getDataAccessObject()->daoAddFavouriteAnimal($idUser, $idAnimal);            
        }

        return $data;

    }

}


?>