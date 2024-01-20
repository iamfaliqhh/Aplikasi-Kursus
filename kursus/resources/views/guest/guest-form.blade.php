<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="E-Warranty">
    <meta property="og:title" content="E-Warranty">
    <meta property="og:description" content="E-Warranty">

    <!-- PAGE TITLE HERE -->
    <title>E-Warranty Form | Stealth</title>
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('sipenmaru/images/logoroblox.png') }}">
    <link href="{{ asset('sipenmaru/vendor/login/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="/warranty" class="warranty-form">
                    {{ csrf_field() }}

                    <h2 class="title">E-Warranty Registration</h2>
                    <div class="input-field">
                        <i class=""></i>
                        <input type="text" placeholder="Masukkan Kode Garansi" name="text" value="" autocomplete='off' />
                    </div>

                    <div class="input-field">
                        <i class=""></i>
                        <input type="text" placeholder="Masukkan nama Anda" name="text" autocomplete='off' />
                    </div>
                    
                    <div class="input-field">
                        <i class=""></i>
                        <input type="date" placeholder="Masukkan tanggal lahir Anda" name="date" autocomplete='off' />
                    </div>

                    <div class="input-field">
                        <i class=""></i>
                        <input type="email" placeholder="Masukkan email Anda" name="email" autocomplete='off' />
                    </div>
                    <div class="input-field">
                        <i class=""></i>
                        <input type="number" placeholder="Masukkan no. telepon Anda" name="number" autocomplete='off' />
                    </div>
                    <div class="input-field">
                        <i class=""></i>
                        <input type="text" placeholder="Masukkan alamat Anda" name="text" autocomplete='off' />
                    </div>
                    <input type="submit" value="MASUK" class="btn solid" />
</body>