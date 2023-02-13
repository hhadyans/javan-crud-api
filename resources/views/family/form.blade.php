<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    @if ($data->id)
        @php
            $action = route('family.update', $data->id);
        @endphp
    @else
        @php
            $action = route('family.store');
        @endphp
    @endif
    <form action="{{ $action }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="{{ $data->nama }}" id=""></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <input type="radio" value="1" name="jenis_kelamin" id="" {{ ($data->jenis_kelamin == 1) ? 'checked' : '' }}> Laki-laki
                    <input type="radio" value="2" name="jenis_kelamin" id="" {{ ($data->jenis_kelamin == 2) ? 'checked' : '' }}> Perempuan
                </td>
            </tr>
            <tr>
                <td>Orang Tua</td>
                <td>
                    <select name="parent_id" id="">
                        <option value="">Opsi Orang Tua</option>
                        @foreach ($parents as $parent)
                            <option value="{{ $parent->id }}" {{ ($data->parent_id == $parent->id) ? 'selected' : '' }}>{{ $parent->nama }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit">Save</button>
    </form>
</body>
</html>
