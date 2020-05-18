<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';
    include_once '../model/Animaux.php';

    class AnimauxService extends ServiceCommun implements InterfaceService {
        public function serviceSelectAll(){
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }

        public function serviceSelectAllAdoptableAnimals(){
            $data = $this->getDataAccessObject()->daoSelectAllAdoptableAnimals();
            return $data;
        }

        public function serviceSelectAdoptableAnimalsByType($espece){
            $data = $this->getDataAccessObject()->daoSelectAdoptableAnimalsByType($espece);
            return $data;
        }

        public function serviceSelectAllLostAnimals(){
            $data = $this->getDataAccessObject()->daoSelectAllLostAnimals();
            return $data;
        }

        public function serviceSelectLostAnimalById($idAnimal){
            $data = $this->getDataAccessObject()->daoSelectLostAnimalById($idAnimal);
            return $data;
        }
        
        public function serviceSelectAllProfilMalade(){
            return parent::getDataAccessObject()->daoSelectAllAnimalMalade();
        }

        public function serviceSelectAllUserAnimals($id)
        {
            $data = $this->getDataAccessObject()->daoSelectAllUserAnimals($id);
            return $data;
        }




        public function serviceSelect($id)
        {
            $data = $this->getDataAccessObject()->daoSelect($id);
            return $data;
        }
        public function serviceSelectId($id)
        {
            $data = $this->getDataAccessObject()->daoSelectId($id);
            return $data;
        }


        public function serviceCount() 
        {

        }

        public function carrousselDisplayLostAnimal($data){
            $cpt=0;
            for($j = 0 ;$j <= intdiv(count($data), 4); $j++ ){
                $class = $j == 0 ? "active": "";
                echo "<div class='carousel-item $class text-center'>";
                $maxIndex = (4 * ($cpt + 1)) > count($data) ? count($data) : 4 * ($cpt + 1);

                echo '<div class="row d-flex justify-content-center mt-1">';
                for($i=4*$cpt; $i < $maxIndex; $i++){
                    echo '<div class="col-lg-2 p-0 mr-4">';
                    echo "<p class='text-white'>". $data[$i]['nom']. "</p>";
                    echo '<img class="w-75 round-div mx-3" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'"/>';
                    echo "<p class='text-white'> Perdu le ". $data[$i]['DATE_PERTE']. "</p>";
                    echo "<p class='text-white mt-1 p-2' style='min-height: 80px;'>". $data[$i]['DESC_PERTE']. "</p>";
                    echo '</div>';

                }
                echo '<div class="col-lg-12"><a href="form-contact.php">Pour tout animal retrouvé. Contactez nous, nous préviendrons le Maitre de l\'animal.  /!\ Changer la tournure, j\'y ai pas réfléchis<a></div>';
                echo '</div>';
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
                    echo "<div class='parent-card col-lg-4 rounded text-center' data-toggle='modal' data-target='#myModal$i'>";
                    echo '<img id="'.$data[$i]['ID_ANIMAL'].'" class="w-75 d-inline-block img-fluid" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'"/>';
                    if($data[$i]['URGENCE'] == 1){
                        echo "<p class='mt-1'>".$data[$i]["NOM"]." <i class='fas fa-first-aid fa-sm' aria-hidden='true'><span class='badge badge-danger ml-1'> Urgent</span></i></p>";
                    }else{
                        echo "<p class='mt-1'>".$data[$i]["NOM"]." <i class='fas fa-first-aid fa-sm' aria-hidden='true'></i></p>";
                    }
                    echo "</div>";

                    echo '<div id="myModal'.$i.'" class="modal fade" role="dialog"">
                        <div class="modal-dialog modal-xl modal-dialog-centered">                    
                            <div class="modal-content" style="min-height:max-content">
                                <div class="col-12">
                                    <div class="row bg-light" style="font-size:1.4em">
                                        <div class="col-lg-4 col-sm-12 bg-1">
                                            <div class="row">
                                            <img style="z-index:1; height:100%; width:100%" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'"/>
                                            </div>                            
                                        </div>
                                        <div class="col-lg-3 col-sm-12 text-center bg-1 d-flex align-items-center">
                                            <div class="row ">
                                                <div class="col-12">
                                                <h3 class="text-break"><strong>'.$data[$i]["NOM"].'</strong></h3>
                                                </div>
                                                <div class="col-12">
                                                    <p class="text-break">Race : '.$data[$i]["NOM_RACE"].'</p>
                                                </div>   
                                                <div class="col-12">
                                                <p>Né le  : <br/>'.$data[$i]["DATE_NAISSANCE"].'  </p>
                                                </div>                           
                                            </div>                            
                                        </div>
                                        <div class="col-lg-5 col-sm-12 bg-1 d-flex align-items-center">
                                        
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12 d-flex align-items-center">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="mb-1">Identification : '.$data[$i]["NO_PUCE"].' </li>
                                                        <li class="mb-1">Poils : '.$data[$i]["ROBE"].'</li>
                                                        <li class="mb-1">Couleur : '.$data[$i]["COULEUR"].'</li>
                                                        
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <ul class="list-group list-group-flush">
                                                        <li> Sexe : '.$data[$i]["SEXE"].'</li>
                                                        <li >Poids : '.$data[$i]["POIDS"].' kg</li>
                                                        <li >Taille : '.$data[$i]["TAILLE"].' cm</li>
                                                        <li>Caractère : '.$data[$i]["CARACTERE"].'</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row bg-3" style="font-size:1.2em">
                                        <div class="col-lg-12 text-center p-2 bg-grey-light">
                                            <i>Vous avez eu un coup de coeur pour cet animal ? Contactez nous !</i>
                                            <p class="mb-0">ANITOPIA - '.$data[$i]["VILLE"].' </br> '.$data[$i]["NUMERO"].', '.$data[$i]["RUE"].' - '.$data[$i]["CODE_POSTAL"].' '.$data[$i]["VILLE"].' </br><i>tél</i> : '.$data[$i]["TELEPHONE"].' / <i>email</i> : '.$data[$i]["EMAIL"].'</p>
                                        </div>
                                    </div> 
                                </div>                         
                            </div>                
                        </div>
                    </div>';

                }
                $cpt++;
                echo "</div>";
            }
        }

        public function serviceCountAll() 
        {

        }



        public function serviceCountUserAnimals($id) 
        {
            return $this->getDataAccessObject()->daoCountUserAnimal($id);
        }

        public function serviceAddRefugeAnimal($animal)
        {
            $rs = $this->getDataAccessObject()->daoAddRefugeAnimal($animal);
            $id = $this->getDataAccessObject()->daoGetIdAnimalOfRefuge($animal);
            $animal->setIdAnimal($id[0]["ID_ANIMAL"]);
            return $rs;
        }

        public function serviceAdd(object $animal)
        {
            $this->getDataAccessObject()->daoAdd($animal);
        }


        public function serviceAddUserAnimal($animal)
        {
            try{
            $rs = $this->getDataAccessObject()->daoAddUserAnimal($animal);
            $animal->setIdAnimal($rs);
            return $rs;
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
            
        }

        public function serviceSearchAnimals($tab) : array {
            $request="";
            $type="";
            $counter=0;
            $tabLength=count(array_filter($tab));
            foreach(array_filter($tab) as $key=> $value) {
                switch ($key) {
                    case "nom_race" :
                        if($counter<$tabLength-1) {
                            $request.="B.nom_race like ? and ";
                        } else {
                            $request.= "B.nom_race like ?";
                        }
                        $type.="s";                       
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "nom_espece" :
                        if($counter<$tabLength-1) {
                            $request.="F.nom_espece like ? and ";
                        } else {
                            $request.= "F.nom_espece like ?";
                        }
                        $type.="s";                       
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "couleur" : 
                        if($counter<$tabLength-1) {
                            $request.="D.couleur like ? and ";
                        } else {
                            $request.= "D.couleur like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "ville" : 
                        if($counter<$tabLength-1) {
                            $request.="H.ville like ? and ";
                        } else {
                            $request.= "H.ville like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "sexe" : 
                        if($counter<$tabLength-1) {
                            $request.="A.sexe like ? and ";
                        } else {
                            $request.= "A.sexe like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "poil" : 
                        if($counter<$tabLength-1) {
                            $request.="A.robe like ? and ";
                        } else {
                            $request.= "A.robe like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "urgence" : 
                        if($counter<$tabLength-1) {
                            $request.="J.urgence like ? and ";
                        } else {
                            $request.= "J.urgence like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                }
            }
            return $data = $this->getDataAccessObject()->daoSearchAnimals($request,$type,$arrayOfValues);
        }

        public function serviceSearchAnimals2($tab) : array {
            $request="";
            $type="";
            $counter=0;
            $tabLength=count(array_filter($tab));
            foreach(array_filter($tab) as $key=> $value) {
                switch ($key) {
                    case "nom_race" :
                        if($counter<$tabLength-1) {
                            $request.="B.nom_race like ? and ";
                        } else {
                            $request.= "B.nom_race like ?";
                        }
                        $type.="s";                       
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "nom_espece" :
                        if($counter<$tabLength-1) {
                            $request.="F.nom_espece like ? and ";
                        } else {
                            $request.= "F.nom_espece like ?";
                        }
                        $type.="s";                       
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "couleur" : 
                        if($counter<$tabLength-1) {
                            $request.="D.couleur like ? and ";
                        } else {
                            $request.= "D.couleur like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "ville" : 
                        if($counter<$tabLength-1) {
                            $request.="H.ville like ? and ";
                        } else {
                            $request.= "H.ville like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "sexe" : 
                        if($counter<$tabLength-1) {
                            $request.="A.sexe like ? and ";
                        } else {
                            $request.= "A.sexe like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "poil" : 
                        if($counter<$tabLength-1) {
                            $request.="A.robe like ? and ";
                        } else {
                            $request.= "A.robe like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                }
            }
            return $data = $this->getDataAccessObject()->daoSearchAnimals2($request,$type,$arrayOfValues);
        }

        public function serviceSearchLostAnimals($tab) : array {
            $request="";
            $type="";
            $counter=0;
            $tabLength=count(array_filter($tab));
            foreach(array_filter($tab) as $key=> $value) {
                switch ($key) {
                    case "nom_race" :
                        if($counter<$tabLength-1) {
                            $request.="B.nom_race like ? and ";
                        } else {
                            $request.= "B.nom_race like ?";
                        }
                        $type.="s";                       
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "nom_espece" :
                        if($counter<$tabLength-1) {
                            $request.="F.nom_espece like ? and ";
                        } else {
                            $request.= "F.nom_espece like ?";
                        }
                        $type.="s";                       
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "couleur" : 
                        if($counter<$tabLength-1) {
                            $request.="D.couleur like ? and ";
                        } else {
                            $request.= "D.couleur like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "ville" : 
                        if($counter<$tabLength-1) {
                            $request.="H.ville like ? and ";
                        } else {
                            $request.= "H.ville like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "sexe" : 
                        if($counter<$tabLength-1) {
                            $request.="A.sexe like ? and ";
                        } else {
                            $request.= "A.sexe like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    case "poil" : 
                        if($counter<$tabLength-1) {
                            $request.="A.robe like ? and ";
                        } else {
                            $request.= "A.robe like ?";
                        }
                        $type.="s";
                        $counter++;
                        $arrayOfValues[$counter-1] = $value . "%";
                        break;
                    }
            }
            return $data = $this->getDataAccessObject()->daoSearchLostAnimals($request,$type,$arrayOfValues);
        }

        public function serviceDisplaySelectGender() {

        $data = $this->getDataAccessObject()->daoDisplaySelectGender();
        return $data;

        }
                
        public function serviceUpdate($post)
        {
            try{
            $this->getDataAccessObject()->daoUpdate($post);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }
        public function updatePostToEntityAndAdd($post){
            $this->getDataAccessObject()->daoUpdateAdmin($post);
        }


        public function serviceSearch($search)
        {

        }



        public function serviceDelete($infosAnimalRetrait)
        {
            try{
             $this->getDataAccessObject()->daoDelete($infosAnimalRetrait);
            }catch (MysqliQueryException $mqe) {
                throw $mqe;
            }
        }



        

        public function selectDelete($tab){
            $nomRace=$tab["nom_race"];
            $couleur=$tab["couleur"];
            $s_nomRace="B.nom_race LIKE ('$nomRace%')";
            $s_couleur="D.couleur LIKE ('$couleur%')";
            $data = $this->animauxDataAccess->selectRecherche($s_nomRace, $s_couleur);
            return $data;            
        }

    }
?>