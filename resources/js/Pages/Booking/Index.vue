<template>
    <app-layout>
        <template #header>
            Liste des réservations
        </template>
        <div class="flex flex-row flex-wrap justify-center">
            <div v-for="booking in this.bookingsList" v-bind:key="booking.id" class="border-2 border-black p-2 w-96 m-2 rounded-md">
                <div>
                    <h3 class="text-2xl text-purple-500"><a :href="route('client.details', booking.client.id)">{{booking.client.firstname}} {{booking.client.lastname}}</a></h3>
                    <p>{{booking.room.name}} ({{booking.room.price/100}} €)</p>
                    <small>de <b>{{format(booking.start)}}</b> à <b>{{format(booking.end)}}</b></small>
                </div>
            </div>
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
            bookingsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.bookingsList);
    },
    methods: {
        format: function (datetime) {
            const dt = datetime.split(' ');
            const date = dt[0].split('-');
            const time = dt[1].split(':');

            return `${date[2]}/${date[1]}/${date[0]} à ${time[0]}h${time[1]}`;
        }
    }
}
</script>