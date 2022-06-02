<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Nouveau client" />

    <DashboardLayout>
        <div id="reste" class="absolute main-content ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">

                <!-- NEW CLIENT START -->
                <h1 class="text-lg font-semibold text-left mb-2 sm:mb-4 sm:text-2xl">Clients / Nouveau client</h1>

                <div class="bg-white rounded-lg shadow mt-2">
                    <div class="px-4 py-5 sm:px-8 sm:py-8">
                        <div class="grid mb-8">
                            <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 col-span-5 lg:col-span-4">

                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Nom <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="REPEL">
                                        </div>
                                    </div>
                                </div>

                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Prénom <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="Clément">
                                        </div>
                                    </div>
                                </div>

                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>E-Mail <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="contact@clement-repel.fr">
                                        </div>
                                    </div>
                                </div>

                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Téléphone <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="07 71 38 20 28">
                                        </div>
                                    </div>
                                </div>

                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Adresse <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="63 Boulevard du Tertre">
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Pays <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="France">
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Code Postale <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="44100">
                                        </div>
                                    </div>
                                </div>
                                <div class="relative w-full text-left">
                                    <label class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                        <div>Ville <span class="text-sm text-red-500"> * </span></div>
                                    </label>
                                    <div class="flex flex-col mt-1">
                                        <div class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                            <input type="text" class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5" placeholder="Nantes">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="flex flex-row justify-end">
                            <button class="inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2" fill="#FFF" viewBox="0 0 24 24">
                                    <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                                </svg>
                                Nouveau client
                            </button>
                        </div>

                    </div>
                </div>
                <!-- NEW CLIENT END -->

            </div>
        </div>

    </DashboardLayout>
    
</template>
