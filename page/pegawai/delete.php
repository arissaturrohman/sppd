<?php

$id_pegawai = $_GET['id'];
$deletePegawai = $conn->query("DELETE FROM tb_pegawai WHERE id_pegawai = '$id_pegawai'");

?>
<script>
  window.location.href="?page=pegawai";
</script>
