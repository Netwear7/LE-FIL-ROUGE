<?php
// je comprends pas trop cette page, tu pourras m'expliquer ?
include_once '../service/ServiceCommun.php';
include_once '../Interfaces/InterfaceService.php';

    class AnimauxService extends ServiceCommun implements InterfaceService {




        public function serviceSelectAll()
        {
            $data = $this->getDataAccessObject()->daoSelectAll();
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
                    }
            }
            return $data = $this->getDataAccessObject()->daoSearchAnimals($request,$type,$arrayOfValues);
        }

        public function serviceDisplaySelectGender() {

        $data = $this->getDataAccessObject()->daoDisplaySelectGender();
        return $data;

        }
                
        public function serviceUpdate($post)
        {

        }



        public function serviceSearch($search)
        {

        }



        public function serviceDelete($infosAnimalRetrait)
        {
            $result = $this->getDataAccessObject()->daoDelete($infosAnimalRetrait);
        }



        

        public function serviceDisplayUserAnimals($dataAnimaux)
        {
            
            $count = count($dataAnimaux);
            echo 
            '
                <div class="row mt-2 mb-3">
                    <div class="col-8 offset-2 text-center border rounded border-black text-center">
                        <div class="row m-3 ">
                            <div class="col-12 text-center">
                                <p> Pour ajouter un nouveau compagnon à votre liste, cliquez sur le bouton suivant : </p>
                                <button type="button" class="btn btn-outline-info" id="addAnimal-list" data-toggle="list" href="#list-addAnimal" role="tab" aria-controls="addmyAnimal">Ajoutez votre Compagnon</button>
                            </div>
                        </div>
                    </div>                                
                </div>
            ';
            for ($i = 0; $i < $count ; $i++) 
            
            {
                $cmpt = $i;
                
                echo 
                '
                <div class="row mt-2">
                    <div class="col-8 offset-2 border rounded border-black">
                        <div class="row">
                            <div class="col-4 ">
                                <div class="row">
                                    <a href="" data-toggle="modal" data-target="#modalPhotos'.$cmpt.'"><img src="../../img/Chat/chat3.jpg" class="rounded w-100"></a>
                                </div>                            
                                <div class="row">
                                    <!--Row pour les photos-->
                                </div>
                            </div>
                            <div class="col-2 text-center">
                                <div class="row mt-2">
                                    <div class="col-12">
                                    <h4>'.$dataAnimaux[$i]["NOM"].'</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p><strong>Race/Apparence</strong></p>
                                        <p>'.$dataAnimaux[$i]["NOM_RACE"].'</p>
                                    </div>                               
                                </div>
                                <div class="row ">
                                    <div class="col-12">
                                        <p><strong>Né le  : </strong><br/>'.$dataAnimaux[$i]["DATE_NAISSANCE"].'  </p>
                                    </div>                                
                                </div>
                                ';
                                $pasPerdu = '<a href="" data-toggle="modal" data-target="#modalPerdu'.$cmpt.'">Signaler perdu</a>';
                                $signalerRetrouver = '<a href="" data-toggle="modal" data-target="#modalRetrouvé'.$cmpt.'">Signaler Retrouvé</a>';
                            echo isset($dataAnimaux[$i]["PERDU"]) ?  $signalerRetrouver : $pasPerdu;                                                                            ;
                            echo '                            
                            </div>
                            <div class="col-5">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <ul class="list-group list-group-flush">
                                            <li >Robe : '.$dataAnimaux[$i]["ROBE"].'</li>
                                            <li >Couleur : '.$dataAnimaux[$i]["COULEUR"].'</li>
                                            <li >Caractère : '.$dataAnimaux[$i]["CARACTERE"].' </li>
                                        </ul>
                                    </div>
                                    <div class="col-6">
                                        <ul class="list-group list-group-flush">
                                            <li> Sexe : '.$dataAnimaux[$i]["SEXE"].'</li>
                                            <li >Poids : '.$dataAnimaux[$i]["POIDS"].' kg</li>
                                            <li >Taille : '.$dataAnimaux[$i]["TAILLE"].' cm</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <ul class="list-group list-group-flush">
                                            <li >Spécificités : <br/>'.$dataAnimaux[$i]["SPECIFICITE"].'</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">
                                <div class="row">
                                    <button type="button" class="btn btn-outline-info btn-block" id="modAnimal-list" data-toggle="list" href="#list-modAnimal'.$cmpt.'" role="tab" aria-controls="modAnimal">Modifier</button>
                                </div>
                                <div class="row">
                                    <button type="button" class="btn btn-outline-info mb-2 btn-block " data-toggle="modal" data-target="#modalRetrait'.$cmpt.'">Retrait</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                

                ';
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