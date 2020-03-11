<?php
    class PhotoAnimal{
        private $idPhotoAnimal;
        private $blob;
        private $photoNom;
        private $photoTaille;
        private $photoType;

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

    }
?>