<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 28/08/18
 * Time: 22:00
 */

include "../partie.php";

use PHPUnit\Framework\TestCase;

class PartieTest extends TestCase
{
    public $partie;

    public function setUp()
    {
        $this->partie = new Partie();

//        return var_dump($this->partie);
    }


//    public function testRecupStatsPartie()
//    {
//        $this->assertArraySubset("avg", "avg");
//    }


    public function testGetDate()
    {
        $this->assertInternalType("string", $this->partie->getDate());
    }
}
