<template>
    <app-layout>
        <template #header>
            Liste des salles
        </template>
        <div class="flex flex-row flex-wrap justify-center">
            <div class="py-3 px-2 border-2 border-grey w-96 rounded-md m-2" v-for="room in this.roomsList" :key="room.id">
                <div>
                    <p><a :href="route('room.details', room.id)" class="text-xl">{{room.name}}</a></p>
                    <div v-if="room.pictures.length > 0" class="flex flex-wrap">
                        <img v-for="picture in room.pictures" :src="picture.url" alt="Photo de la salle" :key="picture.id" width="150px" class="m-4"/>
                    </div>
                    <div v-else>
                        <img src="/images/no-image.png" alt="Photo de la salle non disponible" width="150px" class="m-4"/>
                    </div>
                    <div>
                        {{room.price / 100}} € - {{room.seats_number}} places - {{room.area}} m²
                    </div>
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
            roomsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.roomsList);
    }
}
</script>