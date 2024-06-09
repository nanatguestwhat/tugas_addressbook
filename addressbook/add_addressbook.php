<?php

$Id = $_POST['Id'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
$Alamat = $_POST['Alamat'];
$Contact = $_POST['Contact'];

include("../koneksi.php");
$query = "INSERT INTO addressbook (Id, Firstname, Lastname, Email, Alamat, Contact) VALUES ('$Id', '$Firstname', '$Lastname', '$Email', '$Alamat', '$Contact')";
$result = mysqli_query($koneksi, $query); 

if ($result == 1) {
	echo"
		<script> 
			alert('Berhasil Dirubah'); 
			location.href='../tb_addressbook.php';
		</script>
	";
}
else{
	echo"
		<script> 
			alert('Gagal Dirubah'); 
			location.href='../tb_addressbook.php';
		</script>
	";
}

mysqli_close($koneksi);
?>
