<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';
import { ref } from 'vue';

const props = defineProps({
    step: {
        type: Number
    },
    campaign: {
        type: Object
    },
    success: {}
})

const emit = defineEmits(['success']);


const formWebsite = useForm({
    title: 'Tennis pica das galáxias',
    name: 'Pagina de compras',
    subdomain: 'lover-bikes',
    isPusblish: true,
    indexable: true,
    logo: null
});

const show = ref({
    preview: null
})


const createWebsite = function() {
    axios.post(route('website.store'), formWebsite.data(), {
        headers: {
            'Content-Type': 'multipart/form-data', 
        },
    }).then(response => {
        if (response.response) {
            console.log('qual foi o response', response);
        }
    })
}

function handleInputFile(event) {
    const file = event.target.files[0]; // Pega o primeiro (e único) arquivo selecionado
    const maxSize = 10 * 1024 * 1024; // Tamanho máximo de 10 MB em bytes

    // Limpa a mensagem de erro anterior
    let errorMessage = ''
    formWebsite.setError('logo', errorMessage);

    if (file) {
        // Verifica o tipo do arquivo
        if (!file.type.startsWith('image/')) {
            errorMessage = 'Por favor, selecione um arquivo de imagem válido.';
            formWebsite.setError('logo', errorMessage);
            formWebsite.logo = null;
            return;
        }

        // Verifica o tamanho do arquivo
        if (file.size > maxSize) {
            errorMessage = 'O arquivo é muito grande. O tamanho máximo permitido é 10 MB.';
            formWebsite.setError('logo', errorMessage);
            formWebsite.logo = null;
            return;
        }

        // TODO: create component to input file
        // create preview 
        const reader = new FileReader();
        reader.onload = function(e) {
            const base64String = e.target.result;
            show.value.preview = base64String
        };
        
        formWebsite.logo = file;
        reader.readAsDataURL(file)
    }
}

</script>
<template>
    <h1 class="font-bold my-10 text-2xl text-app-blue">Nova Campaigns</h1>
    <div class="col-span-6 sm:col-span-4">
        <InputLabel for="nameInput" value="Name of page" />
        <TextInput
            id="nameInput"
            v-model="formWebsite.name"
            class="mt-1 block w-full"
        />
        <InputError :message="formWebsite.errors.name" class="mt-2" />
    </div>
    <div class="col-span-6 sm:col-span-4">
        <InputLabel for="titleInput" value="Titulo" />
        <TextInput
            id="titleInput"
            v-model="formWebsite.title"
            class="mt-1 block w-full"
        />
        <InputError :message="formWebsite.errors.title" class="mt-2" />
    </div>

    <div class="col-span-6 sm:col-span-4">
        <InputLabel for="subdomain" value="URL" />
        <TextInput
            id="subdomain"
            v-model="formWebsite.subdomain"
            class="mt-1 block w-full"
        />
        <InputError :message="formWebsite.errors.subdomain" class="mt-2" />
    </div>
    <div>
        <h1 class="font-bold text-app-blue my-5">Configurar</h1>
        <div class="flex content-between">
            <div class="w-1/2">
                <label class="text-gray-700">
                    <div class="mr-5">Status:</div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" v-model="formWebsite.isPusblish" class="border-gray-400" id=""> {{ formWebsite.isPusblish ? "Live" : "Rascunho" }}
                    </div>
                </label>
                <div class="my-5"></div>
                <label class="text-gray-700">
                    <div class="mr-5">Indexar:</div>
                    <div class="flex items-center gap-3">
                        <input type="checkbox" v-model="formWebsite.indexable" class="border-gray-400" id=""> {{ formWebsite.indexable ? "Ativado" : "Desativado" }}
                    </div>
                </label>
            </div>
            <div class="w-1/2">
                <h3 class="font-bold">Add logotipo (16x16):</h3>
                <div>
                    <img v-if="show.preview" :src="show.preview" alt="preview" class="my-5 w-20 h-20 object-cover">
                    <input v-if="!show.preview" v-on:change="handleInputFile" type="file" id="fileInput" accept="image/*" />
                    <button class="bg-app-red text-white px-5 py-3 rounded-md" v-if="show.preview" @click="show.preview = null, formWebsite.logo=null">Remover</button>
                    <InputError :message="formWebsite.errors.logo" class="mt-2" />
                </div>
            </div>
        </div>
    </div>
    <ActionMessage :on="formWebsite.recentlySuccessful" class="me-3">
        Saved.
    </ActionMessage>
    <div class="flex justify-end">
        <PrimaryButton @click="createWebsite" class="bg-app-blue" :class="{ 'opacity-25': formWebsite.processing }" :disabled="formWebsite.processing">
            Continue
        </PrimaryButton>
    </div>  
</template>