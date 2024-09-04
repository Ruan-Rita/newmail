<script setup>
const props = defineProps({
    progress: {
        type: Number ,
        required: true
    }
})
console.log('props.progressprops.progress', props.progress);

const stepOne = props.progress === 33 || props.progress === 66 || props.progress === 100
const stepTwo = props.progress === 66 || props.progress === 100
const stepThree = props.progress === 100
</script>
<template>
    <div class="w-full flex">
        <div class="w-[33%] font-extrabold text-center" :class="{'text-app-blue': stepOne, 'text-gray-400': !stepOne}">Creating</div>
        <div class="w-[33%] font-extrabold text-center" :class="{'text-app-blue': stepTwo, 'text-gray-400': !stepTwo}">Content</div>
        <div class="w-[33%] font-extrabold text-center" :class="{'text-app-blue': stepThree, 'text-gray-400': !stepThree}">Recipient</div>
    </div>
    <div class="w-full bg-gray-300 h-5 rounded-lg">
        <div :style="{width: `${progress}%`}" class="bg-app-green h-5 rounded-lg"></div>
    </div>
</template>