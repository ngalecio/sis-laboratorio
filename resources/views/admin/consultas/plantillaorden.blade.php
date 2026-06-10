<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 10px;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #888;
            padding: 3px 4px;
            font-size: 9px;
            word-break: break-word;
        }
        th {
            background: #e7e7e7;
            font-weight: bold;
            text-align: left;
        }
        .footer {
            font-size: 8px;
            color: #666;
            text-align: center;
            margin-top: 10px;
        }
    </style>
    <title>Orden</title>
</head>
<body>
    <div class="container">
        <!-- CABECERA DE ORDEN -->
        <table>
            <tr>
                <th colspan="6" style="text-align:center; background:#fff;">
                    <span style="font-size:18px; font-weight:bold; color:#2d2d2d; letter-spacing:2px; text-transform:uppercase;">
                        {{ $ajuste->nombre ?? 'Nombre de la Empresa' }}
                    </span><br>
                    <span style="font-size:10px; color:#555; margin-top:5px;">
                        {{ $ajuste->descripcion ?? 'Sistema de Gestion' }}
                    </span>
                </th>
            </tr>
            <tr>
                <td colspan="3"><strong>Orden N°:</strong> {{ $consulta->id ?? '-' }}</td>
                <td colspan="3"><strong>Fecha:</strong> {{ $consulta->fecha ? \Carbon\Carbon::parse($consulta->fecha)->format('d/m/Y') : '-' }}</td>
            </tr>
            <tr>
                <td colspan="3"><strong>Cliente:</strong> {{ $consulta->paciente->nombres ?? '-' }} {{ $consulta->paciente->apellidos ?? '' }}</td>
                <td colspan="3"><strong>Cédula:</strong> {{ $consulta->paciente->cedula ?? '-' }}</td>
            </tr>
            <tr>
                <td colspan="3"><strong>Dirección:</strong> {{ $consulta->paciente->direccion ?? '-' }}</td>
                <td colspan="3"><strong>Teléfono:</strong> {{ $consulta->paciente->telefono ?? '-' }}</td>
            </tr>
        </table>
        <!-- DETALLE DE ORDEN -->
        <table>
            <thead>
                <tr>
                    <th style="width:5%;">#</th>
                    <th style="width:40%;">Descripción</th>
                    <th style="width:15%;">Cantidad</th>
                    <th style="width:10%;">Precio Unitario</th>
                    <th style="width:10%;">Subtotal</th>
                    <th style="width:10%;">IVA</th>
                    <th style="width:10%;">Total</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach($consulta->detalles as $detalle)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $detalle->producto->nombre ?? '-' }}</td>
                    <td style="text-align:right;">{{ number_format($detalle->cantidad, 2) }}</td>
                    <td style="text-align:right;">{{ number_format($detalle->precio, 2) }}</td>
                    <td style="text-align:right;">{{ number_format($detalle->subtotal, 2) }}</td>
                    <td style="text-align:right;">{{ number_format($detalle->iva, 2) }}</td>
                    <td style="text-align:right;">{{ number_format($detalle->total, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <!-- <tfoot>
                <tr>
                    <th colspan="6" style="text-align:right;">Subtotal</th>
                    <td style="text-align:right; font-weight:bold;">{{ number_format($consulta->valor_subtotal, 2) }}</td>
                </tr>
                <tr>
                    <th colspan="6" style="text-align:right;">IVA</th>
                    <td style="text-align:right; font-weight:bold;">{{ number_format($consulta->valor_iva, 2) }}</td>
                </tr>
                <tr>
                    <th colspan="6" style="text-align:right;">Total</th>
                    <td style="text-align:right; font-weight:bold;">{{ number_format($consulta->valor_total, 2) }}</td>
                </tr> -->
            </tfoot>
        </table>
        <!-- PIE DE PÁGINA -->
        <div class="footer">
            <div class="footer-info">
                Este documento es confidencial y contiene información protegida.<br>
                Su uso está limitado exclusivamente al personal autorizado.
            </div>
            <div class="footer-date">
                Documento generado el {{ now()->format('d/m/Y') }} a las {{ now()->format('H:i:s') }}
            </div>
        </div>
    </div>
    <script type="text/php">
        if (isset($pdf)) {
            $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
            $font = $fontMetrics->getFont("DejaVu Sans");
            $size = 9;
            $color = array(0.5, 0.5, 0.5);
            $pdf->page_text(720, 565, $text, $font, $size, $color);
            $pdf->page_text(30, 565, "Orden de Consulta", $font, $size, $color);
        }
    </script>
</body>
</html>
