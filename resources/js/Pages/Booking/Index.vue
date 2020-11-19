<template>
    <app-layout>
        <template #header>
            Liste des réservations
        </template>
        <div class="py-3 px-2" v-for="booking in this.bookingsList" v-bind:key="booking.id">
            <div>
                Client : {{booking.client.firstname}} {{booking.client.lastname}} <br/>
                (Room : {{booking.room.name}} au prix de {{booking.room.price/100}} €) <br/>
                de <b>{{booking.start}}</b> à <b>{{booking.end}}</b>
            </div>
            <hr/>
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
    }
}
</script>