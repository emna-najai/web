<?php
    include "../../core/config.php";
    include "../../core/produitOps.php";

    $target_dir = "../prodimgs/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }


    $produit = new produit(NULL, $_POST['libProduit'], $_POST['idCategorie'], $_POST['prixProduit'], $_POST['descProduit'], $_POST['qntProduit'], $_FILES["fileToUpload"]["name"], $_POST['featured']);

    $produitOps = new produitOps();

    $liste = $produitOps->ajouterProduit($produit);

    header("location: ajoutProduit1.php");
?>