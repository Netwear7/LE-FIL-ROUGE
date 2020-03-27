<?php

class LogBdd{
    public function connexion(){
        return new mysqli('localhost', 'root', '', 'bddanimaux');
    }
    public function deconnexion($mysqli){
        $mysqli->close();
    }
}
?>