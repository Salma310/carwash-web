<?php
session_start();

// Ambil data booking terakhir dari cookie
$lastBooking = isset($_COOKIE['last_booking']) ? unserialize($_COOKIE['last_booking']) : null;

// Ambil semua data booking dari session
$bookings = isset($_SESSION['bookings']) ? $_SESSION['bookings'] : array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Page</title>
    
    <!-- CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 align="center">Informasi Booking</h2>

        <?php if ($lastBooking) : ?>
            <p>Nama: <?php echo $lastBooking['nama']; ?></p>
            <p>Jenis Kendaraan: <?php echo $lastBooking['jns_kendaraan']; ?></p>
            <p>Waktu Booking: <?php echo $lastBooking['waktu']; ?></p>
            <p>No Telp: <?php echo $lastBooking['no_telp']; ?></p> 
            <p>Alamat: <?php echo $lastBooking['alamat']; ?></p> 
            <p>Layanan: <?php echo $lastBooking['jns_layanan']; ?></p> 

            <?php endif; ?>

        <div id="bookingInfo"></div>
        <div>
            <button class="btn" onclick="goToHomePage()">Kembali ke Halaman Utama</button>

            <script>
            function goToHomePage() {
                window.location.href = "home.html";
            }
            </script>        
        </div>
        

    </div>
    
</body>
</html>
