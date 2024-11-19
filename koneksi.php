<?php
$koneksi = mysqli_connect("localhost:3307","root","123","proyekakhir");

if (mysqli_connect_error()){
	echo "koneksi database gagal" .mysqli_connect_error();
}
?>