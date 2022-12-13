<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace modele\dao;
use \PDO;
use modele\metier\TypeCuisine;
/**
 * Description of TypeCuisineDAO
 *
 * @author Gaetrange
 */
class TypeCuisineDAO {
    

    
    public static function getOneById(int $idTC): ?TypeCuisine {
        $leTypeCuisine = null;
        try {
            $requete = "SELECT * FROM typeCuisine"
                    . " WHERE idTC = :idTC";
            $stmt = Bdd::getConnexion()->prepare($requete);
            $stmt->bindParam(':idTC', $idTC, PDO::PARAM_INT);
            $ok = $stmt->execute();
            // attention, $ok = true pour un select ne retournant aucune ligne
            if ($ok && $stmt->rowCount() > 0) {
                $enreg = $stmt->fetch(PDO::FETCH_ASSOC);
                $leTypeCuisine = new TypeCuisine($enreg['idTC'], $enreg['libelleTC']);
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::getOneById : <br/>" . $e->getMessage());
        }
        return $leTypeCuisine;
    }

  
   
    public static function getAllByResto(int $idR): array {
        $lesObjets = array();
        try {
            $requete = "SELECT * FROM typeCuisine tc"
                    . " INNER JOIN LienRestoTC ltc ON  ltc.idTC = tc.idTC "
                    . " INNER JOIN resto r ON  r.idR = ltc.idR "
                    . " WHERE r.idR = :idR";
            $stmt = Bdd::getConnexion()->prepare($requete);
            $stmt->bindParam(':idR', $idR, PDO::PARAM_INT);
            $ok = $stmt->execute();
            if ($ok) {
                while ($enreg = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $lesObjets[] = new TypeCuisine($enreg['idTC'], $enreg['libelleTC']);
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erreur dans la méthode " . get_called_class() . "::getAllByResto : <br/>" . $e->getMessage());
        }
        return $lesObjets;
    }

}

