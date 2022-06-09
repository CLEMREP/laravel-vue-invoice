<script setup>
import AuthLayout from "@/Layouts/AuthLayout";
import ValidationErrors from '@/Components/ValidationErrors.vue';
import Button from '@/Components/Button.vue';
import Input from '@/Components/Input.vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false
});

const submit = () => {
    form.post(route('connexion'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Connexion"/>
    <auth-layout>
        <div class="w-full md:w-1/2 py-10 px-5 md:px-10">
            <div class="text-center mb-10">
                <h1 class="font-bold text-3xl text-gray-900">Connexion</h1>
            </div>

            <ValidationErrors class="mb-4"/>

            <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                {{ status }}
            </div>
            <form @submit.prevent="submit">
                <div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-envelope"></i>
                                </div>
                                <Input id="email" type="email" name="email" placeholder="johnsmith@example.com"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       v-model="form.email" autofocus autocomplete="email"/>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-full px-3 mb-12">
                            <label for="" class="text-xs font-semibold px-1">Mot de passe</label>
                            <div class="flex">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="bx bx-lock-alt"></i>
                                </div>
                                <Input id="password" type="password" name="password"
                                       class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                       placeholder="Mot de passe" v-model="form.password" autocomplete="current-password"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex -mx-3">
                    <div class="w-full px-3 mb-5">
                        <Button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            Connexion
                        </Button>
                        <p class="text-center pt-2 text-xm">
                            <Link :href="route('inscription')">
                                Vous n'avez pas de compte ?
                            </Link>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </auth-layout>
</template>
