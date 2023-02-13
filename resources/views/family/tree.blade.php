<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Keluarga Tree</title>
</head>
<body>
    <ul>
        @foreach ($family as $member)
            <li>Nama : {{ $member->nama }} <br>
            Jenis Kelamin : {{ ($member->jenis_kelamin == 1) ? 'Laki-laki' : 'Perempuan' }}</li>
            @if (count($member->children) > 0)
                @include('family.anak')
            @endif
        @endforeach

    </ul>
</body>
</html>
