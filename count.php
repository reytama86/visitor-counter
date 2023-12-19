<?php
$host = "localhost"; // Ganti dengan alamat host PostgreSQL Anda
$port = 5432; // Port default PostgreSQL
$username = "postgres"; // Ganti dengan nama pengguna PostgreSQL Anda
$password = "123"; // Ganti dengan kata sandi PostgreSQL Anda
$dbname = "vcount";
$conn = pg_connect("host=localhost dbname=vcount user=postgres password=1234");
$query = "SELECT * FROM visitor ORDER BY tanggal DESC";
$ambilData = pg_query($conn, $query);

$hariIni = date("Y-m-d");
$kemarin = date("Y-m-d", strtotime("-1 day"));
$totalAkhir = pg_fetch_assoc(pg_query($conn, "SELECT COUNT(*) FROM visitor"))['count'];
$totalHariIni = pg_fetch_assoc(pg_query($conn, "SELECT COUNT(*) FROM visitor WHERE DATE(tanggal) = '$hariIni'"))['count'];
$totalKemarin = pg_fetch_assoc(pg_query($conn, "SELECT COUNT(*) FROM visitor WHERE DATE(tanggal) = '$kemarin'"))['count'];
?>