<script setup>
const props = defineProps({
    progress: {
        type: Number ,
        required: true
    }
})

function getStepOne() {
    return props.progress === 33 || props.progress === 66 || props.progress === 100
}

function getStepTwo() {
    return props.progress === 66 || props.progress === 100
}

function getStepThree() {
    return props.progress === 100
}
</script>
<template>
    <div class="w-full flex">
        <div class="w-[33%] font-extrabold text-center" :class="{'text-app-blue': getStepOne(), 'text-gray-400': !getStepOne()}">Creating</div>
        <div class="w-[33%] font-extrabold text-center" :class="{'text-app-blue': getStepTwo(), 'text-gray-400': !getStepTwo()}">Content</div>
        <div class="w-[33%] font-extrabold text-center" :class="{'text-app-blue': getStepThree(), 'text-gray-400': !getStepThree()}">Recipient</div>
    </div>
    <div class="w-full bg-gray-300 h-5 rounded-lg">
        <div :style="{width: `${progress}%`}" class="bg-app-green h-5 rounded-lg"></div>
    </div>
</template>