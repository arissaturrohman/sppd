<h1 class="h3 mb-4 text-gray-800">Data Golongan</h1>
<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-4 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Add</h6>
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="golongan">Pangkat / Golongan</label>
            <input type="text" class="form-control" name="golongan" id="golongan" autocomplete="off" autofocus required>
          </div>
          <button type="submit" name="add" class="btn btn-sm btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>


  <div class="col-lg-8 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Golongan</h6>
      </div>
      <div class="card-body">
        <!-- Tabel Pegawai -->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Golongan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              $gol = $conn->query("SELECT * FROM tb_golongan");
              while ($data = $gol->fetch_assoc()) {

              ?>
                <tr>
                  <td width="2%"><?= $no++; ?></td>
                  <td><?= $data['golongan']; ?></td>
                  <td width="5%">
                    <a href="?page=golongan&action=edit&id=<?= base64_encode($data['id_golongan']); ?>" class="btn btn-success btn-circle btn-sm">
                      <i class="fas fa-check"></i>
                    </a>
                    <a href="#myModal" class="btn btn-danger btn-circle btn-sm deleteGol" data-id="<?= $data['id_golongan']; ?>" role="button" data-toggle="modal">
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

if (isset($_POST['add'])) {
  $golongan = $_POST['golongan'];

  $sql = $conn->query("INSERT INTO tb_golongan (golongan) VALUES ('$golongan')");

  if ($sql) {
?>
    <script>
      setTimeout(function() {
        swal({
          title: 'Data berhasil ditambah',
          icon: 'success',
        });
      }, 10);
      window.setTimeout(function() {
        window.location.replace('?page=golongan');
      }, 5000);
    </script>
<?php
  }
}

?>