<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace modele\metier;

/**
 * Description of TypeCuisine
 *
 * @author Gaetrange
 */
class TypeCuisine {
    private int $idTC ;
    private String $libelleTC;
    
    function __construct(int $idTC, String $libelle) {
        $this->idTC = $idTC;
        $this->libelleTC = $libelle;
    }

    function getIdTC(): int {
        return $this->idTC;
    }

    function getLibelleTC(): String {
        return $this->libelleTC;
    }

    function setIdTC(int $idTC): void {
        $this->idTC = $idTC;
    }

    function setLibelleTC(String $libelle): void {
        $this->libelleTC = $libelle;
    }


}
