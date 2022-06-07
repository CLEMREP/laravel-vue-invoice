<template>
    <div class="flex flex-col xl:flex-row justify-between w-full">
        <div class="w-full mt-4 flex items-center justify-between p-6 bg-white rounded-xl shadow-md lg:mr-6">
            <div>
                <span class="text-sm font-semibold uppercase text-gray-400">Total</span><br>
                <!-- <span class="text-xs font-semibold uppercase">01 janvier 2022 - 31 décembre 2022</span> -->
                <h1 class="text-2xl font-bold text-indigo-400">6 750,99€</h1>
            </div>
            <div>
                <i class='bx bx-wallet bx-lg md:ml-16'></i>
            </div>
        </div>

        <div class="w-full mt-4 flex items-center justify-between p-6 bg-white rounded-xl shadow-md lg:mr-6">
            <div>
                <span class="text-sm font-semibold uppercase text-gray-400">Factures</span>
                <h1 class="text-2xl font-bold text-indigo-400">1</h1>
            </div>
            <div>
                <!-- <i class='bx bxs-bank bx-lg md:ml-16'></i> -->
                <i class='bx bx-file bx-lg md:ml-16'></i>
            </div>
        </div>

        <div class="w-full mt-4 flex items-center justify-between p-6 bg-white rounded-xl shadow-md lg:mr-6">
            <div>
                <span class="text-sm font-semibold uppercase text-gray-400">Devis</span>
                <h1 class="text-2xl font-bold text-indigo-400">2</h1>
            </div>
            <div>
                <!-- <i class='bx bx-donate-heart bx-lg md:ml-16'></i> -->
                <i class='bx bx-file-blank bx-lg md:ml-16'></i>
            </div>
        </div>

        <div class="w-full mt-4 flex items-center justify-between p-6 bg-white rounded-xl shadow-md">
            <div>
                <span class="text-sm font-semibold uppercase text-gray-400">Clients</span>
                <h1 class="text-2xl font-bold text-indigo-400">2</h1>
            </div>
            <div>
                <!-- <i class='bx bx-credit-card-alt bx-lg md:ml-16'></i> -->
                <i class='bx bx-user bx-lg md:ml-16'></i>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "DashboardData"
}
</script>
