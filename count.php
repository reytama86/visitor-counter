<?php
$host = getenv('POSTGRES_HOST');
$port = getenv('POSTGRES_PORT');
$username = getenv('POSTGRES_USER');
$password = getenv('POSTGRES_PASSWORD');
$dbname = getenv('POSTGRES_DB');

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$username password=$password");

if (!$conn) {
    die("Koneksi gagal: " . pg_last_error());
}

$hariIni = date("Y-m-d");
$kemarin = date("Y-m-d", strtotime("-1 day"));
$totalAkhir = pg_fetch_assoc(pg_query($conn, "SELECT COUNT(*) FROM visitor"))['count'];
$totalHariIni = pg_fetch_assoc(pg_query($conn, "SELECT COUNT(*) FROM visitor WHERE DATE(tanggal) = '$hariIni'"))['count'];
$totalKemarin = pg_fetch_assoc(pg_query($conn, "SELECT COUNT(*) FROM visitor WHERE DATE(tanggal) = '$kemarin'"))['count'];

$query = "SELECT * FROM visitor ORDER BY tanggal DESC";
$ambilData = pg_query($conn, $query);

// Tutup koneksi
pg_close($conn);
?>
