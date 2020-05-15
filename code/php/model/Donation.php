<?php


class Donation{
    private $montant;
    private $userId;
    private $date;

    
    public function __construct($infos,$id){
        if(isset($infos["montantLibreDonation"]) && !empty($infos["montantLibreDonation"]) ){
            $this->montant = $infos["montantLibreDonation"];
        } else {
            $this->montant = $infos["radioDonation"];
        }
        $this->userId = $id;
        $this->date = (new \DateTime())->format('Y-m-d H:i:s');
    }

    /**
     * Get the value of montant
     */ 
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set the value of montant
     *
     * @return  self
     */ 
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
}

?>