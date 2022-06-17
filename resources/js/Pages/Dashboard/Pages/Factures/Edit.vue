<script setup>
import DashboardLayout from '@/Pages/Dashboard/Layouts/DashboardLayout.vue';
import ValidationErrors from '@/Components/ValidationErrors.vue';
import {Head} from '@inertiajs/inertia-vue3';
</script>

<template>
    <Head title="Édition d'une facture"/>
    <DashboardLayout>
        <div class="absolute main-content ml-16 mt-16 overflow-y-auto">
            <div class="my-4 sm:my-12 mx-8 2xl:mx-auto 2xl:w-9/12">
                <ValidationErrors class="mb-4"/>
                <form @submit.prevent="form.post(route('facture.update', invoice))">
                    <div class="flex flex-wrap justify-between">
                        <div>
                            <h3 class="text-2xl font-bold text-left text-black">Édition d'une                                                       Facture</h3>
                        </div>
                        <div class="flex items-center">
                            <button
                                class="w-full inline-flex whitespace-nowrap items-center border font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-transparent shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-primary-500"
                                type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" class="h-5 w-5 -ml-1 mr-2 h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"></path>
                                </svg>
                                Éditer la facture
                            </button>
                        </div>
                    </div>
                    <div class="grid-cols-12 gap-8 mt-6 mb-6">
                        <div class="grid gap-y-6 gap-x-4 grid-cols-1 md:grid-cols-3 col-span-12">
                            <div class="relative w-full text-left">
                                <label
                                    class="flex text-sm not-italic items-center font-medium text-gray-800 whitespace-nowrap justify-between">
                                    <div>Date de création
                                        <span class="text-sm text-red-500"> * </span>
                                    </div>
                                </label>
                                <div class="flex flex-col mt-1">
                                    <div class="relative">
                                        <input v-model="form.invoiceDate"
                                               class="font-base py-2 outline-none focus:ring-primary-400 focus:outline-none focus:border-primary-400 block w-full sm:text-sm border-gray-200 rounded-md text-black form-control input"
                                               tabindex="0" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-full text-left">
                                <label
                                    class="flex text-sm not-italic items-center font-medium text-gray-800 whitespace-nowrap justify-between">
                                    <div>Date d'expiration
                                        <span class="text-sm text-red-500" style="display: none;"> * </span>
                                    </div>
                                </label>
                                <div class="flex flex-col mt-1">
                                    <div class="relative">
                                        <input v-model="form.invoiceDueDate"
                                               class="font-base py-2 outline-none focus:ring-primary-400 focus:outline-none focus:border-primary-400 block w-full sm:text-sm border-gray-200 rounded-md text-black form-control input"
                                               tabindex="0" type="date">
                                    </div>
                                </div>
                            </div>
                            <div class="relative w-full text-left">
                                <label
                                    class="flex text-sm not-italic items-center font-medium text-gray-800 whitespace-nowrap justify-between">
                                    <div>Numéro de facture
                                        <span class="text-sm text-red-500"> * </span>
                                    </div>
                                </label>
                                <div class="flex flex-col mt-1">
                                    <div class="relative rounded-md shadow-sm font-base">
                                        <input type="text"
                                               v-model="form.invoiceId"
                                               readonly
                                               class="font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-primary-400 focus:border-primary-400">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="relative w-full text-left mb-8">
                        <label
                            class="flex text-sm not-italic items-center font-medium text-gray-800 whitespace-nowrap justify-between">
                            <div>Sélectionnez un client :
                                <span class="text-sm text-red-500"> * </span>
                            </div>
                        </label>
                        <div class="flex flex-col mt-1">
                            <div class="relative rounded-md shadow-sm font-base">
                                <select v-model="form.client"
                                        class="font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-primary-400 focus:border-primary-400">
                                    <option disabled value="">Liste des clients</option>
                                    <option v-for="user in users" :key="user.id" :value="user.id" >{{ user.firstname + ' ' + user.lastname }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto lg:overflow-visible sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-4 lg:px-6">
                                <div class="overflow-hidden lg:overflow-visible sm:px-2 lg:p-2">
                                    <table class="text-center item-table min-w-full">
                                        <colgroup>
                                            <col style="width: 40%; min-width: 280px;">
                                            <col style="width: 10%; min-width: 120px;">
                                            <col style="width: 15%; min-width: 120px;">
                                            <col style="width: 15%; min-width: 120px;">
                                        </colgroup>
                                        <thead class="bg-white border border-gray-200 border-solid">
                                        <tr>
                                            <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-left text-gray-700 border-t border-b border-gray-200 border-solid">
                                                <span class="pl-9">Produit/Service</span>
                                            </th>
                                            <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-right text-gray-700 border-t border-b border-gray-200 border-solid">
                                                <span>Quantité</span>
                                            </th>
                                            <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-left text-gray-700 border-t border-b border-gray-200 border-solid">
                                                <span>Prix</span>
                                            </th>
                                            <th class="px-5 py-3 text-sm not-italic font-medium leading-5 text-right text-gray-700 border-t border-b border-gray-200 border-solid">
                                                <span class="pr-10 column-heading">Total</span>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="box-border bg-white border border-gray-200 border-solid rounded-b">
                                            <td colspan="5" class="p-0 text-left align-top">
                                                <table class="w-full">
                                                    <colgroup>
                                                        <col style="width: 40%; min-width: 280px;">
                                                        <col style="width: 10%; min-width: 120px;">
                                                        <col style="width: 15%; min-width: 120px;">
                                                        <col style="width: 15%; min-width: 120px;">
                                                    </colgroup>
                                                    <tbody>
                                                    <tr v-for="(item, index) in invoiceItems">
                                                        <td class="px-5 py-4 text-left align-top">
                                                            <div class="flex justify-start">
                                                                <div v-on:click="deleteItem(index)"
                                                                     class="flex items-center justify-center text-gray-300 cursor-pointer handle mr-4">
                                                                    <i class='text-indigo-400 bx bx-trash'></i>
                                                                </div>
                                                                <div class="flex-1 text-sm">
                                                                    <div
                                                                        class="p-0 relative mx-auto w-full flex items-center justify-end box-border cursor-pointer border border-gray-200 rounded-md bg-white text-sm leading-snug outline-none max-h-10">
                                                                        <input type="text"
                                                                               v-model="item.name"
                                                                               class="w-full absolute inset-0 outline-none appearance-none box-border border-0 text-sm font-sans bg-white rounded-md pl-3.5">
                                                                        <div class="h-9 py-px box-content"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-5 py-4 text-right align-top">
                                                            <div class="relative rounded-md shadow-sm font-base">
                                                                <input v-model="item.qte"
                                                                       type="number"
                                                                       class="font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-primary-400 focus:border-primary-400">
                                                            </div>
                                                        </td>
                                                        <td class="px-5 py-4 text-left align-top">
                                                            <div class="flex flex-col">
                                                                <div class="flex-auto flex-fill bd-highlight">
                                                                    <div class="flex flex-row w-full">
                                                                        <input v-model="item.price"
                                                                               type="number"
                                                                               step=".01"
                                                                               class="font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-primary-400 focus:border-primary-400">

                                                                        <span class="flex items-center justify-center ml-2">
                                                                            €
                                                                        </span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-5 py-4 text-right align-top">
                                                            <div class="flex items-center justify-end text-sm">
                                                                <span>
                                                                    <span class="text-base" style="font-family: sans-serif;">
                                                                        {{ decimalDigits(item.price * item.qte) }}
                                                                    </span>
                                                                </span>
                                                                <div
                                                                    class="flex items-center justify-center w-6 h-10 mx-2">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <span v-on:click="addNewItem" class="w-full cursor-pointer">
                                        <div
                                            class="bg-indigo-50 flex items-center justify-center w-full px-6 py-3 text-base border border-t-0 border-gray-200 border-solid cursor-pointer text-indigo-400 hover:bg-indigo-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke="currentColor" class="h-5 w-5 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                </path>
                                            </svg>
                                            Ajouter un produit / service
                                        </div>
                                    </span>
                                    <div class="block mt-6 lg:flex lg:justify-end">
                                        <div
                                            class="px-5 py-4 mt-4 bg-white border border-gray-200 border-solid rounded md:min-w-[390px] min-w-[300px]">
                                            <div class="flex items-center justify-between w-full">
                                                <label class="text-sm font-semibold leading-5 text-gray-400 uppercase">
                                                    Sous-Total
                                                </label>
                                                <label
                                                    class="flex items-center justify-center m-0 text-lg text-black uppercase">
                                                    <span style="font-family: sans-serif;">
                                                        {{ decimalDigits(subTotal) }}
                                                    </span>
                                                </label>
                                            </div>
                                            <div class="flex items-center justify-between w-full mt-2">
                                                <label class="text-sm font-semibold leading-5 text-gray-400 uppercase">
                                                    Remise
                                                </label>
                                                <div class="flex">
                                                    <div
                                                        class="relative rounded-md shadow-sm font-base border-r-0 focus:border-r-2 rounded-tr-sm rounded-br-sm h-[38px]">
                                                        <input v-model="form.discountRate"
                                                               class="border-r-0 focus:border-r-2 rounded-tr-sm rounded-br-sm h-[38px] font-base block w-full sm:text-sm border-gray-200 rounded-md text-black focus:ring-primary-400 focus:border-primary-400"
                                                               type="number">

                                                    </div>
                                                    <div class="relative inline-block h-full text-left">
                                                        <div
                                                            class="inline-flex whitespace-nowrap items-center border font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 px-4 py-2 text-sm leading-5 rounded-md border-gray-200 text-gray-700 bg-white hover:bg-gray-50 focus:ring-primary-500 focus:ring-offset-0 rounded-tr-md rounded-br-md p-2 rounded-none">
                                                                <span class="flex items-center">
                                                                    %
                                                                </span>
                                                        </div>
                                                        <div class="z-10 w-56"
                                                             style="position: fixed; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(661px, 515px, 0px);">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex justify-end items-center w-full">
                                                <div class="my-2">
                                                    Soit : {{ decimalDigits(discountTotal) }}
                                                </div>
                                            </div>
                                            <div
                                                class="flex items-center justify-between w-full pt-2 mt-5 border-t border-gray-200 border-solid">
                                                <label
                                                    class="m-0 text-sm font-semibold leading-5 text-gray-400 uppercase">
                                                    Total
                                                </label>
                                                <label
                                                    class="flex items-center justify-center text-lg uppercase text-primary-400">
                                                    <span style="font-family: sans-serif;">
                                                        {{ decimalDigits(grandTotal) }}
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </DashboardLayout>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3'

export default {
    props: ['users', 'invoice', 'invoiceItems'],
    data() {
        return {
            form : useForm({
                editor: this.$page.props.auth.user.id,
                client: this.invoice.client_id,
                invoiceDate: this.invoice.createDate,
                invoiceDueDate: this.invoice.dueDate,
                invoiceId: this.invoice.invoiceId,
                discountRate: this.invoice.discount,
                sousTotal: 0,
                total: 0,
                items: this.invoiceItems,
            }),
        }
    },
    methods: {
        addNewItem: function () {
            this.form.items.push(
                {
                    id: this.form.items.at(-1).id + 1,
                    name: 'Intitulé de la prestation / produit',
                    qte: 1,
                    price: 0
                }
            )
        },
        deleteItem: function (index) {
            this.form.items.splice(index, 1)
        },
        decimalDigits: function (value) {
            return new Intl.NumberFormat('fr-FR', { style: 'currency', currency: 'EUR'}).format(value);
        },
    },
    computed: {
        subTotal: function () {
            let total = this.form.items.reduce(function (accumulator, item) {
                return accumulator + (item.price * item.qte);
            }, 0)
            this.form.sousTotal = this.decimalDigits(total);
            return total;
        },
        discountTotal: function () {
            let total = this.subTotal * (this.form.discountRate / 100);
            return total;
        },
        grandTotal: function () {
            let total = (this.subTotal - this.discountTotal);
            this.form.total = this.decimalDigits(total);
            return total;
        }
    }
};
</script>
