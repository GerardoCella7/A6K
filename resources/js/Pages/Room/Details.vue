<template>
    <app-layout>
        <template #header>
            Details de la salle
        </template>
        <div class="p-4">
            <h3 class="text-2xl text-purple-500">{{this.room.name}}</h3>
            <div v-if="this.room.pictures.length > 0" class="flex">
                <img v-for="picture in this.room.pictures" :src="picture.url" alt="Photo de la salle" :key="picture.id" width="250px" class="m-4"/>
            </div>
            <div v-else>
                <img src="/images/no-image.png" alt="Photo de la salle non disponible" width="250px" class="m-4"/>
            </div>
            <div>
                <h3 class="text-xl">Prix : {{this.room.price/100}} €</h3>
                <h3 class="text-xl mt-3">Materiel de base</h3>
                <ul class="ml-8 list-disc">
                    <li v-for="material in this.room.materials_basis" :key="material.id">
                        {{material.quantity}}  <a :href="route('material.details', material.material.id)">{{material.material.name}}</a>
                    </li>
                </ul>
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
            room: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.room);
    }
}
</script>