<?php
    Interface InterfaceService{

        public function serviceSelectAll($id);
        public function serviceSelect();
        public function serviceCount();
        public function serviceAdd(object $var);
        public function serviceSearch();
        public function serviceUpdate(array $post);
        public function serviceDelete($nom);
        
    }
?>