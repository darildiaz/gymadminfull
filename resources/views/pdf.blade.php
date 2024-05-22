<?php

function numeroALetras($num)
{
    $numero= number_format($num, 2, '.', '');
    $unidades = ['', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
    $decenas = ['', 'diez', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];
    $centenas = ['', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos'];

    $especiales = [11 => 'once', 12 => 'doce', 13 => 'trece', 14 => 'catorce', 15 => 'quince', 20 => 'veinti', 21 => 'veintiuno', 22 => 'veintidos', 23 => 'veintitres', 24 => 'veinticuatro', 25 => 'veinticinco', 26 => 'veintiseis', 27 => 'veintisiete', 28 => 'veintiocho', 29 => 'veintinueve'];

    if ($numero == 0) {
        return 'cero';
    }

    if ($numero < 10) {
        return $unidades[$numero];
    }

    if ($numero >= 11 && $numero <= 29) {
        return $especiales[$numero];
    }

    if ($numero >= 10 && $numero < 100) {
        $decena = floor($numero / 10);
        $unidad = $numero % 10;
        return $decenas[$decena] . ($unidad > 0 ? ' y ' . $unidades[$unidad] : '');
    }

    if ($numero == 100) {
        return 'cien';
    }

    if ($numero >= 101 && $numero < 1000) {
        $centena = floor($numero / 100);
        $resto = $numero % 100;
        return $centenas[$centena] . ($resto > 0 ? ' ' . numeroALetras($resto) : '');
    }

    if ($numero >= 1000 && $numero < 1000000) {
        $mil = floor($numero / 1000);
        $resto = $numero % 1000;
        if ($mil == 1) {
            return 'mil' . ($resto > 0 ? ' ' . numeroALetras($resto) : '');
        }
        return numeroALetras($mil) . ' mil' . ($resto > 0 ? ' ' . numeroALetras($resto) : '');
    }

    if ($numero >= 1000000) {
        $millon = floor($numero / 1000000);
        $resto = $numero % 1000000;
        if ($millon == 1) {
            return 'un millón' . ($resto > 0 ? ' ' . numeroALetras($resto) : '');
        }
        return numeroALetras($millon) . ' millones' . ($resto > 0 ? ' ' . numeroALetras($resto) : '');
    }

    return '';
}


?>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        .total-table {
            margin-top: 20px;
            float: right;
        }
    </style>
</head>
<body>
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate('Request::url()'); !!}
        <p>Escanéame para volver a la página principal.</p>
    </div>
    <table>
    <tr>
        <th><h1>Lopez Sa</h1>
            <br>direccion
            <br>servicions
        </th>
        <th>
            TIMBRADO Nº 13824055
            <br>CODIGO CONTROL 8CED08B6
            <br>INICIO DE VIGENCIA 16/12/2019
            <br>RUC 5790779-0
            <br> <h1>FACTURA VIRTUAL</h1>
            <br>001-001-0000{{ $record->id }}
        </th>
    </tr>
    <tr>
        <th>
            FECHA DE EMISION:10/05/2023
        </th>
        <th>
            CONDICION DE VENTA:CONTADO X CREDITO
        </th>
    </tr>
    <tr>
        <th>
            RUC / CEDULA DE IDENTIDAD:{{ $record->clientes->id  }}
            <br>NOMBRE O RAZON SOCIAL: {{ $record->clientes->nombre_cliente  }} {{ $record->clientes->apellido_cliente }}
            <br>DIRECCION:

        </th>
        <th>
            NUMERO DE NOTA DE REMISION
        </th>
    </tr>

    </table>
    <table>
        <thead>

            <tr>
                <th rowspan="2">Cantidad</th>
                <th  rowspan="2">Descripcion</th>
                <th  rowspan="2">Precio Unitario</th>
                <th colspan="3"><center> Impuestos</center></th>
            </tr>
            <tr>
                <th>Exentas</th>
                <th>IVA 5%</th>
                <th>IVA 10%</th>

            </tr>
        </thead>
        <tbody>
            @foreach($record->ventadets as $producto)
            <tr>
                <td>{{ $producto['cantidad'] }}</td>
                <td>{{ $producto->productos->nombre }}</td>
                <td>{{ $producto['precio'] }}</td>
                <td></td>
                <td></td>
                <td>{{ $producto['precio'] * $producto['cantidad']}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
        <tr>
            <td rowspan="4">

                {!! QrCode::generate('Transfórmame en un QrCode!'); !!}
            </td>
            <td>Total Parcial</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
        </tr>
        <tr>
            <td colspan="3">Total a Pagar: {{ numeroALetras($record->total) }} Guaranies.</td>
            <td>{{ $record->total }}</td>
        </tr>
        <tr>
            <td>Liquidacion de IVA</td>
            <td>(5%) <br> 0</td>
            <td>(10%) <br> {{ $record->total /11}}</td>
            <td>(total)<br>{{ $record->total /11}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </tbody>

    </table>

</body>
