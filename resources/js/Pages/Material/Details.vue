<template>
    <app-layout>
        <template #header>
            Details du materiel
        </template>
        <div class="m-4">
            <h3 class="text-2xl text-purple-500">{{this.material.name}}</h3>
            <div v-if="this.material.pictures.length > 0" class="flex flex-wrap">
                <img v-for="picture in this.material.pictures" :src="picture.url" alt="Photo du materiel" :key="picture.id" width="250px" class="m-4"/>
            </div>
            <div v-else>
                <img src="/images/no-image.png" alt="Photo de materiel non disponible" width="250px" class="m-4"/>
            </div>
            <p>Type : {{this.material.material_type.type}}</p>
            <p>Quantité : {{this.material.quantity}} piéces</p>
            <p>Prix : {{this.material.price / 100}}</p>
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
            material: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.material);
    }
}
</script>