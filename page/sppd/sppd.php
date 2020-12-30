<h1 class="h3 mb-4 text-gray-800">Data SPPD</h1>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">SPPD</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Laporan SPPD</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Add
          <a href="#" class="btn btn-sm btn-info float-right">Input Manual</a></h6>
      </div>
      <?php

      $pegawai = $conn->query("SELECT * FROM tb_pegawai, tb_jabatan, tb_golongan, tb_tingkat WHERE id_pegawai = '$_SESSION[id_pegawai]' AND tb_pegawai.id_jabatan = tb_jabatan.id_jabatan AND tb_pegawai.id_golongan = tb_golongan.id_golongan AND tb_pegawai.id_tingkat = tb_tingkat.id_tingkat");
      $dataPeg = $pegawai->fetch_assoc();
      ?>
      <div class="card-body">
        <form action="" method="POST">
          <div class="form-row">
            <input type="hidden" name="id_pegawai" value="<?= $dataPeg['id_pegawai']; ?>">
            <div class="form-group col-md-4">
              <input type="text" class="form-control" value="<?= $dataPeg['nama_pegawai']; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" value="<?= $dataPeg['nip']; ?>" readonly>
            </div>
            <div class="form-group col-md-4">
              <input type="text" class="form-control" value="<?= $dataPeg['jabatan']; ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col">
              <input type="text" class="form-control" value="<?= $dataPeg['golongan']; ?>" readonly>
            </div>
            <div class="form-group col">
              <input type="text" class="form-control" value="<?= $dataPeg['tingkat']; ?>" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-2">
              <label for="surat">Surat Dari</label>
              <input type="text" class="form-control" id="surat" name="surat">
            </div>
            <div class="form-group col-md-2">
              <label for="nomor">Nomor Surat</label>
              <input type="text" class="form-control" id="nomor" name="nomor">
            </div>
            <div class="form-group col-md-2">
              <label for="tgl_surat">Tanggal Surat</label>
              <input type="date" class="form-control" id="tgl_surat" name="tgl_surat">
            </div>
            <div class="form-group col-md-6">
              <label for="perihal">Perihal Surat</label>
              <input type="text" class="form-control" id="perihal" name="perihal">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="keg">Acara</label>
              <input type="text" class="form-control" id="keg" name="kegiatan">
            </div>
            <div class="form-group col-md-2">
              <label for="tujuan">Tujuan</label>
              <input type="text" class="form-control" id="tujuan" name="tujuan">
            </div>
            <div class="form-group col-md-2">
              <label for="lama">Lamanya (hari)</label>
              <input type="text" class="form-control" id="lama" name="lama">
            </div>
            <div class="form-group col-md-2">
              <label for="berangkat">Berangkat</label>
              <input type="date" class="form-control" id="berangkat" name="berangkat">
            </div>
            <div class="form-group col-md-2">
              <label for="pulang">Pulang</label>
              <input type="date" class="form-control" id="pulang" name="pulang">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="pengikut1">Pengikut 1</label>
              <select class="form-control" id="pengikut1" name="pengikut1">
                <option value="0">-- Pilih --</option>
                <?php
                $pengkiut1 = $conn->query("SELECT * FROM tb_pegawai");
                while ($dataPeg1 = $pengkiut1->fetch_assoc()) {
                ?>
                  <option value="<?= $dataPeg1['id_pegawai']; ?>"><?= $dataPeg1['nama_pegawai']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="pengikut2">Pengikut 2</label>
              <select class="form-control" id="pengikut2" name="pengikut2">
                <option value="0">-- Pilih --</option>
                <?php
                $pengkiut2 = $conn->query("SELECT * FROM tb_pegawai");
                while ($dataPeg2 = $pengkiut2->fetch_assoc()) {
                ?>
                  <option value="<?= $dataPeg2['id_pegawai']; ?>"><?= $dataPeg2['nama_pegawai']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="pengikut3">Pengikut 3</label>
              <select class="form-control" id="pengikut3" name="pengikut3">
                <option value="0">-- Pilih --</option>
                <?php
                $pengkiut3 = $conn->query("SELECT * FROM tb_pegawai");
                while ($dataPeg3 = $pengkiut3->fetch_assoc()) {
                ?>
                  <option value="<?= $dataPeg3['id_pegawai']; ?>"><?= $dataPeg3['nama_pegawai']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <button type="submit" name="add" class="btn btn-sm btn-dark">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <?php

  if (isset($_POST['add'])) {
    $id_pegawai = mysqli_real_escape_string($conn, $_POST['id_pegawai']);
    $surat = mysqli_real_escape_string($conn, $_POST['surat']);
    $nomor = mysqli_real_escape_string($conn, $_POST['nomor']);
    $tgl_surat = mysqli_real_escape_string($conn, $_POST['tgl_surat']);
    $perihal = mysqli_real_escape_string($conn, $_POST['perihal']);
    $kegiatan = mysqli_real_escape_string($conn, $_POST['kegiatan']);
    $tujuan = mysqli_real_escape_string($conn, $_POST['tujuan']);
    $lama = mysqli_real_escape_string($conn, $_POST['lama']);
    $berangkat = mysqli_real_escape_string($conn, $_POST['berangkat']);
    $pulang = mysqli_real_escape_string($conn, $_POST['pulang']);
    $pengikut1 = mysqli_real_escape_string($conn, $_POST['pengikut1']);
    $pengikut2 = mysqli_real_escape_string($conn, $_POST['pengikut2']);
    $pengikut3 = mysqli_real_escape_string($conn, $_POST['pengikut3']);

    $sppd = $conn->query("INSERT INTO tb_sppd (id_pegawai, surat, nomor, tgl_surat, perihal, kegiatan, tujuan, lama, tgl_berangkat, tgl_pulang, pengikut1, pengikut2, pengikut3)VALUES('$id_pegawai', '$surat', '$nomor', '$tgl_surat', '$perihal', '$kegiatan', '$tujuan', '$lama', '$berangkat', '$pulang', '$pengikut1', '$pengikut2', '$pengikut3')");

    if ($sppd) {
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

  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data SPPD</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>