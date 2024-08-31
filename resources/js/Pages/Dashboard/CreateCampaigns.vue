<script setup>
import { reactive, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Template from '@/Layouts/Template.vue';
import axios from 'axios';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';

const formCampaign = useForm({
   title: 'ruan',
   segmentation: 'top segm',
   date: '2001-12-01',
   hour: '14:20',
});
const stage = reactive({
    step: 1,
    campaign: {}
})

const createCampaign = function() {
    axios.post('/api/campaigns', {
        ...formCampaign.data(),
        send_at: `${formCampaign.date} ${formCampaign.hour}`
    }).then(response => {
        if (response.data.status === 'succes') {
            const newCampaign = response.data.data
            stage.campaign = newCampaign
            stage.step = 1
        }
        formCampaign.setError(response.data.errors)
    })
}
const getProgress = function () {
    if (stage.step === 0) {
        return '33%';
    }
    if (stage.step === 1) {
        return '66%';
    }
    return '100%'
}
</script>
<template>
    <Template title="Create Campaign">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex flex-col gap-4 items-center">
            <div class="w-full flex">
                <div class="w-[33%] font-extrabold text-app-blue text-center">Creating</div>
                <div class="w-[33%] font-extrabold text-gray-400 text-center">Content</div>
                <div class="w-[33%] font-extrabold text-gray-400 text-center">Recipient</div>
            </div>
            <div class="w-full bg-gray-300 h-5 rounded-lg">
                <div :style="{width: getProgress()}" class="bg-app-green h-5 rounded-lg"></div>
            </div>
            <section v-if="stage.step == 0" class="max-w-3xl flex flex-col gap-4 w-full">
                <h1 class="font-bold my-10 text-2xl text-app-blue">Nova Campaigns</h1>
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="titleInput" value="Titulo" />
                    <TextInput
                        id="title"
                        ref="titleInput"
                        v-model="formCampaign.title"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="formCampaign.errors.title" class="mt-2" />
                </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="segmentationInput" value="Segmentação" />
                    <TextInput
                        id="segmentationInput"
                        ref="passwordInput"
                        v-model="formCampaign.segmentation"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="formCampaign.errors.password" class="mt-2" />
                </div>
                <div>
                    <h1 class="font-bold text-app-blue">Agendar</h1>
                    <div class="flex gap-6 mt-2">
                        <div class="w-full">
                            <InputLabel for="segmentationInput" value="Data" />
                            <TextInput
                                id="segmentationInput"
                                ref="passwordInput"
                                type="date"
                                v-model="formCampaign.date"
                                class="mt-1 block w-full"
                            />
                        </div>
                        <div class="w-full">
                            <InputLabel for="segmentationInput" value="Horário" />
                            <TextInput
                                id="segmentationInput"
                                ref="passwordInput"
                                type="time"
                                v-model="formCampaign.hour"
                                class="mt-1 block w-full"
                            />
                        </div>
                    </div>
                </div>
                
                
                <ActionMessage :on="formCampaign.recentlySuccessful" class="me-3">
                    Saved.
                </ActionMessage>
                <div class="flex justify-end">
                    <PrimaryButton @click="createCampaign" class="bg-app-blue" :class="{ 'opacity-25': formCampaign.processing }" :disabled="formCampaign.processing">
                        Continue
                    </PrimaryButton>
                </div>
            </section>
            <section v-if="stage.step == 1" class="max-w-3xl flex flex-col gap-4 w-full">
                <h1 class="font-bold my-10 text-2xl text-app-blue">Criar conteudo</h1>
                <div class="flex grap-2 bg-slate-500 min-h-96">
                    <div>
                        <QuillEditor v-model="stage.campaign.content" theme="snow"></QuillEditor>
                    </div>
                    <div v-html="stage.campaign.content"></div>
                </div>
                <div class="flex justify-end">
                    <PrimaryButton @click="createCampaign" class="bg-app-blue" :class="{ 'opacity-25': formCampaign.processing }" :disabled="formCampaign.processing">
                        Continue
                    </PrimaryButton>
                </div>
            </section>
        </section>
    </Template>

</template>