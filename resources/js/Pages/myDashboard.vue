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
                                <h6 class="mb-0 text-lg sm:text-xl font-semibold leading-normal">Factures émises</h6>
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
                                                <thead class="bg-gray-50"><tr>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Émise le</th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Client</th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Montant dû</th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider pointer-events-none text-right pl-0"></th></tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <div class="text-center text-gray-500 pb-2 flex h-[160px] justify-center items-center flex-col">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 w-6 h-6 text-gray-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <span class="block mt-1">Pas de résultats</span>
                                            </div>
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
                                                <thead class="bg-gray-50"><tr>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Date</th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Client</th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Montant dû</th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider pointer-events-none text-right pl-0"></th></tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                            <div class="text-center text-gray-500 pb-2 flex h-[160px] justify-center items-center flex-col">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 w-6 h-6 text-gray-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                <span class="block mt-1">Pas de résultats</span>
                                            </div>
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
