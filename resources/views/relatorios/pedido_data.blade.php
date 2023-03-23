<html>

<head>

    <style>
        @media print {
            #noprint {
                display: none;
            }
        }

        html {
            height: 100%;
            width: 100%;
        }

        .header {
            text-align: center;
        }

        .content {
            text-align: right;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border-bottom: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            /* background-color: #dddddd; */
        }

        thead {
            background-color: #e5e8e8;
            border-top: 1px solid #c1bfbfdd;
            border-bottom: 1px solid #c1bfbfdd;
            font-family: ari;
        }

        tbody {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 13px;
        }

        tfoot {
            background-color: #e5e8e8;
        }

        .cab1 {

            width: 30%;
            display: inline-block;
            margin-right: 0vw;
            font-size: 3vw;
            padding: 5vw 0vw 5vw 0vw;
            min-width: 40vw;
            text-align: left;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
        }

        .cab2{

            width: 69%;
            display: inline-block;
            margin-right: 0vw;
            font-size: 3vw;
            padding: 0vw 0vw 0vw 0vw;
            min-width: 40vw;
            text-align: right;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-size: 12px;
        }

    </style>

</head>

<body>
    <div class="container">

        <div class="header">
            <h3>Relatório de pedidos por data</h3>

        </div>
        <div class="cab1">
            <p>FTNETGráficos</p>
        </div>
        <div class="cab2">
            <p> Periodo:
                {{ date('d/m/Y', strtotime($dt1)) }} a {{ date('d/m/Y', strtotime($dt2)) }}
            </p>
        </div>





        <div class="content">
            <table class="table table-striped">

                <?php $totalt = 0; ?>

                <thead>
                    <th>Nº</th>
                    <th>Data</th>
                    <th>Forma Pag.</th>
                    <th>Subtotal</th>
                    <th>Desconto</th>
                    <th>Total</th>
                </thead>

                <tbody>
                    @foreach ($pedidos as $pdds)
                        <tr>
                            <td>{{ $pdds->id }}</td>
                            <td>{{ date('d-m-Y', strtotime($pdds->data)) }}</td>
                            <td>{{ $pdds->forma_pagamento }}</td>
                            <td>R$ {{ number_format($pdds->subtotal, 2) }}</td>
                            <td>R$ {{ number_format($pdds->desconto, 2) }}</td>
                            <td>R$ {{ number_format($pdds->total, 2) }}</td>
                        </tr>

                        {{ $totalt += $pdds->total }}
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="text-algin: center;">Total:</td>
                        <td>R$ {{ number_format($totalt, 2) }}</td>
                    </tr>
                </tfoot>

            </table>
        </div>

    </div>

</body>

</html>
