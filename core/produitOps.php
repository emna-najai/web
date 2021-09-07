<?php

    include "../../entities/produit.php"; //relative path doesn't work for some reason

    class produitOps{
        function ajouterProduit($produit){
            $sql = "INSERT INTO `produits` (`idProduit`, `libProduit`, `idCategorie`, `prixProduit`, `descProduit`, `qntProduit`, `imgProduit`, `featured`) VALUES (NULL, :libProduit, :idCategorie, :prixProduit, :descProduit, :qntProduit, :imgProduit, :featured)";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':libProduit',$produit->getLibProduit());
                $req->bindValue(':idCategorie',$produit->getIdCategorie());
                $req->bindValue(':prixProduit',$produit->getPrixProduit());
                $req->bindValue(':descProduit',$produit->getDescProduit());
                $req->bindValue(':qntProduit',$produit->getQntProduit());
                $req->bindValue(':imgProduit',$produit->getImgProduit());
                $req->bindValue(':featured',$produit->getFeatured());
                $req->execute();   
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
                //if(strpos($e->getMessage(), 'SQLSTATE[23000]') != false)
                    //echo '<script>alert("Echec, ce criminel existe déjà.");</script>';
            }    
        }

        function getProduits(){
            $sql="SELECT * FROM `produits`";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }

        function getProduit($idProduit){
            $sql="SELECT * FROM `produits` WHERE idProduit = ".$idProduit;
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }

        function modifierProduit($produit){
            $sql = "UPDATE `produits` SET `libProduit` = :libProduit, `idCategorie` = :idCategorie, `prixProduit` = :prixProduit, `descProduit` = :descProduit, `qntProduit` = :qntProduit, `imgProduit` = :imgProduit, `featured` = :featured WHERE `produits`.`idProduit` = :idProduit";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':idProduit',$produit->getIdProduit());
                $req->bindValue(':libProduit',$produit->getLibProduit());
                $req->bindValue(':idCategorie',$produit->getIdCategorie());
                $req->bindValue(':prixProduit',$produit->getPrixProduit());
                $req->bindValue(':descProduit',$produit->getDescProduit());
                $req->bindValue(':qntProduit',$produit->getQntProduit());
                $req->bindValue(':imgProduit',$produit->getImgProduit());
                $req->bindValue(':featured',$produit->getFeatured());
                $req->execute();   
            }
            catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();
            }    
        }

        function supprimerProduit($idProduit){
            $sql = "DELETE FROM `produits` WHERE `produits`.`idProduit` = :idProduit";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':idProduit',$idProduit);
                $req->execute();
            }
            catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();
            }    
        }

        public static function nombreProduits(){
            $sql="SELECT count(*) FROM `produits`";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }

        public static function argentsProduits(){
            $sql="SELECT sum(prixProduit*qntProduit) FROM `produits`";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }
    }

?>