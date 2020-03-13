<?php

Interface InterfaceService{

    public function serviceSelectAll();
    public function serviceSelect();
    public function serviceCount();
    public function serviceAjout();
    public function serviceRecherche();
    public function serviceModification(array $post);
    public function serviceSuppression($nom);
    
}



?>