<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $daftar->nomer_antrian ?? 'Nomer Antrian' }}</title>
</head>
<body>
    <table style="max-width: 100%">
        <thead>
            <th style="max-width: auto"></th>
            <th style="max-width: auto"></th>
            <th style="max-width: auto"></th>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>No Registrasi</td>
                <td>:</td>
                <td style="font-weight: bold">{{ $daftar->nomer_antrian ?? '' }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $daftar->nama ?? '' }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $daftar->alamat ?? '' }}</td>
            </tr>
            <tr>
                <td>Tgl Lahir</td>
                <td>:</td>
                @if ($count == 0)
                    <td></td>
                @else
                    <td>{{ $daftar->tgl_lahir->format('d M Y') ?? '' }}</td>
                @endif
            </tr>
            <tr>
                <td>Tgl Daftar</td>
                <td>:</td>
                @if ($count == 0)
                    <td></td>
                @else
                    <td>{{ $daftar->tgl_periksa->format('d M Y') ?? '' }}</td>
                @endif
            </tr>
            <tr>
                <td>Poli</td>
                <td>:</td>
                <td>{{ $daftar->poli->nama_poli ?? '' }}</td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>:</td>
                <td>{{ $daftar->dokter->nama_dokter ?? '' }}</td>
            </tr>
            <tr>
                <td>Jadwal</td>
                <td>:</td>
                <td>{{ $daftar->jadwal->dari ?? '' }} - {{ $daftar->jadwal->sampai ?? '' }} ( {{ $daftar->jadwal->shift ?? '' }} )</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
