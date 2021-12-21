<table>
    <thead>
    <tr>
        <th>Nama</th>
        <th>Satuan</th>
        <th>Merek</th>
        <th>Harga</th>

    </tr>
    </thead>
    <tbody>
    @foreach($barang as $b)<tr>
            <td>{{ $b['nama_barang'] }}</td>
            <td>{{ $b['nama_satuan'] }}</td>
            <td>{{ $b['nama_merek'] }}</td>
            <td>{{ $b['harga_barang'] }}</td>
        </tr>
    @endforeach
    </tbody>
</table>