<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <form action="{{ route('family.store') }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" id=""></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" value="1" name="jenis_kelamin" id=""> Laki-laki
                    <input type="radio" value="2" name="jenis_kelamin" id=""> Perempuan
                </td>
            </tr>
            <tr>
                <td>Orang Tua</td>
                <td>
                    <select name="parent_id" id="">
                        <option value="">Opsi Orang Tua</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}">{{ $parent->nama }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Save</button>
    </form>
</body>
</html>
