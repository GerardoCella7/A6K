<template>
    <app-layout>
        <template #header>
            Liste du materiel
        </template>
        <div class="py-3 px-2" v-for="material in this.materialsList" v-bind:key="material.id">
            <div>
                {{material.name}} -> (type : {{material.materialType.type}})
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
            materialsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.materialsList);
    }
}
</script>