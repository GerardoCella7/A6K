<template>
    <app-layout>
        <template #header>
            Liste du materiel
        </template>
        <div class="py-3 px-2" v-for="material in this.materialsList" v-bind:key="material.id">
            <div>
                {{material.name}} -> (type : {{material.material_type.type}})
            </div>
            <img v-for="picture in material.pictures" :src="picture.url" alt="Photo du materiel" :key="picture.id" width="150px"/>  
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