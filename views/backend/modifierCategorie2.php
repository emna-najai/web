<?php
    include "../../core/config.php";
    include "../../core/categorieOps.php";

    $categorie = new categorie($_GET['idCategorie'], $_POST['nomCategorie']);

    $categorieOps = new categorieOps();

    $categorieOps->modifierCategorie($categorie);

    header("location: listeCategories.php");
?>