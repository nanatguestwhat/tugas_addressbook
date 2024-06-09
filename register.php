<?php 
    session_start();
  include ('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <title>Register</title>
</head>

<body>
    <center>
      <div class="wrapper">
        <form action="prosesregister.php" method="POST">
          <h1>Buku Alamat</h1>
            <input type="text" placeholder="name" name="name" required>
            <input type="text" placeholder="email" name="email" required>
            <input type="text" placeholder="username" name="username" required> 
            <input type="password" placeholder="password" name="password" required> 
            <button class="simpan" type="submit">Register</button>
        </form>
        </div>
    </center>
    
</body>
</html>