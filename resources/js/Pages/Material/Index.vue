<template>
    <app-layout>
        <template #header>
            Liste du materiel
        </template>
        <div class="flex flex-row flex-wrap justify-center">
            <div class="py-3 px-2 border-2 border-grey w-96 rounded-md m-2" v-for="material in this.materialsList" v-bind:key="material.id">
                <div>
                    <p><a :href="route('material.details', material.id)" class="text-xl">{{material.name}}</a></p>
                    <div v-if="material.pictures.length > 0" class="flex flex-wrap">
                        <img v-for="picture in material.pictures" :src="picture.url" alt="Photo du materiel" :key="picture.id" width="150px" class="m-4"/>
                    </div>
                    <div v-else>
                        <img src="/images/no-image.png" alt="Photo de materiel non disponible" width="150px" class="m-4"/>
                    </div>
                    <div>
                        Type : {{material.material_type.type}}
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
            materialsList: this.data
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.materialsList);
    }
}
</script>