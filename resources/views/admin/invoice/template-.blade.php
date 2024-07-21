<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .first-border {
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
        }

        .main {
            /* margin: 20px 20px 20px 0px; */
            border: 1px solid gray;
            position: relative;
            height: auto;
            min-height: 200px;
            width: 8.5in;
            /* Letter size */
            margin: 0 auto;
            /* padding: 20px; */
        }

        .left-deco-wrapper {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .lines {
            width: 50px;
        }

        .line {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            border-left: 1px solid #f89d4a;
            position: absolute;
            left: 0px;
            height: 100%;
        }

        .left-text {
            position: absolute;
            /* Position relative to the container */
            top: 50%;
            /* Move the element 50% down from the top */
            transform: translateY(-50%);
        }

        .left-text h1 {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
            margin-top: 50%;
            margin-left: 4px;
        }

        .left-text h1 {
            color: #2f3192;
        }

        .main-content {
            margin-left: 50px;
            padding: 20px
        }

        .row {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* Three columns with equal width */
            grid-gap: 10px;
            /* Adjust the gap between columns */
        }

        .column {
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        .descripton h1 {
            letter-spacing: 10px;
            color: #004eed;
        }

        .descripton .brief {
            margin-top: -15px;
            color: #ee2732;
            font-weight: bold;
            font-size: 17px;
        }

        .descripton .address {
            margin-top: -15px;
            color: #004eed;
            text-decoration: underline;
            font-weight: bold;
            font-size: 17px;
        }

        .product-condition h2 {
            color: #ee2732;
        }

        .conditions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin-bottom: 5px;
        }

        .conditions .square-container {
            display: flex;
            justify-content: center;
            align-items: center;
            color: #ee2732;
            font-weight: bold;
            font-size: 19px;
        }

        .conditions .square {
            padding: 5px;
            border: 2px solid black;
            width: 10px;
            height: 10px;
            display: inline-block;
            margin-right: 5px;
        }

        .name-row {
            display: flex;
        }

        .column-75 {
            flex: 0 0 70%;
        }

        .column-25 {
            flex: 0 0 30%;
        }

        .name-column h2 {
            color: #004eed;
        }

        .date-column h2 {
            color: #004eed;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        thead th {
            background-color: #ee2732;
            color: white;
            font-weight: bold;
            text-align: center;
            font-size: 15px;
        }

        tfoot td {
            background-color: #ee2732;
            color: white;
            font-weight: bold;
        }

        tfoot td:first-child {
            text-align: right;
        }

        tbody td {
            font-size: 14px;
            font-weight: bold;
        }

        tbody td:first-child,
        tfoot td:first-child {
            text-align: center;

        }

        .table-div::before {
            content: '';
            position: absolute;
            top: 20%;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('assests/img/logo.png') }}") center center no-repeat;
            background-size: 300px auto;
            opacity: 0.5;
            z-index: -1;
        }

        .total-amount {
            background-color: white;
            color: #000;
            width: 100%;
            display: block;
            text-center;
            font-size: 20px;
        }

        .total {
            font-size: 20px;
        }

        .numbers {
            color: #ee2732;
            font-size: 15px;
        }

        .bottom-wraper {
            position: relative;
        }

        .bottom-row {
            display: flex;
            position: absolute;
            top: -48px;
        }

        .bottom-column {
            width: 120px;
            color: #000;
            text-align: center;
        }

        .social-icons {
            display: flex;
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
    </style>
</head>

<body>
    <div class="first-border">
        <div class="main">
            <div class="left-deco-wrapper">
                <div class="lines">
                    <div class="line"></div>
                    <div class="line" style="left:3px;"></div>
                    <div class="line" style="left:6px;"></div>
                    <div class="line" style="left:9px;"></div>
                    <div class="line" style="left:12px;"></div>
                    <div class="line" style="left:15px;"></div>
                    <div class="line" style="left:18px;"></div>
                    <div class="line" style="left:21px;"></div>
                    <div class="line" style="left:24px;"></div>
                    <div class="line" style="left:27px;"></div>
                    <div class="line" style="left:30px;"></div>
                    <div class="line" style="left:33px;"></div>
                    <div class="line" style="left:36px;"></div>
                    <div class="line" style="left:39px;"></div>
                    <div class="line" style="left:42px;"></div>
                    <div class="line" style="left:45px;"></div>
                </div>
                <div class="left-text">
                    <h1>FACTURE BARRY STORE</h1>
                </div>
            </div>
            <div class="main-content">
                <div class="header row">
                    <div class="column logo text-center">
                        {{-- <img src="{{ public_path('assests/img/logo.png') }}" alt="" width="200px"> --}}
                    </div>
                    <div class="column text-center descripton">
                        <h1>FACTURE</h1>
                        <p class="brief">D’AUTOMOBILES ET PIÈCES DÉTACHÉES VENTE DE MATERIELS TÉLÉCOMMUNICATION LOGO,
                            SITE WEB,
                            LOGICIELS, SCRIPT, (TELEPHONE, ORDINATEURS ACCESSOIRES)</p>
                        <p class="address">NINEA : 008713481 RCCM : SN.DKR.2021.A.23727</p>
                    </div>
                    <div class="column text-center product-condition">
                        <h2>ETAT DU PRODUIT</h2>
                        <div class="conditions">
                            <div class="square-container"><span class="square"
                                    @if ($data['product_condition'] == 'NEUF') style="background-color:black;" @endif></span>
                                NEUF</div>
                            <div class="square-container"><span class="square"
                                    @if ($data['product_condition'] == 'VRAC') style="background-color:black;" @endif></span>
                                VRAC</div>
                        </div>
                        <div class="conditions">
                            <div class="square-container"><span class="square"
                                    @if ($data['product_condition'] == 'DESCELLER') style="background-color:black;" @endif></span>
                                DESCELLER</div>
                            <div class="square-container"><span class="square"
                                    @if ($data['product_condition'] == 'VENANT') style="background-color:black;" @endif></span>
                                VENANT</div>
                        </div>
                    </div>
                </div>
                <div class="name-row">
                    <div class="column-75 name-column">
                        <h2>Facture de M/Mme: {{ $data['customer_name'] }}</h2>
                    </div>
                    <div class="column-25 date-column">
                        <h2>Date N°: {{ $data['date'] }}</h2>
                    </div>
                </div>

                <div class="table-div">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>DESIGNATION</th>
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
                                    <td class="">{{ $item['designation'] }}</td>
                                    <td class="text-center">{{ $item['qty'] }}</td>
                                    <td class="text-center"> {{ $item['puht'] }}</td>
                                    <td class="text-center">{{ $item['total_ht'] }}</td>
                                </tr>
                                @php $count++ @endphp
                            @endforeach
                            @for ($i = 0; $i < 1; $i++)
                                <tr>
                                    <td class="numbers">1</td>
                                    <td class="">Example</td>
                                    <td class="text-center">5</td>
                                    <td class="text-center"> 10</td>
                                    <td class="text-center">50</td>
                                </tr>
                            @endfor
                            <!-- Add more rows as needed -->
                        </tbody>
                        <tfoot>
                            <tr>
                                <td style="background: white; border:none;" colspan="2">

                                </td>
                                <td colspan="2" class="text-center total">TOTAL</td>
                                <td class="text-center"> <span class="total-amount">{{ $data['total_amount'] }}</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="bottom-wraper">
                        <div class="bottom-row">
                            <div class="bottom-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0" />
                                </svg>
                                <br>
                                <span style="font-size: 12px; font-weight:bold">+221777396331</span>
                            </div>
                            <div class="bottom-column">
                                {{-- <img src="{{ asset('assests/img/qr.png') }}" alt="" width="40px"> --}}
                            </div>
                            <div class="bottom-column">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                                </svg>
                                <br>
                                <span style="font-size: 12px; font-weight:bold">WORLDWIDE</span>
                            </div>
                            <div class="bottom-column">
                                {{-- <div class="social-icons">
                                    <a href="#" class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path
                                                d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                        </svg>
                                    </a>
                                    <a href="#" class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951" />
                                        </svg>
                                    </a>
                                    <a href="#" class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                            <path
                                                d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z" />
                                        </svg>
                                    </a>
                                    <a href="#" class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-snapchat" viewBox="0 0 16 16">
                                            <path
                                                d="M15.943 11.526c-.111-.303-.323-.465-.564-.599a1 1 0 0 0-.123-.064l-.219-.111c-.752-.399-1.339-.902-1.746-1.498a3.4 3.4 0 0 1-.3-.531c-.034-.1-.032-.156-.008-.207a.3.3 0 0 1 .097-.1c.129-.086.262-.173.352-.231.162-.104.289-.187.371-.245.309-.216.525-.446.66-.702a1.4 1.4 0 0 0 .069-1.16c-.205-.538-.713-.872-1.329-.872a1.8 1.8 0 0 0-.487.065c.006-.368-.002-.757-.035-1.139-.116-1.344-.587-2.048-1.077-2.61a4.3 4.3 0 0 0-1.095-.881C9.764.216 8.92 0 7.999 0s-1.76.216-2.505.641c-.412.232-.782.53-1.097.883-.49.562-.96 1.267-1.077 2.61-.033.382-.04.772-.036 1.138a1.8 1.8 0 0 0-.487-.065c-.615 0-1.124.335-1.328.873a1.4 1.4 0 0 0 .067 1.161c.136.256.352.486.66.701.082.058.21.14.371.246l.339.221a.4.4 0 0 1 .109.11c.026.053.027.11-.012.217a3.4 3.4 0 0 1-.295.52c-.398.583-.968 1.077-1.696 1.472-.385.204-.786.34-.955.8-.128.348-.044.743.28 1.075q.18.189.409.31a4.4 4.4 0 0 0 1 .4.7.7 0 0 1 .202.09c.118.104.102.26.259.488q.12.178.296.3c.33.229.701.243 1.095.258.355.014.758.03 1.217.18.19.064.389.186.618.328.55.338 1.305.802 2.566.802 1.262 0 2.02-.466 2.576-.806.227-.14.424-.26.609-.321.46-.152.863-.168 1.218-.181.393-.015.764-.03 1.095-.258a1.14 1.14 0 0 0 .336-.368c.114-.192.11-.327.217-.42a.6.6 0 0 1 .19-.087 4.5 4.5 0 0 0 1.014-.404c.16-.087.306-.2.429-.336l.004-.005c.304-.325.38-.709.256-1.047m-1.121.602c-.684.378-1.139.337-1.493.565-.3.193-.122.61-.34.76-.269.186-1.061-.012-2.085.326-.845.279-1.384 1.082-2.903 1.082s-2.045-.801-2.904-1.084c-1.022-.338-1.816-.14-2.084-.325-.218-.15-.041-.568-.341-.761-.354-.228-.809-.187-1.492-.563-.436-.24-.189-.39-.044-.46 2.478-1.199 2.873-3.05 2.89-3.188.022-.166.045-.297-.138-.466-.177-.164-.962-.65-1.18-.802-.36-.252-.52-.503-.402-.812.082-.214.281-.295.49-.295a1 1 0 0 1 .197.022c.396.086.78.285 1.002.338q.04.01.082.011c.118 0 .16-.06.152-.195-.026-.433-.087-1.277-.019-2.066.094-1.084.444-1.622.859-2.097.2-.229 1.137-1.22 2.93-1.22 1.792 0 2.732.987 2.931 1.215.416.475.766 1.013.859 2.098.068.788.009 1.632-.019 2.065-.01.142.034.195.152.195a.4.4 0 0 0 .082-.01c.222-.054.607-.253 1.002-.338a1 1 0 0 1 .197-.023c.21 0 .409.082.49.295.117.309-.04.56-.401.812-.218.152-1.003.638-1.18.802-.184.169-.16.3-.139.466.018.14.413 1.991 2.89 3.189.147.073.394.222-.041.464" />
                                        </svg>
                                    </a>
                                </div> --}}
                                <span style="font-size: 12px; font-weight:bold">BARRY STORE</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
