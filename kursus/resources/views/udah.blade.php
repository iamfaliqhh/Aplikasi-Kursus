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
    <title>Claim Warranty | DrArtexFilms</title>
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

        .text-mask {
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0, 0.4); 
            color: white;
            font-weight: bold;
            border: 0px solid;

            /* now center the mask*/
            position: absolute;
            top: 137px;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 100%;
            padding: 111px;
            text-align: center;
        }

        @media only screen and (max-width: 768px) {
            img {
                height: 212px; 
                width: 100%;
                object-fit: cover;
            }

            .text-mask {
                background-color: rgb(0,0,0); 
                background-color: rgba(0,0,0, 0.4); 
                color: white;
                font-weight: bold;
                border: 0px solid;

                /* now center the mask*/
                position: absolute;
                top: 106px;
                left: 50%;
                transform: translate(-50%, -50%);
                z-index: 2;
                width: 100%;
                padding: 84px;
                text-align: center;
            }

            .header-bold {
            font-size:30px;
            }
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div>
        <img src="https://premio.id/wp-content/uploads/2023/12/car-repair-maintenance-theme-mechanic-uniform-working-auto-service-scaled.jpg" class="bg-img object-fit-cover">
        <div class="text-mask">
            <h1 class="font-weight-bold header-bold">E-WARRANTY</h1>
        </div>
    </div>
    <div class="container text-center">
    <br>
    <h1 class="font-weight-bold" style="font-size: 24px;">Terima kasih telah mengisi data!</h1>
    <p style="font-size: 15px;">Selamat! Warranty anda telah diaktivasi dan berlaku untuk 7 tahun.</p>
    <br>
    
    @php
        $countdown_front = app('App\Http\Controllers\WarrantyController')->warrantyCountdown($check->code,'front');
        $countdown_side = app('App\Http\Controllers\WarrantyController')->warrantyCountdown($check->code,'side');
        $countdown_back = app('App\Http\Controllers\WarrantyController')->warrantyCountdown($check->code,'back');
        $countdown_ppf = app('App\Http\Controllers\WarrantyController')->warrantyCountdown($check->code,'ppf');
    @endphp

    <table class="table table-bordered text-left">
        <tr>
            <td scope="col"><b>Nama Pemilik</b></td>
            <td>{{$check->nama}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Merek Mobil</b></td>
            <td>{{$check->tipe_mobil->merek->name ?? '-'}}</td>
        </tr>
        <tr>
            <td scope="col"><b>Jenis Mobil</b></td>
            <td>{{$check->tipe_mobil->name ?? '-'}}</td>
        </tr>
        <tr>
            <td scope="col"><b>PPF</b></td>
            <td>{{$check->ppf_name ?? '-'}} ({{$countdown_ppf}})</td>
        </tr>
        <tr>
            <td scope="col"><b>Kaca Film Depan</b></td>
            <td>{{$check->front ?? '-'}} ({{$countdown_front}})</td>
        </tr>
        <tr>
            <td scope="col"><b>Kaca Film Samping</b></td>
            <td>{{$check->side ?? '-'}} ({{$countdown_side}})</td>
        </tr>
        <tr>
            <td scope="col"><b>Kaca Film Belakang</b></td>
            <td>{{$check->back ?? '-'}} ({{$countdown_back}})</td>
        </tr>
    </table>
    <br>
    <a class="btn btn-primary" style="" href="{{url('fp')}}" >Balik ke halaman utama</a>
</div>
</body>

</html>