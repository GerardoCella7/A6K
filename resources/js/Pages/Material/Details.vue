<template>
    <app-layout>
        <template #header>
            Details du materiel
        </template>
        <div class="m-4">
            <h3 class="text-2xl text-purple-500">{{this.material.name}}</h3>
            <div v-if="this.material.pictures.length > 0" class="flex flex-wrap">
                <div v-for="picture in material.pictures" :key="picture.id">
                    <img v-if="picture.url.substr(0, 4) === 'http'" :src="picture.url" alt="Photo du materiel" width="150px" class="m-4"/>
                    <img v-else-if="picture.url.substr(0, 6) === 'images'" :src="filesList[picture.url]" alt="Photo du materiel" width="150px" class="m-4"/>
                </div> 
                <!-- <img v-for="picture in this.material.pictures" :src="picture.url" alt="Photo du materiel" :key="picture.id" width="250px" class="m-4"/> -->
            </div>
            <div v-else>
                <img src="/images/no-image.png" alt="Photo de materiel non disponible" width="250px" class="m-4"/>
            </div>
            <p>Type : {{this.material.material_type.type}}</p>
            <p>Description : {{this.material.description}}</p>
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
            material: this.data,
            filesList: this.files
        }
    },
    props : ['data', 'files'],
    mounted() {
        console.log(this.material);
        console.log(this.filesList);
    }
}
</script>