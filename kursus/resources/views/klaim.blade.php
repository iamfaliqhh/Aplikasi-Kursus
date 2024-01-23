<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Claim Warranty</title>
</head>
<body>
    <form action="/fp/{{$check->code}}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Nama</label>
        <input
            type="text"
            class="form-control"
            name="nama"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <label for="" class="form-label">Mobil</label>
        <input
            type="text"
            class="form-control"
            name="mobil"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
    </div>
    <button type="submit">Submit</button>
    </form>
</body>
</html>