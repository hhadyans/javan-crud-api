<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Keluarga</title>
</head>
<body>
    <a href="{{ route('family.create') }}">Create New Data</a>
    <a href="{{ route('family.treeView') }}">View Tree Data</a>
    <table>
        <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Orang Tua</th>
            <th></th>
        </tr>
        @foreach ($family as $person)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $person->nama }}</td>
            <td>{{ ($person->jenis_kelamin == 1) ? 'Laki-laki' : 'Perempuan' }}</td>
            <td>
                @if ($person->parent)
                        {{ $person->parent->nama }}
                @endif
            </td>
            <td>
                <a href={{ route('family.edit', ['family' => $person]) }}>Edit</a> | <a href={{ route('family.delete', $person->id) }}>Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
