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
            <div v-if="this.client.booking.length > 0">
                <h3 class="text-2xl mt-3">Liste des résérvations</h3>
                <ul class="ml-8 list-disc">
                    <li v-for="booking in this.client.booking" v-bind:key="booking.id">
                        <a :href="route('booking.details', booking.id)">
                            {{dateReservation(booking.start, booking.end)}} dans la salle {{booking.room.name}} ({{total(booking)}}€)
                        </a>
                    </li>
                </ul>
            </div>
            <div v-else>
                <h3 class="text-2xl mt-3">Pas encore de résérvation</h3>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';
import {viewDateReservation, totalBooking} from '../../Library/lib';
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
    },
    methods: {
        dateReservation: (start, end) => viewDateReservation(start, end),
        total: (booking) => totalBooking(booking)
    }
}
</script>