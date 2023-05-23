<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>How to Generate QR Code in Laravel 8</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                {{-- <h2>Simple QR Code</h2> --}}
            </div>
            <div class="d-flex justify-content-center card-body">
                {!! QrCode::size(300)->generate($data_customer->barcode) !!}
            </div>
        </div>

        <div class="card">
            <div class="card-header d-flex justify-content-center">
                <h2>Color QR Code</h2>
            </div>
            <div class="card-body">

            </div>
        </div>

    </div>
</body>

</html>
