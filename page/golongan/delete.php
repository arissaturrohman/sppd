<?php

$id_golongan = $_GET['id'];
$deleteGol = $conn->query("DELETE FROM tb_golongan WHERE id_golongan = '$id_golongan'");

?>
<script>
  window.location.href="?page=golongan";
</script>
