<?php
    
    include_once("../data-access/PhotoAnimalDataAccess.php");
    include_once("../Interfaces/InterfaceService.php");
    include_once("../service/ServiceCommun.php");

    class PhotoAnimalService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){}
        public function serviceSelectAllProfil(){
            $data = parent::getDataAccessObject()->daoSelectAllProfil();
            return $data;
        }
        public function serviceSelectAllLostProfil(){
            $data = parent::getDataAccessObject()->daoSelectAllLostProfil();
            return $data;
        }
        public function serviceSelectAllProfilMalade(){
            return parent::getDataAccessObject()->daoSelectAllProfilMalade();
        }
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($var){}
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($nom){}
        public function carrousselDisplayLostAnimal($data){
            $cpt=0;
            for($j = 0 ;$j <= intdiv(count($data), 4); $j++ ){
                $class = $j == 0 ? "active": "";
                echo "<div class='carousel-item $class text-center'>";
                $maxIndex = (4 * ($cpt + 1)) > count($data) ? count($data) : 4 * ($cpt + 1);

                for($i=4*$cpt; $i < $maxIndex; $i++){
                    echo '<img class="img-round d-inline-block w-20 mx-3" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'"/>';
                }
                $cpt++;
                echo "</div>";
            }
        }
        public function displayAnimalsMalade($data){
            $cpt=0;
            for($j = 0 ;$j <= intdiv(count($data), 3); $j++ ){
                $class = $j == 0 ? "active": "";
                echo "<div class='row mt-1 mb-5'>";
                $maxIndex = (3 * ($cpt + 1)) > count($data) ? count($data) : 3 * ($cpt + 1);

                for($i=3*$cpt; $i < $maxIndex; $i++){
                    echo "<div class='parent-card col-lg-4 rounded text-center'>";
                    echo '<img id="'.$data[$i]['ID_ANIMAL'].'" class="w-75 d-inline-block img-fluid" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'"/>';
                    echo "<div class='row'>";
                    echo "<div class='col-lg-12 card-body bg-secondary' style='heigth : 400px; display: none;'>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                $cpt++;
                echo "</div>";
            }
        }
    }
?>