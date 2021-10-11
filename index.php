<?php

require_once 'src/Fighter.php';

$fighter1 = new Fighter("Héraclès ✨", 20, 6);
$fighter2 = new Fighter("Lion de Némée 🦁", 11, 13);
$round = 1;


// Déroulement du combat
do{
    echo "🕛 Round #".$round++.PHP_EOL;

    fightProgress($fighter1, $fighter2, $round);
    echo "-----------------------------".PHP_EOL;    
    
    fightProgress($fighter2, $fighter1, $round);
    echo "//////////////////////////////////////////////".PHP_EOL;
}while($fighter1->getIsAlive() &&  $fighter2->getIsAlive());


// Affichage du résultat
echo PHP_EOL."Résultat de ce combat de titans : ".PHP_EOL;
echo FightResult($fighter1, $fighter2).PHP_EOL;


/**
 * Fonction principale effectuant le combat
 * 
 * @param Fighter $fighter1 : Combattant #1
 * @param Fighter $fighter2 : Combattant #2
 * @param int $round : Round de combat
 * 
 */
function fightProgress(Fighter $fighter1, Fighter $fighter2, int $round): void
{
    echo "Attaquant : " .fighterProfile($fighter1).PHP_EOL;
    echo "Adversaire : " . fighterProfile($fighter2).PHP_EOL;
    
    $attack = $fighter1->fight($fighter2);
    
    echo "{$fighter1->getName()} attaque avec une puissance de {$attack['hit']}".PHP_EOL;
    echo "Mais {$fighter2->getName()} se défend grâce à une dextérité de {$fighter2->getDexterity()}".PHP_EOL;
    echo "Finalement {$fighter2->getName()} subit {$attack['damages']} points de dommages".PHP_EOL;
    
    echo fighterLife($fighter1).PHP_EOL;
    echo fighterLife($fighter2).PHP_EOL;
}


/** 
 * Retourne l'annonce du résultat final du combat
 * 
 * @param Fighter $fighter1 : Combattant #1
 * @param Fighter $fighter2 : Combattant #2
 * 
 * @return string
 */
function FightResult(Fighter $fighter1, Fighter $fighter2): string
{
    $winner = $fighter1->getIsAlive() ? $fighter1 : $fighter2;
    $looser = $fighter1->getIsAlive() ? $fighter2 : $fighter1;
    
    return "{$looser->getName()} est mort et c'est {$winner->getName()} qui a gagné";
}


/** 
 * Retourne les détails du profile d'un combattant
 *
 * @param Fighter $fighter : Combattant dont on doit afficher le profile
 * 
 * @return string
 */
function fighterProfile(Fighter $fighter): string
{
    return "{$fighter->getName()} [Puissance : {$fighter->getStrength()} / Dextérité : {$fighter->getDexterity()}]";
}


/** 
 * Retourne l'annonce des points de vie restants d'un combattant
 * 
 * @param Fighter $fighter : Combattant dont on doit afficher les points de vie restants
 * 
 * @return string
 */
function fighterLife(Fighter $fighter): string
{
    return "{$fighter->getName()} a désormais {$fighter} points de vie";
}