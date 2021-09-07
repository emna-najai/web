<?php
    include "../../core/config.php";
    include "../../core/produitOps.php";

    $target_dir = "../prodimgs/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($_FILES["fileToUpload"]["name"] != ""){
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $produit = new produit($_GET['idProduit'], $_POST['libProduit'], $_POST['idCategorie'], $_POST['prixProduit'], $_POST['descProduit'], $_POST['qntProduit'], $_FILES["fileToUpload"]["name"],$_POST['featured']);

    }
    else{
        $produit = new produit($_GET['idProduit'], $_POST['libProduit'], $_POST['idCategorie'], $_POST['prixProduit'], $_POST['descProduit'], $_POST['qntProduit'], $_GET['img'],$_POST['featured']);
    }
    $produitOps = new produitOps();

    $produitOps->modifierProduit($produit);
    
    header("location: listeProduits.php");
?>