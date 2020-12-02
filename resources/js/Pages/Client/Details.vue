<template>
    <app-layout>
        <template #header>
            Details du client
        </template>
        <div class="p-4">
            <h3 class="text-2xl text-purple-500">{{this.client.firstname}} {{this.client.lastname}}</h3>
            <table>
                <tr>
                    <td class="p-2">Adresse </td>
                    <td class="p-2">{{this.client.address}}</td>
                </tr>
                <tr>
                    <td class="p-2">E-mail </td>
                    <td class="p-2">{{this.client.email}}</td>
                </tr>
                <tr>
                    <td class="p-2">N° Téléphone </td>
                    <td class="p-2">{{this.client.phone}}</td>
                </tr>
                <tr>
                    <td class="p-2">N° TVA </td>
                    <td class="p-2">{{this.client.tva}}</td>
                </tr>
                <tr>
                    <td class="p-2">Type de compagnie </td>
                    <td class="p-2">{{this.client.company_type}}</td>
                </tr>
            </table>
            <h3 class="text-2xl mt-3">Liste des résérvations</h3>
            <ul class="ml-8 list-disc">
                <!-- TODO: Ajouter la liste et les lien vers la réservation -->
                <li>item</li>
            </ul>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';
export default {
    components : {
        AppLayout
    },
    data() {
        return {
            client: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.client);
    }
}
</script>