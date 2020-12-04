<template>
    <app-layout>
        <template #header>
            Liste du materiel
        </template>
        <div class="bg-green-200 text-green-500 p-3 m-4" v-if="$page.flash.success">
            {{$page.flash.success}}
        </div>
        <div>
            <a :href="route('material.create')" class="inline-block m-4 py-2 px-4 shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Ajouter un matériel
            </a>
        </div>
        <div class="flex flex-row flex-wrap justify-center">
            <div class="py-3 px-2 border-2 border-grey w-96 rounded-md m-2" v-for="material in this.materialsList" v-bind:key="material.id">
                <div>
                    <p><a :href="route('material.details', material.id)" class="text-xl">{{material.name}}</a></p>
                    <div v-if="material.pictures.length > 0" class="flex flex-wrap">
                        <div v-for="picture in material.pictures" :key="picture.id">
                            <img v-if="picture.url.substr(0, 4) === 'http'" :src="picture.url" alt="Photo du materiel" width="150px" class="m-4"/>
                            <img v-else-if="picture.url.substr(0, 6) === 'images'" :src="filesList[material.id][picture.url]" alt="Photo du materiel" width="150px" class="m-4"/>
                        </div> 
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
            materialsList: this.data,
            filesList: this.files
        }
    },
    props : ['data', 'files'],
    mounted() {
        console.log(this.materialsList);
        console.log(this.filesList);
    }
}
</script>