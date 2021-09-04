<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $daftar->nomer_daftar ?? 'Nomer Antrian' }}</title>
</head>
<body>
    <h3>PENDAFTARAN ONLINE PUSKESMAS JATEN 1</h3>
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
                <td style="padding:5px 0">No Registrasi</td>
                <td style="padding:5px 8px">:</td>
                <td style="padding:5px 0;font-weight: bold">{{ $daftar->nomer_daftar ?? '' }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0">Nama</td>
                <td style="padding:5px 8px">:</td>
                <td style="padding:5px 0">{{ $daftar->nama ?? '' }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0">Alamat</td>
                <td style="padding:5px 8px">:</td>
                <td style="padding:5px 0">{{ $daftar->alamat ?? '' }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0">Tgl Lahir</td>
                <td style="padding:5px 8px">:</td>
                @if ($count == 0)
                    <td style="padding:5px 0"></td>
                @else
                    <td style="padding:5px 0">{{ $daftar->tgl_lahir->format('d M Y') ?? '' }}</td>
                @endif
            </tr>
            <tr>
                <td style="padding:5px 0">Tgl Daftar</td>
                <td style="padding:5px 8px">:</td>
                @if ($count == 0)
                    <td style="padding:5px 0"></td>
                @else
                    <td style="padding:5px 0">{{ $daftar->tgl_periksa->format('d M Y') ?? '' }}</td>
                @endif
            </tr>
            <tr>
                <td style="padding:5px 0">Poli</td>
                <td style="padding:5px 8px">:</td>
                <td style="padding:5px 0">{{ $daftar->poli->nama_poli ?? '' }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0">Dokter</td>
                <td style="padding:5px 8px">:</td>
                <td style="padding:5px 0">{{ $daftar->dokter->nama_dokter ?? '' }}</td>
            </tr>
            <tr>
                <td style="padding:5px 0">Jadwal</td>
                <td style="padding:5px 8px">:</td>
                <td style="padding:5px 0">{{ $daftar->jadwal->dari ?? '' }} - {{ $daftar->jadwal->sampai ?? '' }} ( {{ $daftar->jadwal->shift ?? '' }} )</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
