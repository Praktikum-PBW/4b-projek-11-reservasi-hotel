<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Login Mazzeh</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="POST" action="cek_login.php">
      <div class="text-center mb-4">
        <img class="mb-4" src="assets/img/logo.jpg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Login Form</h1>
        <p>Masukan Username dan Password Anda!</a></p>
      </div>

      <div class="form-label-group">
        <input name ="username" type="text" id="inputEmail" class="form-control" placeholder="Masukan Username" required autofocus>
        <label for="inputEmail">Username</label>
      </div>

      <div class="form-label-group">
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Masukan Password" required>
        <label for="inputPassword">Password</label>
      </div>

      <div class="form-label-group">
        <select class="form-control" name="level" id="">
          <option value="user">User</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <p>Tidak mempunyai Akun?<a href="register.php"> Regist now!</a></p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2012-2022</p>
    </form>
  </body>
</html>
