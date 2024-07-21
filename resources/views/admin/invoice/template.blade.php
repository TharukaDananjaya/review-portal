<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <title>Invoice</title>
    <style>
        /* @font-face {
            font-family: 'BBigerOver';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("{{ public_path('assests/fonts/bBigerOver.ttf') }}") format('truetype');
        } */

        body {
            font-family: Arial, sans-serif;
            margin: 1px;
            padding: 0;
        }


        .container {
            width: 10.8in;
            /* Letter size */
            overflow: hidden;
            margin: 0 auto;
            padding: 0;
            /* 0.5 inch padding */
        }

        .invoice {
            border: 1px solid #000;
            padding: 0.2in;
        }

        .column {
            width: 3.6in;
        }

        .text-center {
            text-align: center;
        }

        .descripton h1 {
            letter-spacing: 10px;
            color: #1d78bc;
            margin-top: 0;
        }

        .descripton .brief {
            margin-top: -15px;
            color: #fe904c;
            font-weight: bold;
            font-size: 15px;
        }

        .descripton .address {
            margin-top: -15px;
            color: #1d78bc;
            text-decoration: underline;
            font-weight: bold;
            font-size: 14px;
        }

        .product-condition h2 {
            color: #fe904c;
            margin-top: -10px;
        }

        /* .conditions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 5px;
        } */

        .conditions .square-container {
            justify-content: center;
            align-items: center;
            color: #fe904c;
            font-weight: bold;
            font-size: 17px;
        }

        .conditions .square {
            padding: 5px;
            border: 2px solid black;
            width: 5px;
            height: 5px;
            display: inline-block;
            margin-right: 0px;
            margin-bottom: -3px;
        }

        .column-75 {
            width: 7.2in;
        }

        .column-25 {
            width: 3.6in;
        }

        .name-column h2 {
            color: #1d78bc;
            display: flex;
            font-size: 17pt;
        }

        .name-column .underline {
            border-bottom: 1px solid #ffb218;
            width: 4in;
            display: inline-block;
            color: #000;
            font-weight: normal;
            padding: 0;
            margin: 3px 0px 0px 0px;
        }

        .date-column h2 {
            color: #1d78bc;
            display: flex;
            font-size: 17pt;
        }

        .date-column .underline {
            border-bottom: 1px solid #ffb218;
            width: 2in;
            display: inline-block;
            color: #000;
            font-weight: normal;
            padding: 0;
            margin: 3px 0px 0px 0px;
        }

        .table-div table {
            width: 100%;
            border-collapse: collapse;
        }

        .table-div th,
        .table-div td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .table-div thead th {
            background-color: #fe904c;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
        }

        .table-div tfoot td {
            background-color: #fe904c;
            color: white;
            font-weight: bold;
            font-size: 30px;
        }

        .table-div tfoot td:first-child {
            text-align: right;
        }

        .table-div tbody td {
            font-size: 16px;
            font-weight: bold;
        }

        .table-div tbody td:first-child,
        .table-div tfoot td:first-child {
            text-align: center;

        }

        /* .table-div::before {
            content: '';
            position: absolute;
            top: 15%;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ public_path('assests/img/BARRY.png') }}") center center no-repeat;
            background-size: 300px auto;
            opacity: 0.5;
            z-index: -1;
        } */

        .numbers {
            color: #fe904c;
            font-size: 25px !important;
        }

        .bottom-row tbody tr {
            padding: 0;
        }

        .bottom-row tbody td {
            font-size: 15px;
            color: #000;
            background-color: white;
            border: none;
            padding: 0;
        }

        .social-icons {
            padding: 0px 10px 0px 10px;
            border-radius: 5px;
        }

        .icon {
            color: white;
            margin-right: 2px;
            text-decoration: none;
            background-color: black;
            border-radius: 50%;
            width: 16px;
            height: 16px;
            padding: 4px;
        }

        .icon:last-child {
            margin-right: 0;
        }

        .tick {
            width: 5px;
            height: 5px;
            position: relative;
            display: inline-block;
            /* Ensures inline behavior */
            border: 2px solid #333;
            padding: 5px;
            margin-right: 0px;
            margin-bottom: -3px;
        }

        .tick::before,
        .tick::after {
            content: '';
            position: absolute;
            background-color: #333;
        }

        .tick::before {
            width: 3px;
            height: 9px;
            top: 6px;
            left: 3px;
            transform: rotate(-50deg);
        }

        .tick::after {
            width: 15px;
            height: 3px;
            top: 6px;
            left: 3px;
            transform: rotate(-60deg);
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="invoice">
            <div class="invoice-header">
                <table>
                    <tbody>
                        <td>
                            <div class="column text-center">
                                <img src="{{ public_path('assests/img/BARRY.png') }}" alt="" width="250px">
                            </div>
                        </td>
                        <td>
                            <div class="column text-center descripton">
                                <h1 style="font-family: 'Black Ops One', system-ui">FACTURE</h1>
                                <p class="brief">D’AUTOMOBILES ET PIÈCES DÉTACHÉES VENTE DE MATERIELS TÉLÉCOMMUNICATION
                                    LOGO,
                                    SITE WEB,
                                    LOGICIELS, SCRIPT, (TELEPHONE, ORDINATEURS ACCESSOIRES)</p>
                                <p class="address">NINEA : 008713481 RCCM : SN.DKR.2021.A.23727</p>
                            </div>
                        </td>
                        <td>
                            <div class="column text-center product-condition">
                                <h2>ETAT DU PRODUIT</h2>
                                <table style="margin: 0 auto;">
                                    <tbody>
                                        <tr class="conditions">
                                            <td class="square-container">
                                                @if ($data['product_condition'] == 'NEUF')
                                                    <span class="tick"></span>
                                                @else
                                                    <span class="square"></span>
                                                @endif
                                                NEUF
                                            </td>
                                            <td class="square-container">
                                                @if ($data['product_condition'] == 'VRAC')
                                                    <span class="tick"></span>
                                                @else
                                                    <span class="square"></span>
                                                @endif
                                                VRAC
                                            </td>

                                        </tr>
                                        <tr class="conditions">
                                            <td class="square-container">
                                                @if ($data['product_condition'] == 'DESCELLER')
                                                    <span class="tick"></span>
                                                @else
                                                    <span class="square"></span>
                                                @endif
                                                DESCELLER
                                            </td>
                                            <td class="square-container">
                                                @if ($data['product_condition'] == 'VENANT')
                                                    <span class="tick"></span>
                                                @else
                                                    <span class="square"></span>
                                                @endif
                                                VENANT
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div class="column-75 name-column">
                                    <h2>Facture de M/Mme: {{ $data['customer_name'] }}
                                    </h2>
                                </div>
                            </td>
                            <td>
                                <div class="column-25 date-column">
                                    <h2>Date N°: {{ $data['date'] }}</h2>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="table-div">
                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th style="width: 4in;">DESIGNATION</th>
                            <th>QUANTITE</th>
                            <th>PU HT</th>
                            <th>TOTAL HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1 @endphp
                        @foreach ($data['products'] as $item)
                            <tr>
                                <td class="numbers">{{ $count }}</td>
                                <td class="">{{ $item['designation'] }} @if (isset($item['notes']) && $item['notes'] != null)
                                        <br> <span style="font-size: 10pt;">{{ $item['notes'] }}</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item['qty'] }}</td>
                                <td class="text-center">
                                    @if ($item['total_ht'] > 0)
                                        {{ number_format($item['puht'], 3) }} {{ $data['currency'] }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($item['total_ht'] > 0)
                                        {{ number_format($item['total_ht'], 3) }} {{ $data['currency'] }}
                                    @endif
                                </td>
                            </tr>

                            @php $count++ @endphp
                        @endforeach
                        {{-- @for ($i = 0; $i < 1; $i++)
                            <tr>
                                <td class="numbers">1</td>
                                <td class="">Example</td>
                                <td class="text-center">5</td>
                                <td class="text-center"> 10</td>
                                <td class="text-center">50</td>
                            </tr>
                        @endfor --}}
                        <!-- Add more rows as needed -->
                    </tbody>
                    <tfoot>
                        <tr>
                            <td style="background: white; border:none;" colspan="2">
                                {{-- <table class="bottom-row text-center" style="margin: 0 auto;">
                                    <tbody>
                                        <tr>
                                            <td><img src="{{ public_path('assests/img/phone.png') }}" alt=""
                                                    width="20px">
                                                <br>
                                                +221777396331
                                            </td>
                                            <td>
                                                <img src="{{ public_path('assests/img/qr.png') }}" alt=""
                                                    width="35px">

                                            </td>
                                            <td>
                                                <img src="{{ public_path('assests/img/map.png') }}" alt=""
                                                    width="20px">
                                                <br>
                                                WORLDWIDE
                                            </td>
                                            <td style="margin: 0 auto;">
                                                <div class="social-icons">
                                                    <img src="{{ public_path('assests/img/facebook.png') }}"
                                                        alt="" width="" class="icon" />
                                                    <img src="{{ public_path('assests/img/insta.png') }}"
                                                        alt="" width="" class="icon" />
                                                    <img src="{{ public_path('assests/img/tiktok.png') }}"
                                                        alt="" width="" class="icon" />
                                                    <img src="{{ public_path('assests/img/facebook.png') }}"
                                                        alt="" width="" class="icon" />
                                                </div>
                                                <span style="font-size: 12px; font-weight:bold">BARRY STORE</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> --}}
                            <img src="{{ public_path('assests/img/Social networks.png') }}" alt="footer image" width="100%" height="57px">
                           </td>
                            <td colspan="2" class="text-center total">TOTAL</td>
                            <td class="text-center"> <span
                                    class="total-amount">{{ number_format($data['total_amount'], 3) }}
                                    {{ $data['currency'] }}</span>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
