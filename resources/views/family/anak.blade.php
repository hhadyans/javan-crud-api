Anak :
<ul>
    @foreach ($member->children as $member)
        <li>Nama : {{ $member->nama }} <br>
        Jenis Kelamin : {{ ($member->jenis_kelamin == 1) ? 'Laki-laki' : 'Perempuan' }}</li>
        @if (count($member->children) > 0)
            @include('family.anak')
        @endif
    @endforeach
</ul>
