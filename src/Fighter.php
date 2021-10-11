<?php

class Fighter
{
    private const MAX_LIFE = 100;

    private string $name;
    private int $strength;
    private int $dexterity;
    private int $life;
    private bool $isAlive = true;


    /**
     * Constructeur de la classe
     * 
     * @param string $name : Nom du combattant
     * @param int $strength : Force du combattant
     * @param int $dexterity : Capacité de défense du combattant
     */
    public function __construct(string $name, int $strength, int $dexterity)
    {
        $this->name = $name;
        $this->strength = $strength;
        $this->dexterity = $dexterity;
        $this->life = self::MAX_LIFE;
    }


    /** 
     * Réalisation du combat
     * 
     * @param Fighter $opponent : Adversaire du combattant courant
     * @return Array
     */
    public function fight(Fighter $opponent)
    {
        if($this->getIsAlive() &&  $opponent->getIsAlive()){
            $hit = rand(1, $this->strength);
            $damages = $hit - $opponent->getDexterity();
          
            // S'assure de ne pas avoir de valeur de dommage négative
            $damages = $damages > 0 ? $damages : 0;
    
            $opponent->setLife($opponent->getLife() - $damages);
            
            return [
                "hit" => $hit,
                "damages" => $damages
            ];
        }
    }


    /** 
     * Getter pour $name
     */    
    public function getName()
    {
        return $this->name;
    } 


    /**
     * Getter pour $strength
     */
    public function getStrength()
    {
        return $this->strength;
    }
    

    /** 
     * Getter pour $dexterity
     */
    public function getDexterity(): int
    {
        return $this->dexterity;
    }
    

    /** 
     * Getter pour $isAlive
     */
    public function getIsAlive()
    {   
        return $this->isAlive;
    }    


    /** 
     * Getter pour $life
     */
    public function getLife()
    {
        return $this->life;
    }


    /** 
     * Setter pour $life
     */    
    public function setLife(int $life)
    {
        $this->life = $life;
        
        // S'assure de ne pas avoir de points de vie négatifs et 
        // vérifie que le combattant est toujours vivant
        if ($life <= 0 ) {
            $this->life = 0;
            $this->isAlive = false;
        }
    }


    /**
     * Affiche les points de vie lors d'un affichage direct de la classe
     */
    public function __toString()
    {
        return "💙 ". $this->getLife();
    }    
}