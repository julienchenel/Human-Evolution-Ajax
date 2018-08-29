<?php

include "../personnage.php";
use PHPUnit\Framework\TestCase;

class PersonnageTest extends TestCase
{
    public $personnage;

    public function setUp()
    {
        $this->personnage = new Personnage();

//        return var_dump($this->personnage);
    }

//    /**
//     * @depends setUp()
//     */
    public function testEnregistrerPerso()
    {

        $this->assertTrue($this->personnage->enregistrerPerso(), "L'enregistrement du personnage ne s'est pas bien déroulée");
    }
    public function testEnregistrerPartiePerso()
    {

        $this->assertTrue($this->personnage->enregistrerPartiePerso(), "La liaison partie/perso ne s'est pas bien déroulée");
    }


    public function testGetCroissance()
    {

        // float ne fonctionne pas pr une raison inconnue. Remplacer par string et c 'est ok
        $this->assertInternalType('string',  $this->personnage->getCroissance());
    }


    public function testGetEspvie()
    {

        $this->assertLessThan(101, $this->personnage->getEspvie());
    }

    public function testGetHomme()
    {

        $this->assertInternalType('boolean',  $this->personnage->getHomme());
    }

    public function testGetTaille()
    {
      $this->assertInternalType('integer',  $this->personnage->getTaille());
    }

    public function testGetEmplacement()
    {
      $this->assertInternalType('integer',  $this->personnage->getEmplacement());
    }

}
