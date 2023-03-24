<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    users: Object,
})

const form = useForm({
    user: Object,
});

</script>

<template>
    <Head title="Clients"/>

    <DashboardLayout>
        <div id="reste" class="absolute main-content ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">

                <div>
                    <div class="grid grid-cols-1 gap-6 mt-14">

                        <div class="due-invoices">
                            <div class="relative z-10 flex flex-col sm:flex-row sm:items-center justify-between mb-3">
                                <h6 class="mb-2 sm:mb-0 text-lg sm:text-xl font-semibold leading-normal">Mes
                                    clients</h6>
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
                                    <Link :href="route('client.create')">
                                        <button
                                            class="w-full inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                                            type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2"
                                                 fill="#FFF" viewBox="0 0 24 24">
                                                <path
                                                    d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                                            </svg>
                                            Nouveau client
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
                                                        Prénom
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Nom
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        E-Mail
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Ville
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Entreprise
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Admin
                                                    </th>
                                                    <th class="whitespace-nowrap px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                <tr v-if="users.data.length > 0" v-for="user in users.data" :key="user.id" class="bg-white">
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ user.firstname }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ user.lastname }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ user.email }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ user.city }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        <div v-if="user.company" class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                            <h2 class="text-sm font-normal">Oui</h2>
                                                        </div>

                                                        <div v-else class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                            <h2 class="text-sm font-normal">Non</h2>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        <div v-if="user.admin" class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                            <h2 class="text-sm font-normal">Oui</h2>
                                                        </div>

                                                        <div v-else class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60">
                                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9 3L3 9M3 3L9 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                            </svg>

                                                            <h2 class="text-sm font-normal">Non</h2>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 text-sm text-gray-500 whitespace-nowrap text-right text-sm font-medium pl-0">
                                                        <div class="flex items-center justify-end h-full text-left">

                                                            <form @submit.prevent="form.get(route('client.edit', user))">
                                                                <button type="submit"
                                                                        class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#818cf8"
                                                                         viewBox="0 0 24 24"
                                                                         class="h-5 w-5 mr-2">
                                                                        <path
                                                                            d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path>
                                                                    </svg>
                                                                </button>
                                                            </form>

                                                            <form @submit.prevent="form.post(route('client.destroy', user))">
                                                                <button type="submit"
                                                                        class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="#818cf8"
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

                                        <div v-if="users.data.length > 0" class="mt-3">
                                            <div class="flex">
                                                <template v-for="link in users.links">
                                                    <Link v-if="link.url" :href="link.url" v-html="link.label"
                                                          class="relative inline-flex items-center px-4 py-2 mr-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150"/>
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
