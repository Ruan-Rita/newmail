<script setup>
import { Link } from '@inertiajs/vue3';
import { onUpdated, reactive, onBeforeMount, onUnmounted, computed } from 'vue';

const props = defineProps({
    links: {
        default: [],
        type: Array,
    },
    total: {
        default: 0,
        type: Number,
    },
    retrieveData: {
        required: true
    },
    current_page: {
        default: 1,
        type: Number,
        required: true
    }
})


const processedData = computed(() => {
    const show = props.links
    if (show.length == 0) {
        return [];
    }
    const position = props.current_page -1 ;
    const pages = show.slice(1, show.length-1)
    
    let firstPart = position - 1 < 0 ? 0: position - 1 ;
    let firstPartCut = position + 2;
    let lastPages = [];

    if (position === pages.length -1) {
        firstPart -= 1;
    }
    if (position === 0) {
        firstPartCut += 1;
    }

    const firstPages = pages.slice(firstPart, firstPartCut);
    const result = firstPages.concat(lastPages)

    result.push(show[show.length-1])
    result.unshift(show[0])
    return result;
});

</script>
<template>
    <div class="bg-app-green w-fit px-3 py-1 m-3 rounded-lg">
        <button @click="retrieveData(link.url)" :class="{'bg-green-400': link.active}" class="p-2 hover:bg-green-400 rounded-lg" v-if="processedData" v-for="link in processedData" v-html="''+link.label" ></button>
    </div>
</template>