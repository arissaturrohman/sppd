<h1 class="h3 mb-4 text-gray-800">Data Pegawai</h1>
<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-6 mb-4">
    <div class="col-6">
      <div class="card card-info">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Form Add</h6>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="POST">
          <div class="card-body">
            <div class="form-group">
              <label for="nip">NIP</label>
              <input type="text" class="form-control" id="nip" name="nip" placeholder="NIP" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="pegawai">Nama Pegawai</label>
              <select class="form-control" id="pegawai" name="id_pegawai">
                <option>Pilih</option>
                <?php
                $pegawai = $conn->query("SELECT * FROM tb_pegawai");
                while ($dataPegawai = $pegawai->fetch_assoc()) {
                ?>
                  <option value="<?= $dataPegawai['id_pegawai']; ?>"><?= $dataPegawai['nama_pegawai']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="password">
            </div>
            <div class="form-group">
              <label for="level">Level</label>
              <select name="level" class="form-control" required>
                <option>Pilih Level</option>
                <option value="admin">Admin</option>
                <option value="pegawai">Pegawai</option>
              </select>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" name="add" class="btn btn-info">Submit</button>
            <a href="?page=register" class="btn btn-secondary float-right">Cancel</a>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
<!-- /.content -->

<?php
if (isset($_POST['add'])) {

  $nip  = mysqli_real_escape_string($conn, $_POST['nip']);
  $pegawai  = mysqli_real_escape_string($conn, $_POST['pegawai']);
  $level     = mysqli_real_escape_string($conn, $_POST['level']);
  //enkripsi password
  $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
  $sql = $conn->query("INSERT INTO tb_user (nip, id_pegawai, password, level) VALUES(        
        '$nip',
        '$pegawai',
        '$password',
        '$level'
    )");

  if ($sql) {
?>
    <script type="text/javascript">
      alert("User berhasil ditambahkan..!");
      window.location.href = "?page=register";
    </script>
<?php
  }
}

?>