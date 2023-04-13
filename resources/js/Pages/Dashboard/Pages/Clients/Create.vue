<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import Input from '@/Components/Input.vue';
import {Head, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    firstname: '',
    lastname: '',
    phone: '',
    email: '',
    address: '',
    zip: '',
    city: '',
    state: '',
    companyName: '',
    companyEmail: '',
    companyPhone: '',
    companySiret: '',
    companyAddress: '',
    companyZip: '',
    companyCity: '',
    companyState: '',
    isCompany: false,
});

const submit = () => {
    form.post(route('client.store'));
};
</script>

<template>
    <Head title="Nouveau client"/>

    <DashboardLayout>
        <div id="reste" class="absolute main-content ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">

                <!-- NEW CLIENT START -->
                <form @submit.prevent="submit">
                    <div class="flex flex-wrap justify-between mb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-left text-black">Nouveau client</h3>
                        </div>
                        <div class="flex items-center">
                            <button
                                class="w-full inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                                type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2" fill="#FFF"
                                     viewBox="0 0 24 24">
                                    <path
                                        d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                                </svg>
                                Nouveau client
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow mt-2">
                        <div class="px-4 py-5 sm:px-8 sm:py-8">

                            <ValidationErrors class="mb-4"/>

                            <div class="grid grid-cols-5 gap-4 mb-8">
                                <h6 class="col-span-5 text-lg font-semibold text-left lg:col-span-1">Pré-requis</h6>
                                <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 col-span-5 lg:col-span-4">

                                    <div class="relative w-full text-left">

                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" v-model="form.isCompany" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900">Entreprise</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="grid grid-cols-5 gap-4 mt-8 mb-8">
                                <h6 class="col-span-5 text-lg font-semibold text-left lg:col-span-1">Informations</h6>
                                <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 col-span-5 lg:col-span-4">

                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Nom<span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <Input v-model="form.lastname" name="lastname" type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="REPEL"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Prénom <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.firstname" autofocus autocomplete="firstname"
                                                       name="firstname" type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="Clément">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="grid grid-cols-5 gap-4 mt-8 mb-8">
                                <h6 class="col-span-5 text-lg font-semibold text-left lg:col-span-1">Adresse</h6>
                                <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 col-span-5 lg:col-span-4">

                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Adresse <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.address" autofocus autocomplete="address"
                                                       name="address" type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="63 Boulevard du Tertre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Pays <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.state" autofocus autocomplete="state" name="state"
                                                       type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="France">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Code Postale <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.zip" autofocus autocomplete="zip" name="zip"
                                                       type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="44100">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Ville <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.city" autofocus autocomplete="city" name="city"
                                                       type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="Nantes">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <hr>
                            <div class="grid grid-cols-5 gap-4 mt-8 mb-8">
                                <h6 class="col-span-5 text-lg font-semibold text-left lg:col-span-1">Contact</h6>
                                <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 col-span-5 lg:col-span-4">

                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>E-Mail <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.email" autofocus autocomplete="email"
                                                       name="address" type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="contact@clement-repel.fr">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative w-full text-left">
                                        <label
                                            class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                            <div>Téléphone <span class="text-sm text-red-500"> * </span></div>
                                        </label>
                                        <div class="flex flex-col mt-1">
                                            <div
                                                class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                <input v-model="form.phone" autofocus autocomplete="phone" name="phone"
                                                       type="text"
                                                       class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                       placeholder="07 61 38 20 25">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-if="form.isCompany">
                                <hr>
                                <div class="grid grid-cols-5 gap-4 mt-8 mb-8">
                                    <h6 class="col-span-5 text-lg font-semibold text-left lg:col-span-1">Entreprise</h6>
                                    <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 col-span-5 lg:col-span-4">
                                        <div class="grid gap-y-6 gap-x-4 md:grid-cols-2 md:col-span-2 lg:col-span-2">
                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>E-Mail de société</div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyEmail" autofocus autocomplete="companyEmail" name="companyEmail"
                                                               type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="contact@binary-cloud.fr">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>Téléphone de société</div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyPhone" autofocus autocomplete="companyPhone" name="companyPhone"
                                                               type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="07 61 38 20 25">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>SIRET <span class="text-sm text-red-500"> * </span>
                                                    </div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companySiret" autofocus autocomplete="companySiret"
                                                               name="companySiret" type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="123 25988651445">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>Nom de l'entreprise <span class="text-sm text-red-500"> * </span></div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyName" autofocus autocomplete="companyName"
                                                               name="companyName" type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="Binary-Cloud">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>Adresse <span class="text-sm text-red-500"> * </span></div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyAddress" autofocus autocomplete="address"
                                                               name="address" type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="63 Boulevard du Tertre">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>Pays <span class="text-sm text-red-500"> * </span></div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyState" autofocus autocomplete="state" name="state"
                                                               type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="France">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>Code Postale <span class="text-sm text-red-500"> * </span></div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyZip" autofocus autocomplete="zip" name="zip"
                                                               type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="44100">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative w-full text-left">
                                                <label
                                                    class="flex text-sm not-italic items-center font-medium text-primary-800 whitespace-nowrap justify-between">
                                                    <div>Ville <span class="text-sm text-red-500"> * </span></div>
                                                </label>
                                                <div class="flex flex-col mt-1">
                                                    <div
                                                        class="h-9 py-px box-content p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10 w-full">
                                                        <input v-model="form.companyCity" autofocus autocomplete="city" name="city"
                                                               type="text"
                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5"
                                                               placeholder="Nantes">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- NEW CLIENT END -->

            </div>
        </div>

    </DashboardLayout>

</template>
