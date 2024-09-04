<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import axios from 'axios';

const props = defineProps({
    step: {
        type: Number
    },
    campaign: {
        type: Object
    },
    success: {}
})

const formCampaign = useForm({
   title: 'ruan',
   segmentation: 'top segm',
   date: '2001-12-01',
   hour: '14:20',
});
const createCampaign = function() {
    axios.post('/api/campaigns', {
        ...formCampaign.data(),
        send_at: `${formCampaign.date} ${formCampaign.hour}`
    }).then(response => {
        console.log('Success step 1',response.data, response.data.status === 'success');
        if (response.data.status === 'success') {
            props.success(response.data.data)
            return;
        }
        formCampaign.setError(response.data.errors)
    })
}
</script>
<template>
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
</template>