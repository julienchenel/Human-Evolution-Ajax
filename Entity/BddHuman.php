<?php

class BddHuman
{
    const DSN = 'pgsql:host=localhost;dbname=human_bdd';
    const USER = 'admin';
    const PASS = 'admin';
    protected $_bdd;

    /**
     * Bdd constructor.
     * @param $_bdd
     */
    public function __construct()
    {
        try {
            // Use the self keyword to access static properties, constants and methods.
            $this->_bdd = new PDO(SELF::DSN, SELF::USER, SELF::PASS);
            echo "Connexion OK";
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getBdd()
    {
        return $this->_bdd;
    }

    /**
     * @param PDO $bdd
     */
    public function setBdd($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function recupererStatsGlobale()
    {

    }
}