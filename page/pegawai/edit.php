<h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
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
      $id_pegawai = base64_decode($_GET['id']);
      $pegawai = $conn->query("SELECT * FROM tb_pegawai, tb_jabatan, tb_golongan, tb_tingkat WHERE tb_pegawai.id_jabatan = tb_jabatan.id_jabatan AND tb_pegawai.id_golongan = tb_golongan.id_golongan AND tb_pegawai.id_tingkat = tb_tingkat.id_tingkat");
      $data = $pegawai->fetch_assoc();
      ?>
      <div class="card-body">
        <form action="" method="POST">
        <input type="hidden" name="id_pegawai" value="<?= $data['id_pegawai']; ?>">
          <div class="form-group">
            <label for="nip">NIP</label>
            <input type="text" class="form-control" name="nip" value="<?= $data['nip']; ?>" id="nip" autocomplete="off" autofocus required>
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" value="<?= $data['nama_pegawai']; ?>" id="nama" required>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-control" >
              <?php 
              $sql_jabatan = $conn->query("SELECT * FROM tb_jabatan");
              while($data_jabatan = $sql_jabatan->fetch_array()){
              if ($data['id_jabatan'] == $data_jabatan['id_jabatan']) {
                $select = "selected";
              } else {
                $select = "";
              }
              echo "<option value='$data_jabatan[id_jabatan]' $select>".$data_jabatan['jabatan']."</option";
              
              ?>
              <option value="<?= $data_jabatan['id_jabatan']; ?>"><?= $data_jabatan['jabatan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="golongan">Pangkat / Gol.</label>
            <select class="form-control" id="golongan" name="golongan">
              <?php 
              $sql_golongan = $conn->query("SELECT * FROM tb_golongan");
              while($data_golongan = $sql_golongan->fetch_array()){
              if ($data['id_golongan'] == $data_golongan['id_golongan']) {
                $select = "selected";
              } else {
                $select = "";
              }
              echo "<option value='$data_golongan[id_golongan]' $select>".$data_golongan['golongan']."</option";
              
              ?>
              <option value="<?= $data_golongan['id_golongan']; ?>"><?= $data_golongan['golongan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tingkat">Tingkat SPPD</label>
            <select class="form-control" id="tingkat" name="tingkat">
              <?php 
              $sql_tingkat = $conn->query("SELECT * FROM tb_tingkat");
              while($data_tingkat = $sql_tingkat->fetch_array()){
              if ($data['id_tingkat'] == $data_tingkat['id_tingkat']) {
                $select = "selected";
              } else {
                $select = "";
              }
              echo "<option value='$data_tingkat[id_tingkat]' $select>".$data_tingkat['tingkat']."</option";
              
              ?>
              <option value="<?= $data_tingkat['id_tingkat']; ?>"><?= $data_tingkat['tingkat']; ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" name="edit" class="btn btn-sm btn-primary">Submit</button>
          <a href="?page=pegawai" class="btn btn-sm btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>


  <div class="col-lg-8 mb-4">

    <!-- Illustrations -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pegawai</h6>
      </div>
      <div class="card-body">
        <!-- Tabel Pegawai -->
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Pangkat & Gol.</th>
                <th class="text-center">Tingkat SPPD</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php

              $no = 1;
              $pegawai = $conn->query("SELECT * FROM tb_pegawai, tb_jabatan, tb_golongan, tb_tingkat WHERE tb_pegawai.id_jabatan = tb_jabatan.id_jabatan AND tb_pegawai.id_golongan = tb_golongan.id_golongan AND tb_pegawai.id_tingkat = tb_tingkat.id_tingkat");
              while ($dataPegawai = $pegawai->fetch_assoc()) {
              ?>
                <tr>
                  <td width="2%">1</td>
                  <td><?= $dataPegawai['nip']; ?></td>
                  <td><?= $dataPegawai['nama_pegawai']; ?></td>
                  <td><?= $dataPegawai['jabatan']; ?></td>
                  <td><?= $dataPegawai['golongan']; ?></td>
                  <td><?= $dataPegawai['tingkat']; ?></td>
                  <td width="5%">
                    <a href="?page=pegawai&action=edit&id=<?= base64_encode($data['id_pegawai']); ?>" class="btn btn-success btn-circle btn-sm">
                      <i class="fas fa-check"></i>
                    </a>
                    <a href="#myModalPeg" class="btn btn-danger btn-circle btn-sm deletePeg" data-id="<?= $data['id_pegawai']; ?>" role="button" data-toggle="modal">
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
  $id_pegawai = mysqli_real_escape_string($conn, $_POST['id_pegawai']);
  $nip        = mysqli_real_escape_string($conn, $_POST['nip']);
  $nama       = mysqli_real_escape_string($conn, $_POST['nama']);
  $jabatan    = mysqli_real_escape_string($conn, $_POST['jabatan']);
  $golongan   = mysqli_real_escape_string($conn, $_POST['golongan']);
  $tingkat    = mysqli_real_escape_string($conn, $_POST['tingkat']);

  $sql = $conn->query("UPDATE tb_pegawai SET nip = '$nip', nama_pegawai = '$nama', id_jabatan = '$jabatan', id_golongan = '$golongan', id_tingkat = '$tingkat' WHERE id_pegawai = '$id_pegawai'");

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
        window.location.replace('?page=pegawai');
      }, 4000);
    </script>
<?php
  }
}

?>