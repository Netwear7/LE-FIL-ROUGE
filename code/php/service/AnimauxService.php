<?php

    include_once '../service/ServiceCommun.php';
    include_once '../Interfaces/InterfaceService.php';
    include_once '../model/Animaux.php';

    class AnimauxService extends ServiceCommun implements InterfaceService {
        public function serviceSelectAll()
        {
            $data = $this->getDataAccessObject()->daoSelectAll();
            return $data;
        }

        public function serviceSelectAllAdoptableAnimals()
        {
            $data = $this->getDataAccessObject()->daoSelectAllAdoptableAnimals();
            return $data;
        }

        public function serviceSelectAllLostAnimals()
        {
            $data = $this->getDataAccessObject()->daoSelectAllLostAnimals();
            return $data;
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


        public function serviceCount() 
        {

        }

        public function carrousselDisplayLostAnimal($data){
            $cpt=0;
            for($j = 0 ;$j <= intdiv(count($data), 4); $j++ ){
                $class = $j == 0 ? "active": "";
                echo "<div class='carousel-item $class text-center'>";
                $maxIndex = (4 * ($cpt + 1)) > count($data) ? count($data) : 4 * ($cpt + 1);

                echo '<div class="row d-flex justify-content-center">';
                for($i=4*$cpt; $i < $maxIndex; $i++){
                    echo '<div class="col-lg-2">';
                    echo '<img class="w-75 round-div mx-3" src="data:image/png;base64,'.base64_encode($data[$i]['PHOTO']).'" data-toggle="modal" data-target="#myModal'.$i.'"/>';
                    echo "<p class='text-white'> Perdu le ". $data[$i]['DATE_PERTE']. "</p>";
                    echo "<p class='text-white mt-1' style='min-height: 80px;'> Perdu le ". $data[$i]['DESC_PERTE']. "</p>";
                    echo '</div>';


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
                                                <h3 class="text-break"><strong>'.$data[$i]["nom"].'</strong></h3>
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
                                </div>                         
                            </div>                
                        </div>
                    </div>';


                }
                echo '<div class="col-lg-12"><a href="form-contact.php">Pour tout animal retrouvé. Contactez nous, nous préviendrons le Maitre de l\'animal.<a></div>';
                echo '</div>';
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

        public function serviceSelectAllLostAnimalsUser(){
            $data = parent::getDataAccessObject()->daoSelectAllLostAnimals();
            return $data;
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