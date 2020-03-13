<?php
    interface InterfaceDao{

        public function daoSelectAll();
        public function daoSelect(string $id);
        public function daoCount();
        public function daoAjout();
        public function daoRecherche();
        public function daoModification(array $parametres);
        public function daoSuppression(string $nom);
        public function daoModificationMdp($a,$b);
    }
?>