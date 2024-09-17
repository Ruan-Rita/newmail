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
    <div class="w-5 h-screen">
        <div class="h-[33%] font-extrabold flex items-center" :class="{'text-app-blue': getStepOne(), 'text-gray-400': !getStepOne()}">Creating</div>
        <div class="h-[33%] font-extrabold flex items-center" :class="{'text-app-blue': getStepTwo(), 'text-gray-400': !getStepTwo()}">Content</div>
        <div class="h-[33%] font-extrabold flex items-center" :class="{'text-app-blue': getStepThree(), 'text-gray-400': !getStepThree()}">Recipient</div>
    </div>
    <div class="w-5 bg-gray-300 h-screen  rounded-lg">
        <div :style="{height: `${progress}%`}" class="bg-app-red w-5 rounded-lg"></div>
    </div>
</template>