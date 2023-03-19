<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $estimate->estimateId . ' - ' . $client->firstname . ' ' . $client->lastname }}</title>
    <style>
        {!! file_get_contents(resource_path('views/invoice/invoice.css')) !!}
    </style>
</head>

<body class="bg-gray-50">
<div class="pdf invoice p-10 bg-white">
    <div class="flex flex-row">
        <div class="font-bold text-gray-700 text-2xl">
            {{ $estimate->estimateId }}
        </div>
        <div class="text-right ml-auto ">
            <img class="ml-auto h-12" alt="logo facture"
                 src="{{asset('assets/img/logo_navbar.png')}}">
            <div class="mt-2">
                <div class="text-lg font-semibold">
                    {{ $editor->company_name }}
                </div>
                <div class="font-medium mt-1 text-sm">
                    {{ $editor->company_email }}
                </div>
                <div class="font-medium text-sm">
                    {{ $editor->company_phone }}
                </div>
                <div class="font-medium text-sm">
                    {{ $editor->address->address . ', ' . $editor->address->zip . ', ' . $editor->address->city }}
                </div>
                <div class="font-medium text-sm">
                    {{ $editor->company_siret }}
                </div>
            </div>
        </div>
    </div>


    <div class="w-2/3 mt-3">
        <div class="mt-8">
            <table class="w-full">
                <tbody>
                <tr>
                    <td class="uppercase text-sm font-semibold text-gray-400 w-1/3">
                        Client
                    </td>
                    <td class="w-2/3 text-sm font-medium">
                        {{ $client->firstname . ' ' . $client->lastname }}
                    </td>
                </tr>
                <tr>
                    <td class="uppercase text-sm font-semibold text-gray-400 w-1/3">
                        SIRET
                    </td>
                    <td class="w-2/3 text-sm font-medium">
                        {{ $client->company_siret }}
                    </td>
                </tr>
                <tr>
                    <td class="uppercase align-top text-sm font-semibold text-gray-400 w-1/3">
                        Adresse
                    </td>
                    <td class="w-2/3 text-sm font-medium">
                        {{ $client->address->address . ', ' . $client->address->zip . ', ' . $client->address->city }}
                    </td>
                </tr>
                <tr>
                    <td class="uppercase text-sm font-semibold text-gray-400 w-1/3">
                        émise le
                    </td>
                    <td class="w-2/3 text-sm font-medium">
                        {{ $estimate->createDate }}
                    </td>
                </tr>
                <tr>
                    <td class="uppercase text-sm font-semibold text-gray-400 w-1/3">
                        Expire le
                    </td>
                    <td class="w-2/3 text-sm font-medium">
                        {{ $estimate->dueDate }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>


    <div class="flex flex-col mt-10">
        <div class="relative overflow-x-auto">
            <table cellpadding="0" cellspacing="0" border="0" class="w-full text-sm text-left text-gray-500 border-b">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4">
                        Prestation
                    </th>
                    <th scope="col" class="text-right px-6 py-4">
                        QTE
                    </th>
                    <th scope="col" class="text-right px-6 py-4">
                        Prix Unité HT
                    </th>
                    <th scope="col" class="text-right px-6 py-4">
                        Total HT
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    @if($loop->odd)
                        <tr class="bg-white">
                    @else
                        <tr class="bg-gray-50" style="border-bottom: 1px solid #000000">
                            @endif
                            <th scope="row" class="px-6 py-3 font-medium text-gray-900" style="white-space:normal;">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-3 text-right">
                                {{ $item->qte }}
                            </td>
                            <td class="px-6 py-3 text-right">
                                {{ $item->price }} €
                            </td>
                            <td class="px-6 py-3 text-right font-medium text-gray-900">
                                {{ $item->price }} €
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>


        <div class="mt-8 text-right text-sm w-auto" style="margin-left: 68%;">
            <div class="mt-1">
                <table class="w-full">
                    <tbody>
                    <tr>
                        <td style="text-align: left;" class="uppercase font-semibold text-gray-400">
                            Sous-total
                        </td>
                        <td class="text-gray-900 font-semibold">
                            {{ $estimate->subTotal }}
                        </td>
                    </tr>
                    <tr class="mt-2">
                        <td style="text-align: left;" class="uppercase font-semibold text-gray-400">
                            Remise
                        </td>
                        <td class="text-gray-900 font-semibold">
                            {{ $estimate->discount }} %
                        </td>
                    </tr>
                    <tr class="mt-2">
                        <td style="text-align: left;"  class="uppercase font-semibold text-right text-green-500">
                            Total HT
                        </td>
                        <td class="text-green-500 text-right font-semibold">
                            {{ $estimate->total }}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <p class="text-right text-xs mt-2 text-gray-400 font-light italic">TVA non applicable art. 293b du CGI</p>

    <div class="flex flex-col text-left mr-auto mt-10">
        <div class="font-semibold text-lg text-gray-700 uppercase mb-2">
            Paiement
        </div>
        <div class="flex px-6">
            <table>
                <tbody>
                <tr>
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                             width="38" height="38"
                             viewBox="0 0 48 48">
                            <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                            <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                            <path fill="#ff3d00"
                                  d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                        </svg>
                    </td>
                    <td>
                        <div class="text-sm ml-4 items-center font-medium flex text-gray-700">
                            IBAN :
                            <span class="font-semibold text-gray-900 ml-1">FR76 1660 6220 1184 8778 6381 520</span>
                        </div>
                    </td>
                    <td>
                        <div class="text-sm ml-4 items-center font-medium flex text-gray-700">
                            BIC :
                            <span class="font-semibold text-gray-900 ml-1">AGRIFRPP866</span>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
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
                Les pénalités de retard correspondent à : 0% du montant TTC.<br>
                Dispensé d'immatriculation au RCS et au répertoire des métiers.
            </div>
        </div>
    </div>

    <div class="mr-auto mt-10 mb-2" style="
margin-left: 51%;
align-items: end;">
        <div class="font-semibold uppercase text-lg text-gray-700 mb-2">
            Signature
        </div>
        <div class="text-sm items-center font-medium text-gray-700">
            Datée et précédée de la mention "Bon pour accord"
        </div>
    </div>
</div>
</body>
</html>
