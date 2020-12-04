<template>
    <app-layout>
        <template #header>
            Ajout d'un materiel
        </template>
        <div class="flex justify-center mt-4">
            <form class="w-full max-w-lg" @submit.prevent="submit">
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                            Nom
                        </label>
                        <input class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight" id="name" type="text" v-model="form.name">
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="price">
                            Prix
                        </label>
                        <input class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight" id="price" type="number" v-model="form.price">
                    </div>
                    <div class="w-full md:w-1/4 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="quantity">
                            Quantité
                        </label>
                        <input class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight" id="quantity" type="number" v-model="form.quantity">
                    </div>
                </div>
                <div class="w-full">
                    <label for="description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        Description
                    </label>
                    <div class="mt-1">
                        <textarea id="description" rows="5" class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight" v-model="form.description"></textarea>
                    </div>
                </div>
                <div class="w-full">
                    <label for="type" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Type</label>
                    <select id="type" class="block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight" v-model="form.material_type_id">
                        <option v-for="material in this.materialsType" :key="material.id" :value="material.id">{{material.type}}</option>
                    </select>
                </div>
                <div class="w-full">
                    <label for="images" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Selection d'images</label>
                    <input type="file" name="imageFile[]" @change="updateIMG" class="custom-file-input" id="images" multiple="multiple"/>
                    <div  v-for="(image, key) in form.files" :key="key">
                        <img :src="image.src" class="preview" style="width:200px;"/>
                        {{ image.file.name }}
                    </div>
                </div>
                <div class="w-full">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Enregistrer
                    </button>
                </div>
            </form>
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
            materialsType: this.data,
            form: {
                name: null,
                description: null,
                price: 0,
                quantity: 0,
                material_type_id: 1,
                files: []
            }
        }
    },
    props : ['data'],
    mounted() {
        console.log(this.materialsType);
    },
    methods: {
        submit() {
            var data = new FormData();
            data.append('name', this.form.name || '');
            data.append('description', this.form.description || '');
            data.append('price', this.form.price || '');
            data.append('quantity', this.form.quantity || '');
            data.append('material_type_id', this.form.material_type_id || '');
            data.append('nb_files', this.form.files.length);
            for(let i=0; i<this.form.files.length; i++)
                data.append(`files${i}`, this.form.files[i].file, this.form.files[i].src);

            this.$inertia.post('/material/create', data);
        },
        updateIMG(e) {
            var selectedFiles = e.target.files;
            for (let i = 0; i < selectedFiles.length; i++) {
                let img = {
                    src: URL.createObjectURL(selectedFiles[i]),
                    file: selectedFiles[i],
                }
                this.form.files.push(img);
            }
        }
    }
}
</script>