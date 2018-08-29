<?php

include_once "BddHuman.php";

class Partie extends BddHuman
{
    protected $_date;
    protected $_idPartie;

    /**
     * Partie constructor.
     * @param $_date
     */
    public function __construct()
    {
        parent::__construct();

        $this->_date = DATE("Y-m-d H:i:s");
        $enregistre = $this->_bdd->prepare("INSERT INTO partie(date_partie) VALUES (?)");
        $enregistre->bindParam(1, $this->_date);
        $enregistre->execute();
        $lookForId = $this->_bdd->prepare("SELECT max(id_partie) FROM partie");
        $lookForId->execute();
        $resultat = $lookForId->fetch();
        $this->_idPartie = $resultat[0];

    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->_date = $date;
    }


    public function recupStatsPartie()
    {
        $recupStatsPartie = $this->_bdd->prepare("SELECT AVG(lifespan) , AVG(growth) , AVG(birthsize), COUNT(personnage.id_perso) FROM personnage
        INNER JOIN partie_perso ON personnage.id_perso = partie_perso.id_perso WHERE id_partie=?");
        $recupStatsPartie->bindParam(1, $this->_idPartie);
        $recupStatsPartie->execute();
        $result = $recupStatsPartie->fetch();
    }

}