<?php 
    session_start();
    include ('koneksi.php');

    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $query= mysqli_query($koneksi, "SELECT * FROM login where username = '$username' AND password = '$password'")
                                or die (mysqli_error($koneksi));

    if (mysqli_num_rows($query) > 0) { 
        $data = mysqli_fetch_assoc($query);
        $_SESSION ['username'] = $data['username'];
        $_SESSION ['password'] = $data['password'];
        echo "<script>alert('berhasil login'); window.location = 'tb_addressbook.php';</script>";
    }
    else {
        echo "<script>alert('gagal login'); window.location = 'login.php';</script>";
    }                              
?>