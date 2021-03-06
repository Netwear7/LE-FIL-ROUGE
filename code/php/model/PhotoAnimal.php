<?php
    class PhotoAnimal{
        private $idPhotoAnimal;
        private $blob;
        private $photoNom;
        private $photoTaille;
        private $photoType;
        private $photoProfil;
        private $idAnimal;


        public function __construct($photo,$id){
            $this->photoNom = $photo["name"];
            $this->photoTaille = $photo["size"];
            $this->photoType =  $photo['type'];
            $this->blob = file_get_contents ($photo['tmp_name']);
            $this->idAnimal = $id;
        }

        /**
         * Getter for IdPhotoAnimal
         *
         * @return [type]
         */
        public function getIdPhotoAnimal()
        {
            return $this->idPhotoAnimal;
        }

        /**
         * Setter for IdPhotoAnimal
         * @var [type] idPhotoAnimal
         *
         * @return self
         */
        public function setIdPhotoAnimal($idPhotoAnimal)
        {
            $this->idPhotoAnimal = $idPhotoAnimal;
            return $this;
        }


        /**
         * Getter for Blob
         *
         * @return [type]
         */
        public function getBlob()
        {
            return $this->blob;
        }

        /**
         * Setter for Blob
         * @var [type] blob
         *
         * @return self
         */
        public function setBlob($blob)
        {
            $this->blob = $blob;
            return $this;
        }


        /**
         * Getter for PhotoNom
         *
         * @return [type]
         */
        public function getPhotoNom()
        {
            return $this->photoNom;
        }

        /**
         * Setter for PhotoNom
         * @var [type] photoNom
         *
         * @return self
         */
        public function setPhotoNom($photoNom)
        {
            $this->photoNom = $photoNom;
            return $this;
        }


        /**
         * Getter for PhotoTaille
         *
         * @return [type]
         */
        public function getPhotoTaille()
        {
            return $this->photoTaille;
        }

        /**
         * Setter for PhotoTaille
         * @var [type] photoTaille
         *
         * @return self
         */
        public function setPhotoTaille($photoTaille)
        {
            $this->photoTaille = $photoTaille;
            return $this;
        }


        /**
         * Getter for PhotoType
         *
         * @return [type]
         */
        public function getPhotoType()
        {
            return $this->photoType;
        }

        /**
         * Setter for PhotoType
         * @var [type] photoType
         *
         * @return self
         */
        public function setPhotoType($photoType)
        {
            $this->photoType = $photoType;
            return $this;
        }


        /**
         * Get the value of idAnimal
         */ 
        public function getIdAnimal()
        {
                return $this->idAnimal;
        }

        /**
         * Set the value of idAnimal
         *
         * @return  self
         */ 
        public function setIdAnimal($idAnimal)
        {
                $this->idAnimal = $idAnimal;

                return $this;
        }

                /**
         * Getter for PhotoProfil
         *
         * @return [type]
         */
        public function getPhotoProfil()
        {
            return $this->photoProfil;
        }

        /**
         * Setter for PhotoProfil
         * @var [type] photoProfil
         *
         * @return self
         */
        public function setPhotoProfil($photoProfil)
        {
            $this->photoProfil = $photoProfil;
            return $this;
        }
    }
?>