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

        .form-warranty {
            width: 500px !important;
        }

        .container1 {
            width: 900px;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        
        .float {
	        position:fixed;
	        width:60px;
	        height:60px;
	        bottom:40px;
	        right:40px;
	        background-color:#25d366;
	        color:#FFF;
	        border-radius:50px;
	        text-align:center;
            font-size:30px;
	        box-shadow: 2px 2px 3px #999;
            z-index:100;
        }
        
        .h1-warranty {
            font-size: 20px;
        }

        .p-warranty {
            font-size: 15px;
        }

        .my-float{
	        margin-top:16px;
        }

        .header-bold {
            font-size:40px;
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
            padding: 117px;
            text-align: center;
        }

        @media only screen and (max-width: 768px) {

            .float {
	            position:fixed;
	            width:60px;
	            height:60px;
	            bottom:10px;
	            right:10px;
	            background-color:#25d366c7;
	            color:#FFF;
	            border-radius:50px;
	            text-align:center;
                font-size:30px;
	            box-shadow: 2px 2px 3px #999;
                z-index:100;
            }

            img {
                height: 212px; 
                width: 100%;
                object-fit: cover;
            }

            .h1-warranty {
                font-size: 20px;
            }

            .p-warranty {
                font-size: 12px;
            }

            .form-warranty {
                width: 345px !important;
            }

            .container1 {
                width: 361px;
                padding-right: 15px;
                padding-left: 15px;
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
        }
    </style>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="https://drartexfilms.com/wp-content/uploads/2024/05/cropped-image_2024-05-27_153243567-32x32.png">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=6281934022750&text=Hello%2C%20I%20think%20there%27s%20a%20problem%20with%20my%20data%2Fmisinformation%20in%20my%20warranty%20form.%0ACan%20you%20help%20me%20out%3F" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
    </a>
    <div>
    <img src="https://premio.id/wp-content/uploads/2023/12/car-repair-maintenance-theme-mechanic-uniform-working-auto-service-scaled.jpg" class="bg-img object-fit-cover header">
    <div class="text-mask">
        <h1 class="font-weight-bold header-bold">E-WARRANTY</h1>
    </div>
    </div>
    <div class="container1">
    <br>
    <br>
    <h1 class="font-weight-bold text-center h1-warranty">TERIMA KASIH</h1>
    <p class="text-center p-warranty">Anda telah menggunakan produk berkualitas dari <b>DR ARTEX FILMS</b></p>
    <br>
    <p class="text-center p-warranty">
            Dengan memiliki kartu garansi Dr Artex, anda telah mendapatkan jaminan <b>garansi 1 (satu) tahun</b>. 
        <br>Untuk mendapatkan <b>garansi maksimal hingga seumur hidup*</b>, 
        <br>silahkan aktivasi dan isi data diri anda secara lengkap pada halaman berikut setelah mengisi Kode Garansi anda.
    </p>
    <br>
    <form action="/claim-warranty" method="post">
    @csrf
    <div class="d-flex justify-content-center">
    <div class="input-group w-auto input">
        <label for="" class="form-label"></label>
        <input type="text" placeholder="Masukkan Kode Garansi" class="form-control input form-warranty" name="code" id="" aria-describedby="helpId" placeholder="" required/>
        <button class="btn btn-primary" type="submit">
            Submit
        </button>
    </div>
    </form>
    </div>
    <br>
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <p style="font-size: 12px;">Note :
                <br>1. Data tidak ditemukan atau salah informasi? Silakan hubungi Admin Dr Artex via WhatsApp.
                <br>2. Masa garansi produk sesuai dengan tipe produk yang terpasang.
            </p>
        </div>
    </div>
    <br>
    <br>
    <br>
</body>
</html>