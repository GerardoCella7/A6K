<template>
    <app-layout>
        <template #header>
            Liste des réservations
        </template>
        <div class="flex flex-row flex-wrap justify-center">
            <div v-for="booking in this.bookingsList" v-bind:key="booking.id" class="border-2 border-grey p-2 w-96 m-2 rounded-md">
                <div>
                    <h3 class="text-2xl text-purple-500"><a :href="route('client.details', booking.client.id)">{{booking.client.firstname}} {{booking.client.lastname}}</a></h3>
                    <p>{{booking.room.name}} ({{total(booking)}} €)</p>
                    <small><b><i>{{format(booking.start, booking.end)}}</i></b></small>
                </div>
                <a :href="route('booking.details', booking.id)" class="w-1/4 mt-2 flex items-center justify-center rounded-md bg-gray-700 text-white">Details</a>
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
            bookingsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.bookingsList);
    },
    methods: {
        format: (start, end) => viewDateReservation(start, end),
        total: (booking) => totalBooking(booking)
    }
}
</script>