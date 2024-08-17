<script setup>
import EyeSvg from '../Svg/EyeSvg.vue';
import EditSvg from '../Svg/EditSvg.vue';
import ClipBoardSvg from '../Svg/ClipBoardSvg.vue';
import TrashSvg from '../Svg/TrashSvg.vue';

defineProps({
    show: {

    },
    edit: {

    },
    copy: {

    },
    delete: {

    }
})
</script>

<template>
    <div class="flex gap-1">
        <button class="p-1 rounded border border-app-blue fill-app-blue">
            <EyeSvg class="w-5 h-5" />
        </button>
        <button class="p-1 rounded border border-app-blue fill-app-blue">
            <EditSvg class="w-5 h-5" />
        </button>
        <button class="p-1 rounded border border-app-blue fill-app-blue">
            <ClipBoardSvg class="w-5 h-5" />
        </button>
        <button class="p-1 rounded border border-app-red fill-app-red">
            <TrashSvg class="w-5 h-5" />
        </button>
    </div>
</template>