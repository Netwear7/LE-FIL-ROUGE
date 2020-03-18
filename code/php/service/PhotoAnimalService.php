<?php
    include_once("../Interfaces/InterfaceService.php");
    include_once("../service/ServiceCommun.php");

    class PhotoAnimalService extends ServiceCommun implements InterfaceService{
        public function serviceSelectAll(){}
        public function serviceSelect($id){
            $data = $this->getDataAccessObject()->daoSelect($id);
            return $data;
        }
        public function serviceCount(){
            
        }
        public function serviceAdd($var){}
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($nom){}
        public function carrousselTest($data){
            echo "<div class='carousel-item active text-center'>";
            echo '<img class="d-inline-block w-20 mx-3" src="data:image/png;base64,'.base64_encode($data['PHOTO']).'"/>';

            echo '<img class="d-inline-block w-20 mx-3" src="data:image/png;base64,'.base64_encode($data['PHOTO']).'"/>';

            echo '<img class="d-inline-block w-20 mx-3" src="data:image/png;base64,'.base64_encode($data['PHOTO']).'"/>';

            echo '<img class="d-inline-block w-20 mx-3" src="data:image/png;base64,'.base64_encode($data['PHOTO']).'"/>';
            echo "</div>";
        }
    /*<div class="carousel-item active text-center">
        <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
        <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
        <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
        <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
    </div>*/
    }
?>