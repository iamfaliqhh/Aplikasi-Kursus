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
    <div class="container">
        <br>
        <br>
    <form action="/fp/{{$check->code}}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="" class="form-label label-font">Nama Lengkap</label>
        <input
            type="text"
            class="form-control"
            name="nama"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <br>
        <label for="" class="form-label label-font">Tanggal Lahir</label>
        <input
            type="date"
            class="form-control"
            name="tanggal-lahir"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <br>
        <label for="" class="form-label label-font">Email</label>
        <input
            type="email"
            class="form-control"
            name="email"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <br>
        <label for="" class="form-label label-font">No. Handphone</label>
        <input
            type="tel"
            class="form-control"
            name="handphone"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <br>
        <label for="" class="form-label label-font">Alamat</label>
        <input
            type="text"
            class="form-control"
            name="alamat"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <br>
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
    <button type="submit">Submit</button>
    </form>
</body>
</html>