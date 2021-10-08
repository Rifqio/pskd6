<?php
//Membuat Koneksi PHP
$conn = mysqli_connect('localhost', 'root', '', 'skd') or die("<h3>MySQL connection is failed.</h3><br>"); 

// fungsi daftar akun
function daftar($data){
    global $conn;
    $username       = strtolower($data["username"]);
    $email          = $data["email"];
    $nama           = $data["nama"];
    $password       = mysqli_escape_string ($conn, $data["password"]);
    $password2      = mysqli_escape_string ($conn, $data["re_password"]);
    $passwordmd5    = md5($password);
    $address        = $data["alamat"];
    $uppercase      = preg_match('@[A-Z]@', $password);
    $lowercase      = preg_match('@[a-z]@', $password);
    $number         = preg_match('@[0-9]@', $password);
    $specialChars   = preg_match('@[^\w]@', $password);
    $aktif          = 0;
    $token          = hash('sha256', md5(date('Y-m-d-s'))) ;

    // cek username sudah ada belum
    $cekusername = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($cekusername)){
        echo "
        <script>
            alert('username sudah terdaftar');
        </script>
        ";
        return false;
    }  

    // cek email sudah ada belum
    $cekemail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");

        if (mysqli_fetch_assoc($cekemail)) {
            echo "
            <script>
                alert('email sudah terdaftar');
            </script>
            ";
            return false;
        }
   
        // cek password konfirmasi
        global $conn;
        if ($password != $password2){
            echo "
            <script>
                alert('konfirmasi password tidak sama');
            </script>
            ";
            return false;
        } 

        //  cek panjang password
         elseif(strlen($password)<=7){
            echo "
            <script>
                alert('Password tidak boleh kurang dari 8 karakter');
            </script>
            ";
            return false;
        }
        // cek uppercase
        elseif(!$uppercase){
            echo "
            <script>
                alert('Password setidaknya mengandung 1huruf besar');
            </script>
            ";
            return false;
        }
        // cek lowercase
        elseif(!$lowercase){
            echo "
            <script>
                alert('Password setidaknya mengandung huruf kecil');
            </script>
            ";
            return false;
        }
        // cek terdapat angka pada password
        elseif(!$number){
            echo "
            <script>
                alert('Password setidaknya mengandung angka');
            </script>
            ";
            return false;
        }
        // cek terdapat spesial karakter
        elseif(!$specialChars){
            echo "
            <script>
                alert('Password setidaknya spesial karakter seperti !@#$% dll');
            </script>
            ";
            return false;
        }else {
            mysqli_query ($conn, "INSERT INTO users VALUES ('$username','$passwordmd5','$email','$address','$nama','$token','$aktif')");
            return mysqli_affected_rows($conn);
        }
    }