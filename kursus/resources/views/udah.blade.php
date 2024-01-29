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
        .label-font {
            font-size: 13px;
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sipenmaru/images/logoroblox.png') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <img src="https://premio.id/wp-content/uploads/2023/12/car-repair-maintenance-theme-mechanic-uniform-working-auto-service-scaled.jpg" class="bg-img object-fit-cover">
    <div class="container text-center">
    <br>
    <h1 class="font-weight-bold" style="font-size: 24px;">Terima kasih telah mengisi data!</h1>
    <p style="font-size: 15px;">Selamat! Warranty anda telah diaktivasi dan berlaku untuk 7 tahun.</p>
    <br>
    <table class="table table-bordered text-left">
        <tr>
            <td scope="col"><b>Nama</b></td>
            <td>{{$check->nama}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Tanggal Lahir</b></td>
            <td>{{$check->tanggal}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Email</b></td>
            <td>{{$check->email}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Nomor Telepon</b></td>
            <td>{{$check->handphone}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Alamat</b></td>
            <td>{{$check->alamat}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Tipe</b></td>
            <td>{{$check->tipe_mobil->name ?? '-'}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Merek</b></td>
            <td>{{$check->tipe_mobil->merek->name ?? '-'}}</td>
    </table>
    <br>
    <a class="btn btn-primary" style="" href="{{url('fp')}}" >Balik ke halaman utama</a>
</div>
</body>
</html>