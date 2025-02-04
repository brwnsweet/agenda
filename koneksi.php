<?php
$host = "localhost"; // Server database
$user = "root"; // Username database
$pass = ""; // Password database (kosong jika menggunakan XAMPP)
$db   = "db_agenda"; // Nama database

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $db);
