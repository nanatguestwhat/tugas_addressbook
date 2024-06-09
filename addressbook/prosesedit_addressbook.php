<?php

$Id = $_POST['Id'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
$Alamat = $_POST['Alamat'];
$Contact = $_POST['Contact'];

include("../koneksi.php");

$query = "UPDATE addressbook SET Id = '$Id', Firstname = '$Firstname', Lastname = '$Lastname', Email = '$Email', Alamat = '$Alamat', Contact = '$Contact' WHERE Id = '$Id'";
$result = mysqli_query($koneksi, $query); 

mysqli_close($koneksi);
?>

<script type="text/javascript">
	window.location = "../tb_addressbook.php";
</script>