<?php
//Memulai session
session_start();
if(isset($_SESSION["Login"])){
    header("Location: login.php");
    exit;
 
}
require 'conn.php';

//menangkap data yang dikirim dari form
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordmd5 = md5($password);

    //menyeleksi data user dengan username dan password yg sesuai
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $indexPassword = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' ");
    //mengecek data yang ditemukan
    $cek = mysqli_num_rows($query);

    if($cek > 0) {
        //mengambil data
        $data = mysqli_fetch_array($query);
        $pwd = $data['password'];
        

        if ($pwd != $passwordmd5) {
            //Jika password salah
            echo '
            <script>
                alert("Password Anda Salah");
                window.location.href="login.php";
            </script>';
            
        } else {
            //Password Benar
            if ($role == "Admin") {
                $_SESSION['login'] = 'True';
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $passwordmd5;
        
                echo'
                <script>
                    alert("Anda telah berhasil login");
                    window.location.href="home.php";
                </script>';
            } else {
                $_SESSION['login'] = 'True';
                $_SESSION['username'] = $username;
                echo'
                <script>
                    alert("Anda telah berhasil login sebagai");
                    window.location.href="home.php";
                </script>';
            }
        }
    } else {
        echo '
        <script>
            alert("Username Anda Salah");
            window.location.href="login.php";
        </script>';
    }
} 
?>  