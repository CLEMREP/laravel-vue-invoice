<template>
    <div class="bg-indigo-100 py-8 w-full">
        <div v-if="canLogin" class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')">
                <button
                    class="inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                    type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2" fill="#FFF"
                         viewBox="0 0 24 24">
                        <path
                            d="M20 7h-4V4c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v5H4c-1.103 0-2 .897-2 2v9a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V9c0-1.103-.897-2-2-2zM4 11h4v8H4v-8zm6-1V4h4v15h-4v-9zm10 9h-4V9h4v10z"></path>
                    </svg>
                    Tableau de bord
                </button>
            </Link>

            <template v-else>
                <Link :href="route('connexion')" class="mr-4">
                    <button
                        class="inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2" fill="#FFF"
                             viewBox="0 0 24 24">
                            <path
                                d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path>
                        </svg>
                        Connexion
                    </button>
                </Link>

                <Link v-if="canRegister" :href="route('inscription')">
                    <button
                        class="inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                        type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -ml-1 mr-2" fill="#FFF"
                             viewBox="0 0 24 24">
                            <path
                                d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8a3.91 3.91 0 0 0 4 4 3.91 3.91 0 0 0 4-4 3.91 3.91 0 0 0-4-4 3.91 3.91 0 0 0-4 4zm6 0a1.91 1.91 0 0 1-2 2 1.91 1.91 0 0 1-2-2 1.91 1.91 0 0 1 2-2 1.91 1.91 0 0 1 2 2zM4 18a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v1h2v-1a5 5 0 0 0-5-5H7a5 5 0 0 0-5 5v1h2z"></path>
                        </svg>
                        Inscription
                    </button>
                </Link>
            </template>
        </div>
    </div>
</template>

<script setup>
import {Link} from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
});
</script>
