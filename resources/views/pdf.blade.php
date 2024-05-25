<?php

$sum1=0;
$sum2=0;
$sum3=0;
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

function completarCincoDigitos($numero) {
    // Asegúrate de que el número se maneje como una cadena
    $numeroStr = strval($numero);
    
    // Utiliza str_pad para agregar ceros a la izquierda
    $numeroCompleto = str_pad($numeroStr, 5, '0', STR_PAD_LEFT);
    
    return $numeroCompleto;
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
    
    <table>
    <tr>
        <th>
            <center>
            <h1>{{ $record->gym->razonsocial }}</h1>
            <br>{{ $record->gym->direccion }}
            <br>{{ $record->gym->servicios }}
            </center>
        </th>
        <th>
            <center>
                TIMBRADO Nº {{ $record->datosfacturas->timbrado }} 
                <br>CODIGO CONTROL {{ $record->datosfacturas->codigocontrol }} 
                <br>INICIO DE VIGENCIA {{ $record->datosfacturas->vigencia }} 
                <br>RUC: {{ $record->gym->ruc }}
                <br> FACTURA VIRTUAL
                <br>{{ $record->datosfacturas->sucursal }} -{{ completarCincoDigitos($record->id) }}
            </center>
        </th>
    </tr>
    <tr>
        <th>
            FECHA DE EMISION:{{ $record->fecha}} 
        </th>
        <th>
            CONDICION DE VENTA:CONTADO X CREDITO
        </th>
    </tr>
    <tr>
        <th>
            RUC / CEDULA DE IDENTIDAD:{{ $record->clientes->id  }}
            <br>NOMBRE O RAZON SOCIAL: {{ $record->clientes->nombre_cliente  }} {{ $record->clientes->apellido_cliente }}
            <br>DIRECCION:  {{ $record->clientes->direccion  }}

        </th>
        <th>
            NUMERO DE NOTA DE REMISION:
            <br><br><br>
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
            @foreach($record->facturadets as $producto)
            <tr>
                <td>{{ $producto['cantidad'] }}</td>
                <td>{{ $producto['descripcion'] }}</td>
                <td>{{ $producto['precio'] }}</td>
                <td>
                    @if($producto['impuestos_id'] == 1)
                        {{ $producto['precio'] * $producto['cantidad'] }}
                    @endif
                </td>
                <td>
                    @if($producto['impuestos_id'] == 2)
                        {{ $producto['precio'] * $producto['cantidad'] }}
                    @endif
                </td>
                <td>
                    @if($producto['impuestos_id'] == 3)
                        {{ $producto['precio'] * $producto['cantidad'] }}
                    @endif
                </td>
            </tr>
        @endforeach
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
            <tr>
                <td></td><td></td><td></td><td></td><td></td><td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
        <tr>
            <td rowspan="4">
                <img src="data:image/png;base64,{!! base64_encode(QrCode::generate('CED08B6|13824055|001-001-0000001|5790779|'.$record->valorFactura)) !!}" />
                {!! QrCode::generate('Transfórmame en un QrCode!'); !!}
            </td>
            <td>Total Parcial</td>
            
            @foreach($record->facturadets as $producto)
            
                <td>
                    @if($producto['impuestos_id'] == 1)
                        {{$sum1+= $producto['precio'] * $producto['cantidad'] }}
                    @endif
                </td>
                <td>
                    @if($producto['impuestos_id'] == 2)
                        {{$sum2+= $producto['precio'] * $producto['cantidad'] }}
                    @endif
                </td>
                <td>
                    @if($producto['impuestos_id'] == 3)
                        {{$sum3+= $producto['precio'] * $producto['cantidad'] }}
                    @endif
                </td>
        @endforeach
        </tr>
        <tr>
            <td colspan="3">Total a Pagar: {{ numeroALetras($record->valorFactura) }} Guaranies.</td>
            <td>{{ $record->valorFactura }}</td>
        </tr>
        <tr>
            <td>Liquidacion de IVA</td>
            <td>(5%) <br> {{$sum2/21 }}</td>
            <td>(10%) <br> {{$sum3/11 }}</td>
            <td>(total)<br>{{ $sum3/11+$sum2/11}}</td>
        </tr>
        <tr>
            <td colspan="4"></td>
        </tr>
    </tbody>

    </table>

</body>
