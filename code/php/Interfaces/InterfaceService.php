<?php
    Interface InterfaceService{

        public function serviceSelectAll();
        public function serviceSelect();
        public function serviceCount();
        public function serviceAdd();
        public function serviceSearch();
        public function serviceUpdate(array $post);
        public function serviceDelete($nom);
        
    }
?>