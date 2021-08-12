<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data->nomer_daftar }}-{{ $data->nomer_antrian }}</title>
</head>
<body>
    <div style="text-align:center">
        <h3>ANTRIAN KE :</h3>
        <div style="margin:100px 0;font-size:100px">
            {{ $data->nomer_antrian }}
        </div>
        <span>{{ $data->tgl_periksa->format('D-d-M-y') }}</span>
    </div>
</body>
</html>
