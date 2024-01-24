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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <img src="https://premio.id/wp-content/uploads/2023/12/car-repair-maintenance-theme-mechanic-uniform-working-auto-service-scaled.jpg" class="bg-img object-fit-cover">
    <div class="container" style="width: 900px;">
        <br>
        <br>
    <form action="/fp/{{$check->code}}" method="post">
    @method('put')
    @csrf
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Nama</label>
            <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan Nama Lengkap Anda">
        </div>
        <div class="form-group col-md-6">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal" id="" placeholder="Masukkan Tanggal Lahir Anda">
        </div>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Masukkan Email Anda">
        </div>
        <div class="form-group col-md-6">
            <label for="">No. Handphone</label>
            <input type="te" class="form-control" name="handphone" id="" placeholder="Masukkan No. HP Anda">
        </div>
    </div>
    <div class="form-group label-font">
        <label for="">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan Alamat Lengkap Anda">
    </div>
    <div class="mb-3">
        <label for="" class="form-label label-font">Merek Mobil</label>
        <select class="form-control">
            <option>Pilih merek mobil anda</option>
        </select>
        <br>
        <label for="" class="form-label label-font">Tipe Mobil</label>
        <select class="form-control">
            <option>Pilih tipe mobil anda</option>
        </select>
    </div>
    <br>
    <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</body>
</html>