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
              <input type="text" class="form-control" id="surat">
            </div>
            <div class="form-group col-md-2">
              <label for="nomor">Nomor Surat</label>
              <input type="text" class="form-control" id="nomor">
            </div>
            <div class="form-group col-md-2">
              <label for="tgl_surat">Tanggal Surat</label>
              <input type="date" class="form-control" id="tgl_surat">
            </div>
            <div class="form-group col-md-6">
              <label for="perihal">Perihal Surat</label>
              <input type="text" class="form-control" id="perihal">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="keg">Kegiatan</label>
              <input type="text" class="form-control" id="keg">
            </div>
            <div class="form-group col-md-2">
              <label for="tujuan">Tujuan</label>
              <input type="text" class="form-control" id="tujuan">
            </div>
            <div class="form-group col-md-2">
              <label for="lama">Lamanya</label>
              <input type="text" class="form-control" id="lama">
            </div>
            <div class="form-group col-md-2">
              <label for="berangkat">Berangkat</label>
              <input type="date" class="form-control" id="berangkat">
            </div>
            <div class="form-group col-md-2">
              <label for="pulang">Pulang</label>
              <input type="date" class="form-control" id="pulang">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="pengikut1">Pengikut 1</label>
              <select class="form-control" id="pengikut1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="pengikut2">Pengikut 2</label>
              <select class="form-control" id="pengikut2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="form-group col-md-4">
              <label for="pengikut3">Pengikut 3</label>
              <select class="form-control" id="pengikut3">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <button type="submit" class="btn btn-sm btn-dark">Submit</button>
        </form>
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
</div>