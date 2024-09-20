<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';
import NoStyle from '@/Components/NoStyle.vue';

const emit = defineEmits(['success']);

const props = defineProps({
    step: {
        type: Number
    },
    campaign: {
        type: Object
    },
    success: {}
})

function renderContent() {
    const data = props.campaign.content.ops[0].insert
    const finalValue = String(data).replace(/(?<!>)\s+(?!<)|&nbsp;/g, ' ');
    return finalValue;
}

function submit() {
    console.log('Success step 2');
    emit('success')
}
</script>
<template>
    <h1 class="font-bold mt-4 mb-4 text-2xl text-app-blue">Criar conteudo</h1>
    <div class="flex gap-2 max-h-[1000px]">
        <div class="max-w-[600px] max-h-[556px]">
            <QuillEditor v-model:content="campaign.content" :content="String" theme="snow"></QuillEditor>
        </div>
        <div class="border w-[600px] min-h-[600px] flex-1 border-orange-400 p-5 rounded overflow-auto">
            <NoStyle v-if="campaign.content && campaign.content.ops" :data="renderContent()"></NoStyle>
            <!-- <iframe class="w-full min-h-[600px]" v-if="campaign.content && campaign.content.ops" :srcdoc="renderContent()" ></iframe> -->
        </div>
    </div>
    <div class="flex justify-end">
        <PrimaryButton @click="submit" class="bg-app-blue">
            Continue
        </PrimaryButton>
    </div>
</template>