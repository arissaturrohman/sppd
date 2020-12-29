<h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
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
            <label for="nip">NIP</label>
            <input type="text" class="form-control" name="nip" id="nip" autocomplete="off" autofocus required>
          </div>
          <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama" id="nama" required>
          </div>
          <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <select class="form-control" id="jabatan" name="jabatan">
              <option>-- Pilih Jabatan --</option>
              <?php
              $jab = $conn->query("SELECT * FROM tb_jabatan");
              while ($dataJab = $jab->fetch_assoc()) {
              ?>
                <option value="<?= $dataJab['id_jabatan']; ?>"><?= $dataJab['jabatan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="golongan">Pangkat / Gol.</label>
            <select class="form-control" id="golongan" name="golongan">
              <option>-- Pilih Pangkat / Gol. --</option>
              <?php
              $golongan = $conn->query("SELECT * FROM tb_golongan");
              while ($datagolongan = $golongan->fetch_assoc()) {
              ?>
                <option value="<?= $datagolongan['id_golongan']; ?>"><?= $datagolongan['golongan']; ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tingkat">Tingkat SPPD</label>
            <select class="form-control" id="tingkat" name="tingkat">
              <option>-- Pilih Tingkat --</option>
              <?php
              $tingkat = $conn->query("SELECT * FROM tb_tingkat");
              while ($dataTingkat = $tingkat->fetch_assoc()) {
              ?>
                <option value="<?= $dataTingkat['id_tingkat']; ?>"><?= $dataTingkat['tingkat']; ?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" name="add" class="btn btn-primary">Submit</button>
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

if (isset($_POST['add'])) {
  $nip      = mysqli_real_escape_string($conn, $_POST['nip']);
  $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
  $jabatan  = mysqli_real_escape_string($conn, $_POST['jabatan']);
  $golongan = mysqli_real_escape_string($conn, $_POST['golongan']);
  $tingkat  = mysqli_real_escape_string($conn, $_POST['tingkat']);

  $sql = $conn->query("INSERT INTO tb_pegawai (nip, nama_pegawai, id_jabatan, id_golongan, id_tingkat)VALUES('$nip', '$nama', '$jabatan', '$golongan', '$tingkat')");

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
        window.location.replace('?page=pegawai');
      }, 4000);
    </script>
<?php
  }
}

?>