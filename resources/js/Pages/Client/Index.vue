<template>
    <app-layout>
        <template #header>
            Liste des clients
        </template>
        <div class="py-3 px-2" v-for="client in this.clientsList" v-bind:key="client.id">
            <div>
                {{client.firstname}} {{client.lastname}} - ({{client.address}})
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
            clientsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.clientsList);
    }
}
</script>