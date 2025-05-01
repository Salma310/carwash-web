<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {
// Panggil file koneksi database
    include 'config/koneksi.php'; // Sesuaikan dengan nama file koneksi Anda

    $nama = $_POST['nama'];
    $jns_kendaraan = $_POST['jns_kendaraan'];
    $waktu = date('Y-m-d H:i:s', strtotime($_POST['waktu'])); // Konversi format datetime
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $jns_layanan = $_POST['jns_layanan'];

    // Simpan data booking ke session
    $_SESSION['booking'] = array(
        'nama' => $nama,
        'jns_kendaraan' => $jns_kendaraan,
        'waktu' => $waktu,
        'no_telp' => $no_telp,
        'alamat' => $alamat,
        'jns_layanan' => $jns_layanan
    );
    echo "Booking berhasil! Terima kasih, $nama.";

    setcookie('last_booking', serialize($_SESSION['booking']), time() + (86400 * 30), "/");

    

    // Buat query untuk menyimpan data ke database
    $query = "INSERT INTO booking (nama, jenis, tanggal, alamat, no_telp, layanan) VALUES ('$nama', '$jns_kendaraan', '$waktu', '$alamat','$no_telp' , '$jns_layanan')";

    // Eksekusi query
    if (mysqli_query($koneksi, $query)) {
        header("Location: print.php"); 
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }


// Tutup koneksi database
mysqli_close($koneksi);
}
?>