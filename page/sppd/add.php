<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Form Add Laporan</h6>
  </div>
  <?php
  $id_sppd = $_GET['id'];
  $pegawai = $conn->query("SELECT * FROM tb_sppd, tb_laporan WHERE id_sppd = '$id_sppd' AND tb_sppd.id_pegawai = tb_laporan.id_pegawai");
  $dataPeg = $pegawai->fetch_assoc();

        
  ?>
  <div class="card-body">
    <form action="" method="POST">
    <input type="hidden" name="id_lap" value="<?= $dataPeg['id_lap']; ?>">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="keg">Acara</label>
          <input type="text" class="form-control" id="keg" name="kegiatan" value="<?= $dataPeg['kegiatan']; ?>" readonly>
        </div>
        <div class="form-group col-md-2">
          <label for="berangkat">Tanggal Kegiatan</label>
          <input type="date" class="form-control" id="berangkat" name="berangkat" value="<?= $dataPeg['tgl_berangkat']; ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <textarea name="laporan" id="" rows="5" class="form-control"></textarea>
      </div>
      <button type="submit" name="add" class="btn btn-sm btn-info">Submit</button>
      <a href="?page=sppd" class="btn btn-sm btn-secondary">Cancel</a>
    </form>
  </div>
</div>

<?php 
if (isset($_POST['add'])) {
  $id_lap = mysqli_real_escape_string($conn, $_POST['id_lap']);
  $laporan = mysqli_real_escape_string($conn, $_POST['laporan']);

  $sql = $conn->query("UPDATE tb_laporan SET laporan = '$laporan' WHERE id_lap = '$id_lap'");

  if ($sql) {
    ?>
      <script>
        setTimeout(function() {
          swal({
            title: 'Data berhasil ditambah, silahkan klik Laporan SPPD',
            icon: 'success',
          });
        }, 10);
        window.setTimeout(function() {
          window.location.replace('?page=sppd');
        }, 4000);
      </script>
  <?php
  }
}
?>