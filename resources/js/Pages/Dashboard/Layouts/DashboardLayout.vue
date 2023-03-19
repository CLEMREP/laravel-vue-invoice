<script setup>
    import BreezeApplicationLogo from '@/Pages/Dashboard/Components/ApplicationLogo.vue';
    import BreezeDropdown from '@/Pages/Dashboard/Components/Dropdown.vue';
    import BreezeDropdownLink from '@/Pages/Dashboard/Components/DropdownLink.vue';
    import { Link } from '@inertiajs/inertia-vue3';
    import NavLink from '@/Pages/Dashboard/Components/NavLink.vue';
</script>

<script>
    export default {
        data() {
            return {
                open: false,
            };
        },
    }
</script>

<template>

    <div class="w-full absolute z-0 h-full">

        <!-- BAR END -->
        <div class="absolute flex flex-row z-20 h-16 w-full bg-white">
            <div div class="w-16 flex h-full items-center justify-center">
                <a href="/" class="inline-block text-xl font-bold tracking-wider text-indigo-700 uppercase dark:text-light">
                    <BreezeApplicationLogo class="block h-10 w-auto" />
                </a>
            </div>

            <div class="flex w-full h-full items-center justify-end mr-4">

                <div class="mr-4 sm:hidden cursor-pointer flex">
                    <div v-if="open">
                        <button @click="open = !open" class="flex items-center justify-center w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                        </button>
                    </div>

                    <div v-else>
                        <button @click="open = !open" class="flex items-center justify-center w-10 h-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28px" height="28px" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path></svg>
                        </button>
                    </div>
                </div>

                <BreezeDropdown align="right" width="auto">
                    <template #trigger>
                        <span class="inline-flex rounded-md">
                            <button class="inline-block text-xl font-bold tracking-wider text-indigo-700 uppercase dark:text-light">
                                <img class="w-10 h-10 object-cover rounded-full" :src="'/assets/img/profil.jpeg'" alt="" />
                            </button>
                        </span>
                    </template>
                    <template #content>
                        <div class="text-base text-black list-none bg-white rounded divide-y divide-gray-100">
                            <div class="py-3 px-4">
                                <span class="block text-sm text-black">{{ $page.props.auth.user.firstname + " " + $page.props.auth.user.lastname }}</span>
                                <span class="block text-sm font-medium text-gray-500 truncate">{{ $page.props.auth.user.email }}</span>
                            </div>
                            <ul class="py-1" aria-labelledby="dropdown">
                                <BreezeDropdownLink :href="route('compte')">
                                    <i class='bx bx-cog mr-2'></i>Mon compte
                                </BreezeDropdownLink>
                                <BreezeDropdownLink :href="route('logout')" method="post" as="button">
                                    <i class='bx bx-log-in mr-2'></i>Déconnexion
                                </BreezeDropdownLink>
                            </ul>
                        </div>
                    </template>
                </BreezeDropdown>

            </div>

        </div>
        <!-- TOP BAR END -->
        <div v-if="open">
            <div class="fixed inset-y-0 z-20 flex-shrink-0 w-full mt-16 overflow-y-auto bg-gray-50 sm:hidden flex flex-col items-center">
                <div class="py-4 text-gray-500">
                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <NavLink :active="route().current('dashboard')" :href="route('dashboard')">
                                <span class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800">Tableau de bord</span>
                            </NavLink>
                        </li>
                    </ul>

                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <a class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800" href="https://delmas.clement-repel.fr/tableau-de-bord/admin/suivi-des-demarches">
                                <span>Évolutions</span>
                            </a>
                        </li>
                    </ul>


                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <a class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800" href="https://delmas.clement-repel.fr/tableau-de-bord/admin/liste-des-entreprises">
                                <span>Clients</span>
                            </a>
                        </li>
                    </ul>

                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <a class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800" href="https://delmas.clement-repel.fr/tableau-de-bord/admin/gestion-des-etudiants">
                                <span>Factures</span>
                            </a>
                        </li>
                    </ul>

                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <a class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800" href="https://delmas.clement-repel.fr/tableau-de-bord/admin/gestion-des-professeurs">
                                <span>Devis</span>
                            </a>
                        </li>
                    </ul>

                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <a class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800" href="https://delmas.clement-repel.fr/tableau-de-bord/admin/gestion-des-promotions">
                                <span>Paiements</span>
                            </a>
                        </li>
                    </ul>

                    <ul>
                        <li class="text-center relative px-6 py-3">
                            <a class="text-3xlw-full text-3xl font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800" href="https://delmas.clement-repel.fr/tableau-de-bord/admin/message">
                                <span>Paramètres</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <main>
            <slot />
        </main>

        <!-- LEFT BAR -->
        <div class="sm:block hidden w-16 h-full inset-y-0 z-10 flex flex-shrink-0 bg-white md:static dark:border-indigo-800 dark:bg-darker focus:outline-none">
            <nav class="w-16 absolute flex flex-col flex-shrink-0 h-left-bar py-4 bg-white"> <!-- px-2 -->

                <div class="flex flex-col items-center justify-center flex-1">
                    <NavLink :active="route().current('dashboard')" :href="route('dashboard')">
                        <i class='bx bx-home bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Accueil</div>
                    </NavLink>

                    <NavLink href="#" class="group relative w-full p-4 text-indigo-600 flex text-center justify-center hover:bg-indigo-100">
                        <i class='bx bx-chart bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Évolutions</div>
                    </NavLink>
                    <NavLink :active="$page.url.startsWith('/dashboard/clients')" :href="route('client.index')">
                        <i class='bx bx-user bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Clients</div>
                    </NavLink>
                    <NavLink :active="$page.url.startsWith('/dashboard/factures')" :href="route('facture.index')">
                        <i class='bx bx-receipt bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Factures</div>
                    </NavLink>
                    <NavLink :active="$page.url.startsWith('/dashboard/devis')" :href="route('devis.index')">
                        <i class='bx bx-file bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Devis</div>
                    </NavLink>
                    <NavLink href="#" class="group relative w-full p-4 text-indigo-600 flex text-center justify-center hover:bg-indigo-100">
                        <i class='bx bx-credit-card-alt bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Paiements</div>
                    </NavLink>
                    <NavLink :active="route().current('compte')" :href="route('compte')">
                        <i class='bx bx-cog bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Paramètres</div>
                    </NavLink>
                </div>

                <Link :href="route('logout')" method="post" as="button">
                    <button class="group relative w-full p-4 text-indigo-600 flex text-center justify-center hover:bg-indigo-100">
                        <i class='bx bx-exit bx-sm'></i>
                        <div class="absolute rounded-r bg-indigo-100 top-0 left-0 p-4 -ml-96 group-hover:ml-16 transition-all duration-200 z-50 font-medium">Déconnexion</div>
                    </button>
                </Link>

            </nav>
            <!-- END LEFT BAR END -->


        </div>

  </div>

</template>
