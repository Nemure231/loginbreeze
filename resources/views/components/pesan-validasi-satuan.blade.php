{{-- Ini adalah komponen terpisah dari blade
    yang depennya ada tanda @.
    ini fungsinya emang sengaja dipisah, biar di
    view bisa ditampilin dnegan tag html khusus yang
    depannya X
    
--}}
{{-- sting name di sini mengambil name di halaman tag html x-pesan-validasi-satuan --}}
@error($name)

<div class="text-red-500 mt-2 text-sm">
    {{$message}}

</div>

@enderror