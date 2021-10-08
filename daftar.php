<?php
	require 'conn.php';
    if (isset($_POST["registrasi"]))
	{
        if(daftar($_POST)>0)
		{
            echo "
            <script>
                alert('Registrasi success');
            </script>
             ";
             echo '<script>window.location="index.php"</script>';
        }
        else {
            echo mysqli_error($conn);
        }   
        
    }
    
	//untuk menampilkan hasil validasi jika ada input yang salah
    if(isset($_GET['error_msg'])){
		echo $_GET['error_msg'];
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
	<title>Register Mahasiswa</title>
</head>
<body>
	<div class="container">
    <div class="card" style="width: 18rem;"></div>
	<h1 class="card-title">Formulir Registrasi Akun</h1>
	<div style="color: dark grey">
	</div>
    <div class="card-body">
    <form method="POST" action="">
		<table cellpadding="10">
			<tr>
				<td><label class="form-label" for="nama">Nama Lengkap</label></td>
				<td>:</td>
				<td><input type="text" class="form-control" name="nama" size="30" maxlength="255" required></td>
			</tr>
            <tr>
				<td><label for="username" class="form-label">Username</label></td>
				<td>:</td>
				<td><input type="username" class="form-control" name="username" size="100" maxlength="255" required></td>
			</tr>
			<tr>
				<td><label for="email" class="form-label">Email</label></td>
				<td>:</td>
				<td><input type="email" class="form-control" name="email" size="100" maxlength="255" required></td>
			</tr>
            <tr>
				<td><label for="alamat" class="form-label">Alamat</label></td>
				<td>:</td>
				<td><input type="alamat" class="form-control" name="alamat" size="100" maxlength="255" required></td>
			</tr>
            <tr>
				<td><label for="password" class="form-label">Password</label></td>
				<td>:</td>
				<td><input type="password" class="form-control" name="password" minlength="6" size="30" maxlength="255" required></td>
			</tr>
			<tr>
				<td><label for="re_password" class="form-label">Konfirmasi Ulang Password</label></td>
				<td>:</td>
				<td><input type="password" class="form-control" name="re_password" minlength="6" size="30" maxlength="255" required></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><button class="btn btn-primary" type="submit" name="registrasi">Sign up</button></td>
			</tr>
		</table>
	</form>
    </div>
    </div>
</div>
</body>
</html>