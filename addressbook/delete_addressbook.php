<?php
include ("../koneksi.php");

$id = $_GET['Id'];
$query = "DELETE FROM addressbook WHERE Id = '$id'";

$result = mysqli_query($koneksi, $query);
?>

<script type="text/javascript">
	window.location = "../tb_addressbook.php";
</script>