<?php
if(session_status() === PHP_SESSION_NONE)
    session_start();


include "config/koneksi.php";
include "fungsi/pesan_kilat.php";
include "fungsi/anti_injection.php";

$username= $_POST['username'];
$password=$_POST['password']; 


$query="SELECT * FROM user WHERE username ='$username' AND password ='$password'";
  
//Melakukan Query
$result=mysqli_query($koneksi, $query);

//Memeriksa jumlah baris yang ditemukan
$cek=mysqli_num_rows($result);

if($cek>0){
    setcookie('username', $username, time() + (86400 * 30), '/');
    
    $_SESSION['username']=$username;
    $_SESSION['status'] = 'login';
    header("Location: home.html");
    exit;
    //  keluar dari script setelah melakukan redirect
} else {
    $pesan_gagal = "Login gagal: Password atau Username Salah.";
    $_SESSION['pesan_gagal'] = $pesan_gagal;
    echo mysqli_error($koneksi);
    header("Location: index.php");
    exit; //  keluar dari script setelah melakukan redirect
}
?>