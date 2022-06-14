<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
<head>
    <meta charset="UTdiaF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lumint</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.css') }}">
    <style>
        body,
        p,
        ul {
            margin: 0;
            color: #333;
            font-family: "Poppins", sans-serif;
            font-size: 10pt;
            line-height: 1.3;
        }

        a {
            color: #d0002a;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        .pdf-invoice {
            position: relative;
            padding-bottom: 4cm;
        }

        @page {
            margin: 13mm;
            font-size: 12pt;
            size: A4;
            -webkit-print-color-adjust: exact;
        }

        .page {
            position: relative;
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            page-break-after: avoid;
            page-break-inside: avoid;
        }
    </style>
</head>

<body class="bg-gray-50">
<div class="page pdf-invoice p-10 bg-white">


    <div class="flex flex-row">
        <div class="font-bold text-gray-700 text-2xl">
            Facture #F-20220614
        </div>
        <div class="text-right ml-auto ">
            <img class="ml-auto w-10 h-10" alt="logo facture" src="https://web-id.fr/images/pattern/pattern-bg-icotype.svg">
            <div class="mt-2">
                <div class="text-lg font-semibold">
                    Web^ID
                </div>
                <div class="font-medium mt-1 text-sm">
                    hello@web-id.fr
                </div>
                <div class="font-medium text-sm">
                    07 61 38 20 28
                </div>
                <div class="font-medium text-sm">
                    88 Rue Saint Martin, 14000, Caen
                </div>
                <div class="font-medium text-sm">
                    123 568 941 00056
                </div>
            </div>
        </div>
    </div>


    <div class="w-1/2 mt-3">
        <div class="uppercase text-xl text-gray-700 font-bold">
            Facturé à :
        </div>
        <div class="mt-2">
            <table class="w-full">
                <tbody>
                <tr>
                    <td class="uppercase font-semibold text-gray-400 w-1/3">Client</td>
                    <td class="w-2/3 font-medium">Clément REPEL</td>
                </tr>
                <tr>
                    <td class="uppercase font-semibold text-gray-400 w-1/3">SIRET</td>
                    <td class="w-2/3 font-medium">123 568 941 00056</td>
                </tr>
                <tr>
                    <td class="uppercase font-semibold text-gray-400 w-1/3">Adresse</td>
                    <td class="w-2/3 font-medium">9 Rue Biquocet, 14000, Caen</td>
                </tr>
                <tr>
                    <td class="uppercase font-semibold text-gray-400 w-1/3">émis le</td>
                    <td class="w-2/3 font-medium">14/06/2022</td>
                </tr>
                <tr>
                    <td class="uppercase font-semibold text-gray-400 w-1/3">Validité</td>
                    <td class="w-2/3 font-medium">14/07/2022</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="flex flex-col mt-10">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 border-b">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Produit / Service
                    </th>
                    <th scope="col" class="px-6 py-3">
                        QTE
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Prix Unité HT
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total HT
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        Création d'une maquette de site e-commerce
                    </th>
                    <td class="px-6 py-4 text-right">
                        1
                    </td>
                    <td class="px-6 py-4 text-right">
                        550 €
                    </td>
                    <td class="px-6 py-4 text-right font-medium text-gray-900">
                        550 €
                    </td>
                </tr>
                </tbody>
            </table>
        </div>


        <div class="mt-8 text-right ml-auto w-auto px-6">
            <div class="flex justify-between mt-1">
                <div class="uppercase font-semibold text-gray-400">
                    Sous-Total
                </div>
                <div class="text-gray-900 font-semibold">
                    550 €
                </div>
            </div>
            <div class="flex justify-between mt-2">
                <div class="uppercase font-semibold text-gray-400">
                    Remise
                </div>
                <div class="text-gray-900 font-semibold">
                    5 %
                </div>
            </div>
            <div class="flex justify-between mt-2">
                <div class="uppercase font-semibold text-green-500">
                    Total HT
                </div>
                <div class="text-green-500 font-semibold">
                    500 €
                </div>
            </div>
            <p class="text-xs mt-2 text-gray-300 font-light italic">TVA non applicable art. 293b du CGI</p>
        </div>
    </div>

    <div class="flex flex-col text-left mr-auto mt-10">
        <div class="font-semibold text-lg text-gray-700 uppercase mb-2">
            Paiement
        </div>
        <div class="flex px-6">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                 width="38" height="38"
                 viewBox="0 0 48 48">
                <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                <path fill="#ff3d00"
                      d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
            </svg>

            <div class="text-sm ml-4 items-center font-medium flex text-gray-700">
                IBAN :
                <span class="font-semibold text-gray-900 ml-1">FR7612548029989876543210917</span>
            </div>

            <div class="text-sm ml-4 items-center font-medium flex text-gray-700">
                BIC :
                <span class="font-semibold text-gray-900 ml-1">CEPAFRPP</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col text-left mr-auto mt-10">
        <div class="font-semibold text-lg text-gray-700 uppercase mb-2">
            Conditions
        </div>
        <div class="flex px-6">
            <div class="text-sm items-center font-medium flex text-gray-700">
                Paiement comptant. Pas d'escompte pour réglement anticipé.<br>
                En cas de retard de paiement, indemnité forfaitaire légale pour frais de recouvrement : 40€.<br>
                Les prénalités de retard correspondent à : 0% du montant TTC.<br>
                Dispensé d'immatriculation au RCS et au répertoire des métiers.
            </div>
        </div>
    </div>
</div>
</body>
</html>
