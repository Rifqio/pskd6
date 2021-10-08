<?php
$conn = mysqli_connect('localhost', 'root', '', 'skd');
// Check connection
if (mysqli_connect_errno())
{
 echo "Koneksi GAGAL : " . mysqli_connect_error();
}

