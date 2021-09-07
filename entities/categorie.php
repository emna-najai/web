<?php
    class categorie{
        private $idCategorie;
        private $nomCategorie;

        function __construct($idCategorie, $nomCategorie){
            $this->idCategorie = $idCategorie;
            $this->nomCategorie = $nomCategorie;
        }

        function setIdCategorie(){
            $this->idCategorie = $idCategorie;
        }

        function getIdCategorie(){
            return $this->idCategorie;
        }

        function setNomCategorie(){
            $this->nomCategorie = $nomCategorie;
        }

        function getNomCategorie(){
            return $this->nomCategorie;
        }
    }
?>