<?php
// Memulai sesi
session_start();

// Menghubungkan ke database
include("koneksi.php");

// Mendapatkan username dari sesi
$username = $_SESSION['username'];

// Inisialisasi query untuk menampilkan semua data secara default
$query = "SELECT * FROM addressbook ORDER BY id ASC";

// Mengecek jika ada pencarian
if (isset($_GET['kata_cari']) && isset($_GET['kategori'])) {
    // Mendapatkan nilai dari pencarian dan kategori
    $kata_cari = $_GET['kata_cari'];
    $kategori = $_GET['kategori'];
    
    // Membuat query pencarian berdasarkan kategori dan kata kunci
    $query = "SELECT * FROM addressbook WHERE $kategori LIKE '%".$kata_cari."%' ORDER BY id ASC";
}

// Melakukan query ke database
$result = mysqli_query($koneksi, $query);

// Mengecek apakah query berhasil
if (!$result) {
    die("Query error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Alamat</title>
    <link rel="stylesheet" href="addressbook.css">  
</head>
<body>
    <nav>
        <div class="menu">
            <div class="left-menu">
                <a href="#" style="color:black; cursor:default;">Selamat Datang |</a>
                <a href="tb_addressbook.php">Buku Alamat</a>
            </div>
            <div class="right-menu">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="wrapper">
            <div class="menu-side">
                <div class="left-side">
                    <h1>Tabel Alamat</h1>
                </div>
                <div class="right-side">
                    <div class="btn-tambah">
                        <a href="addressbook/tambah_addressbook.php">Tambah Data</a>
                    </div>
                </div>
            </div>

            <!-- Form pencarian dengan pilihan kategori -->
            <form method="GET" action="tb_addressbook.php" style="text-align: right;">
                <label>Pencarian: </label>
                <!-- Dropdown untuk memilih kategori pencarian -->
                <select name="kategori">
                    <option value="Email" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'Email') echo 'selected'; ?>>Email</option>
                    <option value="Alamat" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'Alamat') echo 'selected'; ?>>Alamat</option>
                    <option value="Contact" <?php if(isset($_GET['kategori']) && $_GET['kategori'] == 'Contact') echo 'selected'; ?>>Contact</option>
                </select>
                <!-- Input untuk memasukkan kata kunci pencarian -->
                <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" />
                <button class="simpan" type="submit">Cari</button>
            </form>
            
            <!-- Tabel untuk menampilkan data dari database -->
            <table id="customers">
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Contact</th>
                    <th>Aksi</th>
                </tr>

                <?php 
                // Loop untuk menampilkan data dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                ?>  
                    <tr>
                        <td><?php echo $row['Id']; ?></td>
                        <td><?php echo $row['Firstname']; ?></td>
                        <td><?php echo $row['Lastname']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Alamat']; ?></td>
                        <td><?php echo $row['Contact']; ?></td>
                        <td>
                            <!-- Link untuk edit dan delete dengan konfirmasi -->
                            <a class="edit" href="addressbook/edit_addressbook.php?kode=<?php echo $row['Id']; ?>" onclick="return confirm('Yakin?')">Edit</a> || 
                            <a class="delete" href="addressbook/delete_addressbook.php?Id=<?php echo $row['Id']; ?>" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php 
                } 
                ?>
            </table>
        </div>
    </div>
</body>
</html>
