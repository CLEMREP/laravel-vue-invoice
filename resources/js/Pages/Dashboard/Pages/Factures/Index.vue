<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    invoices: Object,
})

const form = useForm({
    invoice: Object,
});
</script>

<template>
    <Head title="Factures"/>

    <DashboardLayout>
        <div id="reste" class="absolute main-content ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">

                <div>
                    <div class="grid grid-cols-1 gap-6 mt-14">

                        <div class="due-invoices">
                            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between mb-3">
                                <h6 class="mb-2 sm:mb-0 text-lg sm:text-xl font-semibold leading-normal">Mes
                                    Factures</h6>
                                <div class="flex flex-col sm:flex-row justify-center sm:justify-end">
                                    <button
                                        class="mb-2 sm:mb-0 sm:mr-3 inline-flex whitespace-nowrap items-center border font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm leading-4 rounded-md border-transparent border-solid border-indigo-500 font-normal transition ease-in-out duration-150 text-indigo-500 hover:bg-indigo-200 shadow-inner"
                                        style="">
                                        Filtres
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor" class="h-5 w-5 ml-2 -mr-1 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                        </svg>
                                    </button>
                                    <Link :href="route('facture.create')">
                                        <button
                                            class="w-full inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                                            type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2"
                                                 fill="#FFF" viewBox="0 0 24 24">
                                                <path d="M13 9h-2v3H8v2h3v3h2v-3h3v-2h-3z"></path>
                                                <path
                                                    d="M20 5h-8.586L9.707 3.293A.996.996 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V7c0-1.103-.897-2-2-2zM4 19V7h16l.002 12H4z"></path>
                                            </svg>
                                            Nouvelle facture
                                        </button>
                                    </Link>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 pb-4 lg:pb-0">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div
                                            class="relative overflow-hidden bg-white border-b border-gray-200 shadow-md sm:rounded-lg">

                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Facture ID
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Émise le
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Expire le
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Client
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Montant dû
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Status
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider pointer-events-none text-right pl-0">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-if="invoices.data.length > 0" v-for="invoice in invoices.data"
                                                    :key="invoice.id" class="bg-white">
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ invoice.invoiceId }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ invoice.createDate }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ invoice.dueDate }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ invoice.client.firstname + ' ' + invoice.client.lastname }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ invoice.total }}
                                                    </td>
                                                    <td class="px-6 py-4 text-xs text-gray-500 whitespace-nowrap">
                                                        <span
                                                            class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                            <span aria-hidden
                                                                  class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                        <span class="relative">En Attente</span>
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap text-right text-sm font-medium pl-0">
                                                        <div class="flex items-center justify-end h-full text-left">

                                                            <a :href="route('facture.preview', invoice)" target="_blank">
                                                                <button type="submit"
                                                                        class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         fill="#818cf8"
                                                                         viewBox="0 0 24 24"
                                                                         class="h-5 w-5 mr-2">
                                                                        <path
                                                                            d="M12 9a3.02 3.02 0 0 0-3 3c0 1.642 1.358 3 3 3 1.641 0 3-1.358 3-3 0-1.641-1.359-3-3-3z"></path>
                                                                        <path
                                                                            d="M12 5c-7.633 0-9.927 6.617-9.948 6.684L1.946 12l.105.316C2.073 12.383 4.367 19 12 19s9.927-6.617 9.948-6.684l.106-.316-.105-.316C21.927 11.617 19.633 5 12 5zm0 12c-5.351 0-7.424-3.846-7.926-5C4.578 10.842 6.652 7 12 7c5.351 0 7.424 3.846 7.926 5-.504 1.158-2.578 5-7.926 5z"></path>
                                                                    </svg>
                                                                </button>
                                                            </a>

                                                            <a :href="route('facture.download', invoice)" target="_blank">
                                                                <button type="submit"
                                                                        class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         fill="#818cf8"
                                                                         viewBox="0 0 24 24"
                                                                         class="h-5 w-5 mr-2">
                                                                        <path d="m12 16 4-5h-3V4h-2v7H8z"></path>
                                                                        <path
                                                                            d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path>
                                                                    </svg>
                                                                </button>
                                                            </a>

                                                            <form @submit.prevent="form.get(route('facture.edit', invoice))">
                                                                <button type="submit"
                                                                        class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         fill="#818cf8"
                                                                         viewBox="0 0 24 24"
                                                                         class="h-5 w-5">
                                                                        <path
                                                                            d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>

                                                            <form @submit.prevent="form.post(route('facture.destroy', invoice))">
                                                                <button type="submit"
                                                                        class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                         fill="#818cf8"
                                                                         viewBox="0 0 24 24"
                                                                         class="h-5 w-5 ml-2">
                                                                        <path
                                                                            d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path>
                                                                        <path d="M9 10h2v8H9zm4 0h2v8h-2z"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>

                                                            <div class="z-10 w-56"
                                                                 style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(166px, 743px, 0px);"
                                                                 data-popper-placement="bottom-end"
                                                                 data-popper-reference-hidden="">
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr v-else
                                                    class="text-center text-gray-500 pb-2 flex h-[160px] justify-center items-center flex-col">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor"
                                                         class="h-5 w-5 w-6 h-6 text-gray-400">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                              stroke-width="2"
                                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    <span class="block mt-1">Pas de résultats</span>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </DashboardLayout>

</template>
