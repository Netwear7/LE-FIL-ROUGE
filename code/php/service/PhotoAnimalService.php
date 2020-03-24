<?php
    
    include_once("../data-access/PhotoAnimalDataAccess.php");
    include_once("../Interfaces/InterfaceService.php");
    include_once("../service/ServiceCommun.php");

    class PhotoAnimalService extends ServiceCommun implements InterfaceService{

        //##########################################################################//
        //      Utiliser $data = $this->dataAccess->LaFonction(de dataAccess)       //
        //          $this->dataAccess = new PhotoAnimalDataAccess(); C'est un objet //
        //##########################################################################//
        private $dataAccess;
        
        public function __construct(){
            $this->dataAccess = new PhotoAnimalDataAccess();
        }

        //##########################################################################//

        public function serviceSelectAll(){}
        public function serviceSelectAllProfil(){
            $data = $this->dataAccess->daoSelectAllProfil();
            return $data;
        }
        public function serviceSelect($id){}
        public function serviceCount(){}
        public function serviceAdd($var){}
        public function serviceSearch($search){}
        public function serviceUpdate($post){}
        public function serviceDelete($nom){}
        public function carrousselTest($data){
            // var_dump($data);
            $cpt=0;


            for($j = 0 ;$j <= intdiv(count($data), 4); $j++ ){
                $class = $j == 0 ? "active": "";
                echo "<div class='carousel-item $class text-center'>";
                $maxIndex = (4 * ($cpt + 1)) > count($data) ? count($data) : 4 * ($cpt + 1);

                for($i=4*$cpt; $i < $maxIndex; $i++){
                    echo '<img class="d-inline-block w-20 mx-3" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'"/>';
                }
                $cpt++;
                echo "</div>";
            }
        }

        /*<div class="carousel-item active text-center">
            <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
            <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
            <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
            <img class="d-inline-block w-20 mx-3" src="http://localhost/LE-FIL-ROUGE/code/img/chat1.jpg" alt="Second slide">
        </div>*/

    /**
         * Getter for DataAccess
         *
         * @return [type]
         */
        public function getDataAccess()
        {
            return $this->dataAccess;
        }

        /**
         * Setter for DataAccess
         * @var [type] dataAccess
         *
         * @return self
         */
        public function setDataAccess($dataAccess)
        {
            $this->dataAccess = $dataAccess;
            return $this;
        }


    }
?>