<?php
session_start();
if (!isset($_SESSION['username'])) {
        header("Location: login.php");
        exit();
}

include "count.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Visitor Counter</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>
<body>
    <div class="bg">
        <div class="title">
            <h1>VISITOR COUNTER</h1>
            <h4><?php
                if (isset($_GET["username"])) {
                    $username = $_GET["username"];
                    echo "Welcome, $username!";
                }
            ?></h4>
        </div>
        <div class="row">
            <div class="col">
                <div class="counter-box">
                    <h2 class="counter"><?php echo "".$totalAkhir."";?></h2>
                    <h4>Jumlah Pengunjung Situs</h4>
                </div>
            </div>
            <div class="col">
            <div class="counter-box">
                    <h2 class="counter"><?php echo "".$totalHariIni.""; ?></h2>
                    <h4>Pengunjung Hari Ini</h4>
                </div>
            </div>
            <div class="col">
            <div class="counter-box">
                    <h2 class="counter"><?php echo "".$totalKemarin.""; ?></h2>
                    <h4>Pengunjung Kemarin</h4>
                </div>
            </div>
        </div>
    </div>
    <main>
        <section class="background">
            <div class="detail">
                <h3>Detail</h3>
                <main class="table">
                    <section class="table_header">
                        <h1>Detail Pengunjung Situs</h1>
                    </section>
                    <section class="table_body">
                        <table>
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Username </th>
                                    <th> Tanggal </th>
                                    <th> User Agent </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                while ($row = pg_fetch_assoc($ambilData)) { ?>
                                <tr>
                                    <td> <?php echo $no; ?> </td>
                                    <td> <?php echo $row["username"]; ?> </td>
                                    <td> <?php echo $row["tanggal"]; ?> </td>
                                    <td> <?php echo $row["user_agent"]; ?> </td>
                                </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </section>
                </main>
            </div>
        </section>
    </main>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
    <script src="jquery.counterup.min.js"></script>
    <script>
        jQuery(document).ready(function($){
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>
</body>
</html>
