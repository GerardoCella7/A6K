<template>
    <app-layout>
        <template #header>
            Détails de la réservation
        </template>
        <div class="p-4">
            <h3 class="text-3xl text-purple-500">
                <a :href="route('client.details', booking.client.id)">
                    {{this.booking.client.firstname}} {{this.booking.client.lastname}}
                </a>
            </h3>
            <p>{{format(this.booking.start, this.booking.end)}}</p>
            <p class="mt-4 text-xl">Salle <b><a :href="route('room.details', this.booking.room.id)">{{this.booking.room.name}}</a></b> au prix de <i>{{this.booking.price/100}} €</i></p>
            
            <div class="ml-4">
                <h4 class="text-2xl">Liste du materiel par defaut</h4>
                <ul class="ml-8 list-disc">
                    <li v-for="material in this.booking.room.materials_basis" v-bind:key="material.id">
                        {{material.material.quantity}} <a :href="route('material.details', material.material.id)">{{material.material.name}}</a>
                    </li>
                </ul>

                <div v-if="this.booking.material_options.length > 0">
                    <h4 class="text-2xl">Liste du materiel en options</h4>
                    <ul class="ml-8 list-disc">
                        <li v-for="material in this.booking.material_options" v-bind:key="material.id">
                            {{material.quantity}} <a :href="route('material.details', material.material.id)">{{material.material.name}}</a> ({{material.price / 100}} €)
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <h4 class="text-2xl">Pas de materiel en options</h4>
                </div>
            </div>
            <div class="mt-6 text-2xl text-blue-500">
                TOTAL : {{total(this.booking)}} €
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
            booking: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.booking);
    },
    methods: {
        format: (start, end) => viewDateReservation(start, end),
        total: (booking) => totalBooking(booking)
    }
}
</script>