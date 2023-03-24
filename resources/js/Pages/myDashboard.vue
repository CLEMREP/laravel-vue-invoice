<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import DashboardData from "@/Pages/Dashboard/Components/DashboardData";
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps(
    {
        userCount: Object,
        invoiceCount: Object,
        estimateCount: Object,
        sumInvoice: Object,
        estimates: Object,
        invoices: Object,
    }

)
</script>

<template>
    <Head title="Tableau de bord" />

    <DashboardLayout>
        <div class="absolute main-content sm:ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">

                <!-- DASHBOARD DATA -->
                <DashboardData :sumInvoice="sumInvoice" :invoiceCount="invoiceCount" :estimateCount="estimateCount" :userCount="userCount" />
                <!-- DASHBOARD DATA END -->
                <div>
                    <div class="grid grid-cols-1 gap-6 mt-14 xl:grid-cols-2">

                        <div class="due-invoices">
                            <div class="relative z-10 flex items-center justify-between mb-3">
                                <h6 class="mb-0 text-lg sm:text-xl font-semibold leading-normal">Factures récentes</h6>
                                <Link :href="route('facture.index')">
                                    <button class="inline-flex whitespace-nowrap items-center border font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm leading-4 rounded-md border-transparent border-solid border-indigo-500 font-normal transition ease-in-out duration-150 text-indigo-500 hover:bg-indigo-200 shadow-inner">
                                            Voir tout
                                    </button>
                                </Link>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 pb-4 lg:pb-0">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="relative overflow-hidden bg-white border-b border-gray-200 shadow-md sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Facture ID</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Émise le</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Client</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Montant dû</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Action</th>
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
                                                            {{ invoice.client.firstname + ' ' + invoice.client.lastname }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                            {{ invoice.total }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap text-right text-sm font-medium pl-0">
                                                            <div class="flex items-center justify-end h-full text-left">

                                                                <a :href="route('facture.preview', invoice)"
                                                                   target="_blank">
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
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr v-else>
                                                        <td colspan="7">
                                                            <div class="w-full text-center text-gray-500 pb-2 flex h-[160px] justify-center items-center flex-col">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                     viewBox="0 0 24 24" stroke="currentColor"
                                                                     class="h-5 w-5 w-6 h-6 text-gray-400">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          stroke-width="2"
                                                                          d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                                </svg>
                                                                <span class="block mt-1">Pas de résultats</span>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="recent-estimates">
                            <div class="relative z-10 flex items-center justify-between mb-3">
                                <h6 class="mb-0 text-lg sm:text-xl font-semibold leading-normal">Devis récents</h6>
                                <Link :href="route('devis.index')">
                                    <button class="inline-flex whitespace-nowrap items-center border font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm leading-4 rounded-md border-transparent border-solid border-indigo-500 font-normal transition ease-in-out duration-150 text-indigo-500 hover:bg-indigo-200 shadow-inner">
                                            Voir tout
                                    </button>
                                </Link>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 pb-4 lg:pb-0">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="relative overflow-hidden bg-white border-b border-gray-200 shadow-md sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Devis ID</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Émis le</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Client</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Montant dû</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-if="estimates.data.length > 0" v-for="estimate in estimates.data"
                                                    :key="estimate.id" class="bg-white">
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ estimate.estimateId }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ estimate.createDate }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ estimate.client.firstname + ' ' + estimate.client.lastname }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ estimate.total }}
                                                    </td>

                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap text-right text-sm font-medium pl-0">
                                                        <div class="flex items-center justify-end h-full text-left">

                                                            <a :href="route('devis.preview', estimate)"
                                                               target="_blank">
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
                                                        </div>
                                                    </td>
                                                </tr>
                                                    <tr v-else>
                                                    <td colspan="7">
                                                        <div class="w-full text-center text-gray-500 pb-2 flex h-[160px] justify-center items-center flex-col">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                 viewBox="0 0 24 24" stroke="currentColor"
                                                                 class="h-5 w-5 w-6 h-6 text-gray-400">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                      stroke-width="2"
                                                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                            </svg>
                                                            <span class="block mt-1">Pas de résultats</span>
                                                        </div>
                                                    </td>
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
