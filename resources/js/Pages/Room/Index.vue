<template>
    <app-layout>
        <template #header>
            Liste des salles
        </template>
        <div class="py-3 px-2" v-for="room in this.roomsList" :key="room.id">
            <div>
                <p>{{room.name}} au prix de {{room.price/100}}€</p>
                <img v-for="picture in room.pictures" :src="picture.url" alt="Photo de la salle" :key="picture.id" width="150px"/>
                <p>Materiel de base</p>
                <ul>
                    <li v-for="material in room.materials_basis" :key="material.id">
                        {{material.quantity}} {{material.material.name}}
                    </li>
                </ul>
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
            roomsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.roomsList);
    }
}
</script>