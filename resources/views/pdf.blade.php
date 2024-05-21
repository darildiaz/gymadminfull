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

// Ejemplo de uso
$numero = 1234567;
echo numeroALetras($numero); // "un millón doscientos treinta y cuatro mil quinientos sesenta y siete"

?>
<div>fecha: {{ $record->fecha }}</div>
<head>
    <title>Factura</title>
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
    <div>
        <h1>Factura {{ $record->id }}</h1>
        <p>Nombre: {{ $record->clientes->nombre_cliente  }} {{ $record->clientes->apellido_cliente }}</p>
        <p>RUC: {{ $record->id }}</p>
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
            <br>001-001-0000 {{ $record->id }}
        </th>
        <th>
            FECHA DE EMISION:10/05/2023
        </th>
        <th>
            CONDICION DE VENTA:CONTADOXCREDITO
        </th>
    </table>
    <table>
        <thead>
            
            <tr>
                <th>producto</th>
                <th>cantidad</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            @foreach($record->ventadets as $producto)
            <tr>
                <td>{{ $producto['producto.nombre'] }}</td>
                <td>{{ $producto['cantidad'] }}</td>
                <td>{{ $producto['precio'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total-table">
        <table>
            <tr>
                <th>Total</th>
                <td>{{ $record->total }}</td>
            </tr>
            <tr>
                <th>Total Escrito</th>
                <td>{{ numeroALetras($record->total) }}</td>
            </tr>
            <tr>
                <th>IVA</th>
                <td>{{ $record->descuento}}</td>
            </tr>
        </table>
    </div>
</body>