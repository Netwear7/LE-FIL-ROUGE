<?php
// je comprends pas trop cette page, tu pourras m'expliquer ?
include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class AnimauxService extends ServiceCommun implements InterfaceService {




        public function serviceSelectAll()
        {
            $data = $this->getDataAccessObject()->daoSelectAllAdoptableAnimals();
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
            $data = $this->getDataAccessObject()->daoSelect($this->id);
            return $data;
        }


        public function serviceCount() 
        {

        }



        public function serviceCountAll() 
        {

        }



        public function serviceCountUserAnimals($id) 
        {
            return $this->getDataAccessObject()->daoCountUserAnimal($id);
        }



        public function serviceAdd(object $animal)
        {

        }



        public function serviceAddUserAnimal($animal)
        {

            $rs = $this->getDataAccessObject()->daoAddUserAnimal($animal);
            $id = $this->getDataAccessObject()->daoGetId($animal);
            $animal->setIdAnimal($id[0]["ID_ANIMAL"]);
            return $rs;
            
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
            $this->getDataAccessObject()->daoUpdate($post);
        }



        public function serviceSearch($search)
        {

        }



        public function serviceDelete($infosAnimalRetrait)
        {
            $result = $this->getDataAccessObject()->daoDelete($infosAnimalRetrait);
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