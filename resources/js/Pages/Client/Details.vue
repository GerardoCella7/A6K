<template>
    <app-layout>
        <template #header>
            Details du client
        </template>
        <div class="py-3 px-2">
            <div>
                {{this.client.firstname}} {{this.client.lastname}} -> ({{this.client.address}})
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
            client: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.client);
    }
}
</script>