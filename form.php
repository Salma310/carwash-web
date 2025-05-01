<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Csrf Token  -->
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity=
    "sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Form Booking</title>


    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    .container {
    max-width: 500px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 8px;
    background-image: url('path/to/image/background.jpg');
    background-size: cover;
    background-position: center;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
    }

    h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #007bff; /* Warna biru */
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-weight: bold;
        color: #333;
    }

    input[type="text"],
    input[type="number"],
    input[type="datetime-local"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        transition: border-color 0.3s ease-in-out;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    input[type="datetime-local"]:focus,
    select:focus,
    textarea:focus {
        border-color: #007bff; /* Warna biru saat focus */
    }

    .btn-primary {
        background-color: #007bff; /* Warna biru tombol */
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Warna biru saat hover tombol */
    }

    .text-danger {
        color: #dc3545; /* Warna merah untuk pesan error */
        margin-top: 5px;
    }

    .btn-link {
        color: #007bff; /* Warna biru untuk tombol link */
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .btn-link:hover {
        color: #0056b3; /* Warna biru saat hover tombol link */
    }
</style>

</head>
<body>
    <div class="container">
        <h2 align="center" style="margin: 30px;">Form Booking</h2>

        <form action="./form_proses.php" method="POST"  class="form-data" id="form-data">
            <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="id" id="id">
                <input type="text" name="nama" id="nama" class="form-control" required="true">
                <p class="text-danger" id="err_nama"></p>  <!-- modifikasi untuk cek eror -->
            </div>
            <div class="form-group">
                <label>Jenis Kendaraan</label> <br>
                <select class="form-select" aria-label="Default select example" name="jns_kendaraan" id="jns_kendaraan">
                    <option selected>Open this select menu</option>
                    <option value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select>
            </div>
            <div class="form-group">
                <label>Waktu</label>
                <input type="datetime-local" name="waktu" id="waktu" class="form-control" required="true">
                <p class="text-danger" id="err_bookingtime"></p>
            </div>
            <div class="form-group">
                <label>No Telepon</label>
                <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                <p class="text-danger" id="err_no_telp"></p>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control" required="true"></textarea>
                <p class="text-danger" id="err_alamat"></p>
            </div>
            <div class="form-group">
                <label>Jenis Layanan</label> <br>
                <select class="form-select" aria-label="Default select example" name="jns_layanan" id="jns_layanan">
                    <option selected>Open this select menu</option>
                    <option value="standart">Standart</option>
                    <option value="deepclean">Deep Clean</option>
                    <option value="premium">Premium Wash</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="simpan" id="simpan" class="btn btn-primary">
                    <i class="fa fa-save"></i> Submit
                </button>
            </div>
        </form>
        <hr>

        <div id="hasil"></div>     
    </div>
    
    <script>
            $(document).ready(function() {
                $("#form-data").submit(function(e){
                    e.preventDefault(); //Mencegah pengiriman form secara default

                    //Mengumpulkan data form
                    var formData = $("#form-data").serialize();

                    //Kirim data ke server PHP
                    $.ajax({
                        url: "form_proses.php",  
                        type: "POST",
                        data: formData,
                        success: function(response){
                            //Tampilkan hasil dari server di div "hasil"
                            $("#hasil").html(response);
                        }
                    })
                });
            });
    </script>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
</body>
</html>
