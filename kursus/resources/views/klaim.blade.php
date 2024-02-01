<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="shortcut icon" type="image/png" href="{{ asset('sipenmaru/images/stealth.png') }}">
    <!-- BOOTSTRAP LINK -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- JQUERY LINK -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <input type="text" name="nama" class="form-control" id="" placeholder="Masukkan Nama Lengkap Anda" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tanggal" id="" placeholder="Masukkan Tanggal Lahir Anda" required>
        </div>
    </div>
    <div class="form-row label-font">
        <div class="form-group col-md-6">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" id="" placeholder="Masukkan Email Anda" required>
        </div>
        <div class="form-group col-md-6">
            <label for="">No. Handphone</label>
            <input type="te" class="form-control" name="handphone" id="" placeholder="Masukkan No. HP Anda" required>
        </div>
    </div>
    <div class="form-group label-font">
        <label for="">Alamat</label>
        <input type="text" class="form-control" name="alamat" id="" placeholder="Masukkan Alamat Lengkap Anda" required>
    </div>
    <div class="mb-3">
        <label for="" class="form-label label-font">Merek Mobil</label>
        <select id="merek-dropdown" class="form-control select2" name="merk">
            <option value="">-- Pilih Merek --</option>
            @foreach ($mereks as $data)
            <option value="{{$data->id}}">
                {{$data->name}}
        </option>
        @endforeach
        </select>
        <br>
        <label for="" class="form-label label-font">Tipe Mobil</label>
        <select id="tipe-dropdown" class="form-control select2" name="tipe">
        </select>
    </div>
    <div class="mb-3">
        <label for="" class="form-label label-font">Front Window Film</label>
        <select id="windowfilms-dropdown" class="form-control select2" name="merk">
            <option value="">-- Pilih Window Film --</option>
            @foreach ($WindowFilms as $data)
            <option value="{{$data->id}}">
                {{$data->name}}
        </option>
        @endforeach
        </select>
    </div>
    <br>
    <button class="btn btn-primary" type="submit">Submit</button>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
        $('.select2').select2();
  
            /*------------------------------------------
            --------------------------------------------
            Merek Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#merek-dropdown').on('change', function () {
                var idMerek = this.value;
                $("#tipe-dropdown").html('');
                $.ajax({
                    url: "{{url('api/fetch-tipe')}}",
                    type: "POST",
                    data: {
                        merek_id: idMerek,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#tipe-dropdown').html('<option value="">-- Pilih Tipe --</option>');
                        $.each(result.tipe, function (key, value) {
                            $("#tipe-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                        $('#tipe-dropdown').select2();
                    }
                });
            });
        });

        $(document).ready(function () {
        $('.select2').select2();
    </script>
</body>
</html>