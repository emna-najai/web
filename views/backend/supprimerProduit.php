<?php

    include "../../core/config.php";
    include "../../core/produitOps.php";

    $P = new produitOps();

    $P->supprimerProduit($_GET['idProduit']);

    header("location: listeProduits.php");
    
?>