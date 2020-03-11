<?php
    class EspeceDataAccess{

        public function afficherType(){
            $db= mysqli_init();
            mysqli_real_connect($db, 'localhost','root','','bddanimaux');
            $rs= mysqli_query($db, "SELECT nom_espece FROM espece");
            $data=mysqli_fetch_all($rs, MYSQLI_ASSOC);
            mysqli_close($db);
            return $data;
        }

    }
?>