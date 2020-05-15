<?php
    
    include_once("../data-access/PhotoAnimalDataAccess.php");
    include_once("../Interfaces/InterfaceService.php");
    include_once("../service/ServiceCommun.php");
    include_once("../model/PhotoAnimal.php");

    class PhotoAnimalService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }
        public function serviceSelect($id){}
        public function serviceCount(){}

        public function serviceAdd($photo){

            try{
                $this->getDataAccessObject()->daoAdd($photo);
                }catch (MysqliQueryException $mqe) {
                    throw $mqe;
                }
        }
        public function serviceSearch($search){}
        public function serviceUpdate(array $array){

        }
        public function update($photoAnimal){
            try{
            $this->getDataAccessObject()->update($photoAnimal);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }
        public function serviceDelete($infos){
            try{
                $this->getDataAccessObject()->daoDelete($infos);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }
        
    }
?>