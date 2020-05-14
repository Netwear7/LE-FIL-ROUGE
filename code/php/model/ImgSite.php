<?php
    class ImgSite{
        private $idImgSite;
        private $imgNom;
        private $imgTaille;
        private $imgType;
        private $blob;

        public function __construct($photo){
            $this->imgNom = $photo["name"];
            $this->imgTaille = $photo["size"];
            $this->imgType =  $photo['type'];
            $this->blob = file_get_contents ($photo['tmp_name']);
        }

        /**
         * Getter for IdImgSite
         *
         * @return [type]
         */
        public function getIdImgSite()
        {
            return $this->idImgSite;
        }

        /**
         * Setter for IdImgSite
         * @var [type] idImgSite
         *
         * @return self
         */
        public function setIdImgSite($idImgSite)
        {
            $this->idImgSite = $idImgSite;
            return $this;
        }


        /**
         * Getter for ImgNom
         *
         * @return [type]
         */
        public function getImgNom()
        {
            return $this->imgNom;
        }

        /**
         * Setter for ImgNom
         * @var [type] imgNom
         *
         * @return self
         */
        public function setImgNom($imgNom)
        {
            $this->imgNom = $imgNom;
            return $this;
        }


        /**
         * Getter for ImgTaille
         *
         * @return [type]
         */
        public function getImgTaille()
        {
            return $this->imgTaille;
        }

        /**
         * Setter for ImgTaille
         * @var [type] imgTaille
         *
         * @return self
         */
        public function setImgTaille($imgTaille)
        {
            $this->imgTaille = $imgTaille;
            return $this;
        }


        /**
         * Getter for ImgType
         *
         * @return [type]
         */
        public function getImgType()
        {
            return $this->imgType;
        }

        /**
         * Setter for ImgType
         * @var [type] imgType
         *
         * @return self
         */
        public function setImgType($imgType)
        {
            $this->imgType = $imgType;
            return $this;
        }


        /**
         * Get the value of blob
         */ 
        public function getBlob()
        {
                return $this->blob;
        }

        /**
         * Set the value of blob
         *
         * @return  self
         */ 
        public function setBlob($blob)
        {
                $this->blob = $blob;

                return $this;
        }
    }
?>