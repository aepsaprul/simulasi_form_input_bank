<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table style="margin-top: 100px; width: 100%;">
        @foreach ($data as $key => $item)
            @if ($key + 1 >= $baris)
                <tr>
                    <td>{{ $item->created_at->format('d-m-Y') }}</td>
                    <td>{{ $item->sandi }}</td>
                    <td style="text-align: right;">
                        @if ($item->keluar)
                            @rupiah($item->keluar)
                        @else
                            -
                        @endif
                    </td>
                    <td style="text-align: right;">
                        @if ($item->masuk)
                            @rupiah($item->masuk)
                        @else
                            -
                        @endif
                    </td>
                    <td style="text-align: right;">@rupiah($item->saldo)</td>
                    <td style="text-align: center;">K{{ Auth::user()->siswa_id }}</td>
                </tr>
            @endif
        @endforeach
    </table>

    <script>
        window.print();
    </script>
</body>
</html>
