<?php
    Interface InterfaceService{

        public function serviceSelectAll();
        public function serviceSelect($id);
        public function serviceCount();
        public function serviceAdd(object $var);
        public function serviceSearch($search);
        public function serviceUpdate(array $post);
        public function serviceDelete($nom);
        
    }
?>