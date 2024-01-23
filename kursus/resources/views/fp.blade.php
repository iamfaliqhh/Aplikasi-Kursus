<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Claim Warranty</title>
</head>
<body>
    <form action="/claim-warranty" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Code</label>
        <input
            type="text"
            class="form-control"
            name="code"
            id=""
            aria-describedby="helpId"
            placeholder=""
        />
        <small id="helpId" class="form-text text-muted">Lu masukin warranty</small>
    </div>
    <button type="submit">Submit</button>
    </form>
</body>
</html>