<?php

$id_jabatan = $_GET['id'];
$deleteJab = $conn->query("DELETE FROM tb_jabatan WHERE id_jabatan = '$id_jabatan'");

?>
<script>
  window.location.href="?page=jabatan";
</script>
