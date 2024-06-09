<?php
session_start();
include("../koneksi.php");
$username = $_SESSION['username'];
$query = mysqli_query($koneksi, "SELECT * FROM addressbook where 'buku_alamat'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="../body.css">
</head>

<body>
    <nav>
        <div class="menu">
            <div class="left-menu">
                <a href="#" style="color:black; cursor:default;">Selamat Datang |</a>
                <a href="../tb_addressbook.php">Data Alamat</a>
            </div>
            <div class="right-menu">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="wrapper">
        <p align="center" style="margin-top: 20px;"><b>Tambah Data </b></p>

		<form method="POST" action="add_addressbook.php">

            <div class="item">
                <label>Id</label>
                <input type="text" name="Id">
            </div>    
            <div class="item">
                <label>First Name</label>
                <input type="text" name="Firstname">
            </div>
             <div class="item">
                <label>Last Name</label>
                <input type="text" name="Lastname">
            </div>
            <div class="item">
                <label>Email</label>
                <input type="text" name="Email">
            </div>
            <div class="item">
                <label>Alamat</label>
                <input type="text" name="Alamat">
            </div>
            <div class="item">
                <label>Contact</label>
                <input type="text" name="Contact">
            </div>
			<a href="add_addressbook.php" style="text-decoration:none">
                <button class="simpan" type="submit">Simpan</button>
            </a>
			
		</form>
    </div>
    
</body>
</html>