<?php
 include "koneksi.php";
 $pass = md5($_POST['password']);
 $username = mysqli_escape_string($koneksi, $_POST['username']);
 $password = mysqli_escape_string($koneksi, $pass);
 $level = mysqli_escape_string($koneksi, $_POST['level']);

 //cek user terdaftar atau tidak
 $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE nama = '$username' and level='$level' ");
 $user_valid = mysqli_fetch_array($cek); 

 //uji valid
 if($user_valid){
     //jika uname terdaftar
     //cek password
     if($password == $user_valid['password']){
         //jika pass sesuai
         session_start();
         $_SESSION['nama'] = $user_valid['nama'];
         $_SESSION['level'] = $user_valid['level'];

         //uji level
         if($level == "user"){
             header('location:home_user.php');
            }elseif ($level == "admin"){
            header('location:home_admin.php');
     }else{
        echo "<script>alert('Login Gagal Password Tidak Sesuai'); document.location='index.php'</script>";
    }
}
// else{
//      echo "<script>alert('Login Gagal Username Tidak Terdaftar'); document.location='index.php'</script>";
//  }
 }