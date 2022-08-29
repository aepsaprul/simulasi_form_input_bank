<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1" style="margin-top: 100px; width: 100%;">
        @foreach ($transaksis as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nasabah->nama_lengkap }}</td>
                <td>{{ $item->sandi }}</td>
                <td>{{ $item->keluar }}</td>
                <td>{{ $item->masuk }}</td>
                <td>{{ $item->saldo }}</td>
                <td>K{{ $item->nasabah->id }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
