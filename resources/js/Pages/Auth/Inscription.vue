<script setup>
import AuthLayout from "@/Layouts/AuthLayout";
import ValidationErrors from '@/Components/ValidationErrors.vue';
import Button from '@/Components/Button.vue';
import Input from '@/Components/Input.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

const form = useForm({
    firstname: '',
    lastname: '',
    phone: '',
    email: '',
    password: '',
    address: '',
    zip: '',
    city: '',
    state: '',
    companyName: '',
    companyEmail: '',
    companyPhone: '',
    companyWebsite: '',
    companySiret: '',
    terms: false,
});

const submit = () => {
    form.post(route('inscription'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Inscription"/>
    <auth-layout>
        <div class="w-full py-8 px-5 md:px-10">
            <div class="text-center mb-10">
                <h1 class="font-bold text-3xl text-gray-900">Inscription</h1>
            </div>

            <ValidationErrors class="mb-4"/>

            <form @submit.prevent="submit">
                <div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Prénom</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-user"></i>
                                </div>
                                <Input id="firstname" name="firstname" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="John" v-model="form.firstname" autofocus autocomplete="firstname"/>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Nom</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-user"></i>
                                </div>
                                <Input id="lastname" name="lastname" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="Smith" v-model="form.lastname" autofocus autocomplete="lastname"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-envelope"></i>
                                </div>
                                <Input id="email" name="email" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="johnsmith@example.com" v-model="form.email" autofocus autocomplete="email"/>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Téléphone</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-phone"></i>
                                </div>
                                <Input id="phone" name="phone" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="06 61 68 20 31" v-model="form.phone" autofocus autocomplete="phone"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Mot de passe</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-lock-alt"></i></div>
                                <Input id="password" name="password" type="password"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="Mot de passe" v-model="form.password" autofocus autocomplete="password"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Adresse</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-map-pin"></i>
                                </div>
                                <Input id="address" name="address" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="Avenue du Général" v-model="form.address" autofocus autocomplete="address"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/3 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Ville</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-map"></i>
                                </div>
                                <Input id="city" name="city" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="Caen" v-model="form.city" autofocus autocomplete="city"/>
                            </div>
                        </div>
                        <div class="w-1/3 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Code Postal</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bxs-keyboard"></i>
                                </div>
                                <Input id="zip" name="zip" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="14000" v-model="form.zip" autofocus autocomplete="zip"/>
                            </div>
                        </div>
                        <div class="w-1/3 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Pays</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-flag"></i>
                                </div>
                                <Input id="state" name="state" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="France" v-model="form.state" autofocus autocomplete="state"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Nom de la société</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-envelope"></i>
                                </div>
                                <Input id="companyName" name="companyName" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="Google" v-model="form.companyName" autofocus autocomplete="companyName"/>
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">E-Mail de la société</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-phone"></i>
                                </div>
                                <Input id="companyEmail" name="companyEmail" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="hello@google.com" v-model="form.companyEmail" autofocus autocomplete="companyEmail"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/3 px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Téléphone de la société</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-phone"></i>
                                </div>
                                <Input id="companyPhone" name="companyPhone" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="09 30 99 40 28" v-model="form.companyPhone" autofocus autocomplete="companyPhone"/>
                            </div>
                        </div>
                        <div class="w-1/3 px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Site Internet de la société</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-store"></i>
                                </div>
                                <Input id="companyWebsite" name="companyWebsite" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="https://google.com" v-model="form.companyWebsite" autofocus autocomplete="companyWebsite"/>
                            </div>
                        </div>
                        <div class="w-1/3 px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">SIRET de la société</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-qr"></i>
                                </div>
                                <Input id="companySiret" name="companySiret" type="text"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="568 941 00056" v-model="form.companySiret" autofocus autocomplete="companySiret"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                Créer mon compte
                            </Button>
                            <p class="text-center pt-2 text-xm">
                                <Link :href="route('connexion')">
                                    Vous avez déjà un compte ?
                                </Link>
                            </p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </auth-layout>
</template>
