<?php

$id_tingkat = $_GET['id'];
$deleteTingkat = $conn->query("DELETE FROM tb_tingkat WHERE id_tingkat = '$id_tingkat'");

?>
<script>
  window.location.href="?page=tingkat";
</script>
