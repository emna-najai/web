<?php

    include "../../core/config.php";
    include "../../core/categorieOps.php";

    $C = new categorieOps();

    $C->supprimerCategorie($_GET['idCategorie']);

    header("location: listeCategories.php");
    
?>