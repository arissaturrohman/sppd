<h1 class="h3 mb-4 text-gray-800">Data Jabatan</h1>
<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-4 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit</h6>
      </div>
      <?php
      $id_jabatan = base64_decode($_GET['id']);
      $jabatan = $conn->query("SELECT * FROM tb_jabatan WHERE id_jabatan = '$id_jabatan'");
      $dataJab = $jabatan->fetch_assoc();
      ?>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" name="jabatan" value="<?= $dataJab['jabatan']; ?>" id="jabatan" autocomplete="off" autofocus required>
          </div>
          <button type="submit" name="edit" class="btn btn-sm btn-primary">Submit</button>
          <a href="?page=jabatan" class="btn btn-sm btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>


  <div class="col-lg-8 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
      </div>
      <div class="card-body">
        <!-- Tabel Pegawai -->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              $gol = $conn->query("SELECT * FROM tb_jabatan");
              while ($data = $gol->fetch_assoc()) {

              ?>
                <tr>
                  <td width="2%"><?= $no++; ?></td>
                  <td><?= $data['jabatan']; ?></td>
                  <td width="5%">
                    <a href="#" class="btn btn-success btn-circle btn-sm">
                      <i class="fas fa-check"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-circle btn-sm">
                      <i class="fas fa-trash-alt"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php

if (isset($_POST['edit'])) {
  $jabatan = $_POST['jabatan'];

  $sql = $conn->query("UPDATE tb_jabatan SET jabatan='$jabatan' WHERE id_jabatan = '$id_jabatan'");

  if ($sql) {
?>
    <script>
      setTimeout(function() {
        swal({
          title: 'Data berhasil diubah',
          icon: 'success',
        });
      }, 10);
      window.setTimeout(function() {
        window.location.replace('?page=jabatan');
      }, 5000);
    </script>
<?php
  }
}

?>