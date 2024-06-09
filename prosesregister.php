<?php 
    session_start();
    include ('koneksi.php');

    $name   = $_POST['name'];
    $email   = $_POST['email'];
    $username   = $_POST['username'];
    $password   = $_POST['password'];

    $query= mysqli_query($koneksi, "SELECT * FROM register where username = '$username'")
                                or die (mysqli_error($koneksi));

    if (mysqli_num_rows($query) > 0) { 
        $data = mysqli_fetch_assoc($query);
        $_SESSION ['name'] = $data['name'];
        $_SESSION ['email'] = $data['email'];
        $_SESSION ['username'] = $data['username'];
        $_SESSION ['password'] = $data['password'];
        echo "<script>alert('berhasil register'); window.location = 'tb_addressbook.php';</script>";
    }
    else {
        echo "<script>alert('gagal register'); window.location = 'register.php';</script>";
    }                              
?>