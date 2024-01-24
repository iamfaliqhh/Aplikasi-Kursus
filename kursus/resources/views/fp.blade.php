<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""E-Warranty">
    <meta property="og:title" content=""E-Warranty">
    <meta property="og:description" content=""E-Warranty">

    <!-- PAGE TITLE HERE -->
    <title>Claim Warranty | Stealth</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <style>
        img {
            height: 276px; 
            width: 100%;
            object-fit: cover;
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sipenmaru/images/logoroblox.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <img src="https://premio.id/wp-content/uploads/2023/12/car-repair-maintenance-theme-mechanic-uniform-working-auto-service-scaled.jpg" class="bg-img object-fit-cover">
    <div class="container">
    <br>
    <br>
    <h1 class="font-weight-bold text-center" style="font-size: 24px;">TERIMA KASIH</h1>
    <p class="text-center" style="font-size: 15px;">Anda telah menggunakan produk berkualitas dari <b>STEALTH HIGH DEFINITION FILMS</b></p>
    <br>
    <p class="text-center" style="font-size: 15px;">
        Dengan memiliki kartu garansi Premio, anda telah mendapatkan jaminan <b>garansi 1 (satu) tahun</b>. Untuk mendapatkan <b>garansi maksimal hingga 7 (tujuh) tahun</b>, 
        <br>silakan aktivasi dan isi data diri anda secara lengkap pada halaman berikut setelah mengisi Kode Garansi anda.
    </p>
    <br>
    <form action="/claim-warranty" method="post">
    @csrf
    <div class="d-flex justify-content-center">
    <div class="input-group w-auto input">
        <label for="" class="form-label"></label>
        <input type="text" placeholder="Masukkan Kode Garansi" class="form-control input" name="code" style="width: 500px" id="" aria-describedby="helpId" placeholder=""/>
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </div>
    </form>
    </div>
</body>
</html>