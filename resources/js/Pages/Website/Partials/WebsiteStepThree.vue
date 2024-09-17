<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';

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

function submit() {
    emit('success')
}

</script>
<template>
    <h1 class="font-bold mt-4 mb-4 text-2xl text-app-blue">Building</h1>
    <div class="flex gap-10">
        <div class="flex-1 bg-gray-100 text-app-blue border border-app-blue font-bold text-lg shadow-sm shadow-app-blue max-w-96 h-80 rounded-2xl flex justify-center items-center">Status 1</div>
        <div class="flex-1 bg-gray-100 text-app-blue border border-app-blue font-bold text-lg shadow-sm shadow-app-blue max-w-96 h-80 rounded-2xl flex justify-center items-center">Status 2</div>
        <div class="flex-1 bg-gray-100 text-app-blue border border-app-blue font-bold text-lg shadow-sm shadow-app-blue max-w-96 h-80 rounded-2xl flex justify-center items-center">Status 3</div>
    </div>
    <div class="flex justify-end">
        <PrimaryButton @click="submit" class="mr-2 bg-app-blue">
            Visualizar
        </PrimaryButton>
        <PrimaryButton @click="submit" class="bg-app-red">
            Meus sites
        </PrimaryButton>
    </div>
</template>