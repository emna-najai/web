<?php
    include "../../core/components/components.php";
    include "../../core/config.php";
    include "../../core/produitOps.php";
    include "../../core/categorieOps.php";
    
    $P = new produitOps();
    $C = new categorieOps();
    $liste = $C->getCategories();
    $produit = $P->getProduit($_GET['idProduit']);

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Doggyhouse Admin Space</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/custom_styles.css">

  <script src="js/formvalidators/valider.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php components::sidebar(); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      
      <!-- Main Content -->
      <div id="content">

        <div class="card shadow-lg m-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-success">Modification d'un produit</h6>
          </div>
          <div class="card-body">
            <?php 
                foreach($produit as $prod){
            ?>
            <form onsubmit="return validate_formprod()" action="modifierProduit2.php?idProduit=<?php echo $_GET['idProduit']; ?>&img=<?php echo $prod['imgProduit']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-row">
                  <div class="form-group col-md-6 mt-2 mb-2">
                    <input type="text" class="form-control mt-2 mb-2" name="libProduit" id="libProduit" value="<?php echo $prod['libProduit']; ?>">
                  </div>
                  <div class="form-group col-md-6 mt-2 mb-2">
                    <input type="text" class="form-control mt-2 mb-2" name="prixProduit" id="prixProduit" value="<?php echo $prod['prixProduit']; ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6 mt-2 mb-2">
                    <input type="text" class="form-control mt-2 mb-2" name="descProduit" id="descProduit" value="<?php echo $prod['descProduit']; ?>" placeholder="Description du produit">
                  </div>
                  <div class="form-group col-md-6 mt-2 mb-2">
                    <select name="featured" id="featured" class="form-control mt-2 mb-2">
                      <option value="0" disabled>Produit Recommendé</option>
                      <option value="0" <?php if($prod['featured'] == 0) echo "selected"; ?>>Non</option>
                      <option value="1" <?php if($prod['featured'] == 1) echo "selected"; ?>>Oui</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6 mt-2 mb-2">
                    <input type="text" class="form-control mt-2 mb-2" name="qntProduit" id="qntProduit" value="<?php echo $prod['qntProduit']; ?>">
                  </div>
                  <div class="form-group col-md-6 mt-2 mb-2">
                    <select name="idCategorie" id="idCategorie" class="form-control mt-2 mb-2">
                      <?php 
                        foreach($liste as $row){
                          echo '<option value="'.$row['idCategorie'].'"';
                          if($prod['idCategorie'] == $row['idCategorie'])
                            echo 'selected';
                          echo '>'.$row['nomCategorie'].'</option>';
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label for="exampleFormControlFile1">Image de produit</label>
                  <input type="file" name="fileToUpload" class="form-control-file" id="exampleFormControlFile1">
                </div> Old file input in case you need it -->
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Image du produit</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Modifier dans la base de données</button>
            </form>
            <?php } ?>
          </div>
        </div>

        <!-- Topbar -->
        <!-- <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow"> -->

          
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        <!-- Begin Page Content -->
        <div class="container-fluid">

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-success" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
