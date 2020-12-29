<?php

error_reporting(0);
include('config.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Aplikasi SPPD Kecamatan Gajah</title>

  <!-- Custom fonts for this template-->
  <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="asset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-paper-plane"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SPPD</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Master
      </div>

      <!-- Nav Item - Data Master -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-database"></i>
          <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">master</h6>
            <a class="collapse-item" href="?page=pegawai">Pegawai</a>
            <a class="collapse-item" href="?page=jabatan">Jabatan</a>
            <a class="collapse-item" href="?page=golongan">Pangkat / Gol.</a>
            <a class="collapse-item" href="?page=tingkat">Tingkat SPPD</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        SPPD
      </div>

      <!-- Nav Item - SPPD -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-file-alt"></i>
          <span>Data SPPD</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">master</h6>
            <a class="collapse-item" href="?page=sppd">SPPD</a>
            <a class="collapse-item" href="#">Cetak SPPD</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Laporan -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-table"></i>
          <span>Laporan</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Setting</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                <img class="img-profile rounded-circle" src="asset/img/undraw_profile.svg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-lock fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ganti Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Include Halaman -->
          <?php

          $page = $_GET['page'];
          $action = $_GET['action'];

          if ($page == "pegawai") {
            if ($action == "") {
              include "page/pegawai/pegawai.php";
            } elseif ($action == "add") {
              include "page/pegawai/add.php";
            } elseif ($action == "edit") {
              include "page/pegawai/edit.php";
            } elseif ($action == "delete") {
              include "page/pegawai/delete.php";
            }
          } elseif ($page == "golongan") {
            if ($action == "") {
              include "page/golongan/golongan.php";
            } elseif ($action == "add") {
              include "page/golongan/add.php";
            } elseif ($action == "edit") {
              include "page/golongan/edit.php";
            } elseif ($action == "delete") {
              include "page/golongan/delete.php";
            }
          } elseif ($page == "jabatan") {
            if ($action == "") {
              include "page/jabatan/jabatan.php";
            } elseif ($action == "add") {
              include "page/jabatan/add.php";
            } elseif ($action == "edit") {
              include "page/jabatan/edit.php";
            } elseif ($action == "delete") {
              include "page/jabatan/delete.php";
            }
          } elseif ($page == "tingkat") {
            if ($action == "") {
              include "page/tingkat/tingkat.php";
            } elseif ($action == "add") {
              include "page/tingkat/add.php";
            } elseif ($action == "edit") {
              include "page/tingkat/edit.php";
            } elseif ($action == "delete") {
              include "page/tingkat/delete.php";
            }
          } elseif ($page == "sppd") {
            if ($action == "") {
              include "page/sppd/sppd.php";
            } elseif ($action == "add") {
              include "page/sppd/add.php";
            } elseif ($action == "edit") {
              include "page/sppd/edit.php";
            } elseif ($action == "delete") {
              include "page/sppd/delete.php";
            }
          } else {
            include "dashboard.php";
          }

          ?>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

<!-- Modal Hapus Golongan -->
  <div class="modal small fade" id="myModalGol" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                Yakin menghapus data ini..?
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary"data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-danger"  id="modalDeleteGol" >Delete</a>

            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Jabatan -->
  <div class="modal small fade" id="myModalJab" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                Yakin menghapus data ini..?
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary"data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-danger"  id="modalDeleteJab" >Delete</a>

            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Tingkat -->
  <div class="modal small fade" id="myModalTing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                Yakin menghapus data ini..?
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary"data-dismiss="modal" aria-hidden="true">Cancel</button> <a href="#" class="btn btn-danger"  id="modalDeleteTing" >Delete</a>

            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Pegawai -->
  <div class="modal small fade" id="myModalPeg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" id="myModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="modal-body">
                Yakin menghapus data ini..?
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary"data-dismiss="modal" aria-hidden="true">Cancel</button> 
               <a href="#" class="btn btn-danger"  id="modalDeletePeg" >Delete</a>
            </div>
        </div>
    </div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="asset/vendor/jquery/jquery.min.js"></script>
  <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="asset/js/sb-admin-2.min.js"></script>
  <script src="asset/js/sweetalert.min.js"></script>

  <!-- Page level plugins -->
  <script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="asset/js/demo/datatables-demo.js"></script>

  <script>
    $('.deleteGol').click(function(){
        var id=$(this).data('id');
        $('#modalDeleteGol').attr('href','?page=golongan&action=delete&id='+id);
    })
  </script>

  <script>
    $('.deleteJab').click(function(){
        var id=$(this).data('id');
        $('#modalDeleteJab').attr('href','?page=jabatan&action=delete&id='+id);
    })
  </script>

  <script>
    $('.deleteTing').click(function(){
        var id=$(this).data('id');
        $('#modalDeleteTing').attr('href','?page=tingkat&action=delete&id='+id);
    })
  </script>

  <script>
    $('.deletePeg').click(function(){
        var id=$(this).data('id');
        $('#modalDeletePeg').attr('href','?page=pegawai&action=delete&id='+id);
    })
  </script>

</body>

</html>