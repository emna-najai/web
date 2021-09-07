<?php
    class produit{
        private $idProduit;
        private $libProduit;
        private $idCategorie;
        private $prixProduit;
        private $descProduit;
        private $qntProduit;
        private $imgProduit;
    
        function __construct($idProduit, $libProduit, $idCategorie, $prixProduit, $descProduit, $qntProduit, $imgProduit,$featured){
            $this->idProduit = $idProduit;
            $this->libProduit = $libProduit;
            $this->idCategorie = $idCategorie;
            $this->prixProduit = $prixProduit;
            $this->descProduit = $descProduit;
            $this->qntProduit = $qntProduit;
            $this->imgProduit = $imgProduit;
            $this->featured = $featured;
        }

        function setIdProduit(){
            $this->idProduit = $idProduit;
        }
    
        function setLibProduit(){
            $this->libProduit = $libProduit;
        }

        function setIdCategorie(){
            $this->idCategorie = $idCategorie;
        }

        function setPrixProduit(){
            $this->prixProduit = $prixProduit;
        }

        function setDescProduit(){
            $this->descProduit = $descProduit;
        }

        function setQntProduit(){
            $this->qntProduit = $qntProduit;
        }

        function setImgProduit(){
            $this->imgProduit = $imgProduit;
        }

        function setFeatured(){
            $this->featured = $featured;
        }
    
        function getIdProduit(){
            return $this->idProduit;
        }
    
        function getLibProduit(){
            return $this->libProduit;
        }

        function getIdCategorie(){
            return $this->idCategorie;
        }

        function getPrixProduit(){
            return $this->prixProduit;
        }

        function getDescProduit(){
            return $this->descProduit;
        }

        function getQntProduit(){
            return $this->qntProduit;
        }

        function getImgProduit(){
            return $this->imgProduit;
        }

        function getFeatured(){
            return $this->featured;
        }
    }
?>