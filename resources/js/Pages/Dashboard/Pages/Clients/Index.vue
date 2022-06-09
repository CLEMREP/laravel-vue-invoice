<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    users: Object,
    addresses: Object,
})


</script>

<template>
    <Head title="Clients" />

    <DashboardLayout>
        <div id="reste" class="absolute main-content ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">

                <div>
                    <div class="grid grid-cols-1 gap-6 mt-14">

                        <div class="due-invoices">
                            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between mb-3">
                                <h6 class="mb-2 sm:mb-0 text-lg sm:text-xl font-semibold leading-normal">Mes clients</h6>
                                <div class="flex flex-col sm:flex-row justify-center sm:justify-end">
                                    <button class="mb-2 sm:mb-0 sm:mr-3 inline-flex whitespace-nowrap items-center border font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 px-3 py-2 text-sm leading-4 rounded-md border-transparent border-solid border-indigo-500 font-normal transition ease-in-out duration-150 text-indigo-500 hover:bg-indigo-200 shadow-inner" style="">
                                        Filtres
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 ml-2 -mr-1 h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                                        </svg>
                                    </button>
                                    <Link :href="route('create.clients')">
                                        <button class="w-full inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2" fill="#FFF" viewBox="0 0 24 24">
                                                <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                                            </svg>
                                            Nouveau client
                                        </button>
                                    </Link>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 pb-4 lg:pb-0">
                                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                        <div class="relative overflow-hidden bg-white border-b border-gray-200 shadow-md sm:rounded-lg">
                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Prénom</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Nom</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">E-Mail</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Ville</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Société</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">SIRET</th>
                                                        <th class="whitespace-nowrap px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr v-for="user in users.data" :key="user.id" class="bg-white">
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.firstname }}</td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.lastname }}</td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.email }}</td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.address_id }}</td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.company_name }}</td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">{{ user.company_siret }}</td>
                                                        <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap text-right text-sm font-medium pl-0">
                                                            <div class="relative inline-block h-full text-left">
                                                                <button id="headlessui-menu-button-5" type="button" aria-haspopup="true" aria-expanded="false" class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 text-gray-500">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"></path>
                                                                    </svg>
                                                                </button>
                                                                <div class="z-10 w-56" style="position: fixed; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(166px, 743px, 0px);" data-popper-placement="bottom-end" data-popper-reference-hidden="">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>

                                        </div>

                                        <div class="mt-3">
                                            <div class="flex">
                                                <template v-for="link in users.links" >
                                                    <Link v-if="link.url" :href="link.url" v-html="link.label" class="relative inline-flex items-center px-4 py-2 mr-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150" />
                                                </template>
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
