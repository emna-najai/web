<?php
  include "../../core/config.php";
  include "../../core/produitOps.php"; 
  include "../../core/categorieOps.php";
  include "../../core/components/components.php";

  $P = new produitOps();
  $liste = $P->getProduits();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Doggyhouse AdminSpace</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <script src="js/delconfirmation/delconfirm.js"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php components::sidebar(); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      
    <!-- Main Content -->
    <div id="content">
      <!-- Main Content -->
      <div id="content">

            
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        

          <!-- DataTales Example -->
          <div class="card shadow-lg h-75 m-4 mt-8">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-success">Liste des produits (F: Produit recommendé)</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>libelle</th>
                      <th>categorie</th>
                      <th>prix</th>
                      <th>description</th>
                      <th>quantite</th>
                      <th>F</th>
                      <th>image</th>
                      <th>modification</th>
                      <th>suppresion</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>libelle</th>
                      <th>categorie</th>
                      <th>prix</th>
                      <th>description</th>
                      <th>quantite</th>
                      <th>F</th>
                      <th>image</th>
                      <th>modification</th>
                      <th>suppresion</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      foreach($liste as $row){ ?>
                        <tr>
                          <td><?php echo $row['idProduit']; ?></td>
                          <td><?php echo $row['libProduit']; ?></td>
                          <td><?php $categorie = categorieOps::getCategorie($row['idCategorie']); foreach($categorie as $c) echo $c['1']; ?></td>
                          <td><?php echo $row['prixProduit']; ?></td>
                          <td><?php echo $row['descProduit']; ?></td>
                          <td><?php echo $row['qntProduit']; ?></td>
                          <td><?php echo $row['featured']; ?></td>
                          <td><a href="../prodimgs/<?php echo $row['imgProduit']; ?>"><button class="btn btn-success">image</button></a></td>
                          <td>
                            <a href="modifierProduit.php?idProduit=<?php echo $row['idProduit']; ?>" class="btn btn-info btn-icon-split">
                              <span class="icon text-white-50">
                                <i class="fas fa-fw fa-wrench"></i>
                              </span>
                              <span class="text">Modifier</span>
                            </a>
                          </td>
                          <td>
                          <a href="javascript:void(0);" id="dellink<?php echo $row['idProduit']; ?>" class="btn btn-danger btn-icon-split" onclick="delconfirm('<?php echo $row['idProduit']; ?>','Produit')">
                            <span class="icon text-white-50">
                              <i class="fas fa-trash"></i>
                            </span>
                            <span class="text">Suppression</span>
                          </a>
                          </td>
                        </tr>
                        <?php
                      }  
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
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

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
