<template>
    <app-layout>
        <template #header>
            Liste des clients
        </template>
        <div class="px-4 py-1" v-for="client in this.clientsList" v-bind:key="client.id">
            <a :href="route('client.details', client.id)" class="text-xl">
                {{client.firstname}} {{client.lastname}}
            </a>
            ({{client.booking.length}} Résérvation)
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
            clientsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.clientsList);
    }
}
</script>