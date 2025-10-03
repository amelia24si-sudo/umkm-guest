<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Pegawai</title>
</head>
<body>
    <h1>Data Pegawai</h1>

    <p><strong>Nama: </strong>{{ $name }}</p>
    <p><strong>Umur: </strong> {{ $tanggal_lahir }}, {{ $tahun_skarang - $tahun_lahir }} thn</p>
    <p><strong>Hobbies: </strong></p>
    <ul>
        @foreach($hobbies as $hobby)
            <li>{{ $hobby }}</li>
        @endforeach
    </ul>

    <p><strong>Tanggal wisuda : </strong>{{ $tanggal_harus_wisuda }}, {{ $tahun_wisuda - $tahun_skarang }} tahun lagi wisuda</p>
    <p><strong>Semester saat ini : </strong>{{ $current_semester }} ,
        @if ($current_semester < 3)
            Masih Awal, Kejar TAK
        @else
            Jangan main-main, kurang-kurangi main game!
        @endif
    </p>
    <p><strong>Cita-cita : </strong>{{ $future_goal }}</p>
