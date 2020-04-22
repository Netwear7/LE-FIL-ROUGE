<?php



include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class DonationService extends ServiceCommun implements InterfaceService {

        public function serviceSelectAll(){
            return $this->getDataAccessObject()->daoSelectAll();
        }
        public function serviceSelectAllUserDonations($id){
            return $this->getDataAccessObject()->daoSelectAllUserDonations($id);
        }
        public function serviceSelect($id){

        }
        public function serviceCount(){}
        public function serviceAdd(object $var){

        }
        public function serviceSearch($search){

        }
        public function serviceUpdate(array $post){

        }
        public function serviceDelete($nom){

        }
    }