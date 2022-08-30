<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="margin-top: 100px;">
        <tr>
            <td style="padding-bottom: 20px;"><span style="margin-left: 200px;">{{ $nasabah->rekening }}</span></td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px;"><span style="margin-left: 200px;">{{ $nasabah->nama_lengkap }}</span></td>
        </tr>
        <tr>
            <td style="padding-bottom: 20px;"><span style="margin-left: 200px;">{{ $nasabah->alamat }}</span></td>
        </tr>
            <td style="padding-bottom: 20px;"><span style="margin-left: 200px;">BANK MINI SURYA "BAHAGIA"</span></td>
        </tr>
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
