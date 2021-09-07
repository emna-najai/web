<?php
    
    include "../../entities/categorie.php"; //relative path doesn't work for some reason

    class categorieOps{

        function ajouterCategorie($categorie){
            $sql = "INSERT INTO `categories` (`idCategorie`, `nomCategorie`) VALUES (NULL, :nomCategorie)";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':nomCategorie',$categorie->getNomCategorie());
                $req->execute();   
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
                //if(strpos($e->getMessage(), 'SQLSTATE[23000]') != false)
                    //echo '<script>alert("Echec, ce criminel existe déjà.");</script>';
            }    
        }

        function getCategories(){
            $sql="SELECT * FROM `categories`";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }

        public static function getCategorie($idCategorie){
            $sql="SELECT * FROM `categories` WHERE idCategorie = ".$idCategorie;
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }

        function getNoP($idCategorie){
            $sql="SELECT count(*) FROM `produits` WHERE `produits`.`idCategorie` = ".$idCategorie;
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public static function getNoC(){
            $sql="SELECT count(*) FROM `categories`";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        public static function getTopCategories(){
            $sql="SELECT categories.nomCategorie, count(categories.idCategorie) FROM produits JOIN categories ON categories.idCategorie = produits.idCategorie GROUP by categories.idCategorie ORDER by count(produits.idCategorie) desc";
            $db = config::getConnexion();
            try{
            $liste=$db->query($sql);
            return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        function modifierCategorie($categorie){
            $sql = "UPDATE `categories` SET `nomCategorie` = :nomCategorie WHERE `categories`.`idCategorie` = :idCategorie";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':idCategorie',$categorie->getIdCategorie());
                $req->bindValue(':nomCategorie',$categorie->getNomCategorie());
                $req->execute();   
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
                //if(strpos($e->getMessage(), 'SQLSTATE[23000]') != false)
                    //echo '<script>alert("Echec, ce criminel existe déjà.");</script>';
            }    
        }

        function supprimerCategorie($idCategorie){
            $sql = "DELETE FROM `categories` WHERE `categories`.`idCategorie` = :idCategorie";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':idCategorie',$idCategorie);
                $req->execute();
            }
            catch (Exception $e){
                    echo 'Erreur: '.$e->getMessage();
            }    
        }
    }
?>