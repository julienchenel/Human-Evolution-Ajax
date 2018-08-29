<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 29/08/18
 * Time: 09:29
 */
include "Entity/partie.php";
include "Entity/personnage.php";

$partie = new Partie();
$nbPerso = $_POST['nbPerso'];

$allPerso = array();

for ($i = 1; $i<=$nbPerso; $i++){

    $personnage = new Personnage($i);
    array_push($allPerso, $personnage->enregistrerPerso());
    $personnage->enregistrerPartiePerso();
}

echo json_encode($allPerso);