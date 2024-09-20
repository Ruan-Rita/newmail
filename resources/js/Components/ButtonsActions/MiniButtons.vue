<script setup>
import EyeSvg from '../Svg/EyeSvg.vue';
import EditSvg from '../Svg/EditSvg.vue';
import ClipBoardSvg from '../Svg/ClipBoardSvg.vue';
import TrashSvg from '../Svg/TrashSvg.vue';

const props = defineProps({
    show: {
        type: [Boolean, Function],
        default: false
    },
    edit: {
        type: [Boolean, Function],
        default: false
    },
    copy: {
        type: [Boolean, Function],
        default: false
    },
    del: {
        type: [Boolean, Function],
        default: false
    },
    data: {
        type: Object
    }
})
</script>

<template>
    <div class="flex gap-1">
        <button v-show="show" @click.stop="show(data)" class="p-1 rounded border border-app-blue fill-app-blue">
            <EyeSvg class="w-5 h-5" />
        </button>
        <button v-show="edit" @click.stop="edit(data)" class="p-1 rounded border border-app-blue fill-app-blue">
            <EditSvg class="w-5 h-5" />
        </button>
        <button v-show="copy" @click.stop="copy(data)" class="p-1 rounded border border-app-blue fill-app-blue">
            <ClipBoardSvg class="w-5 h-5" />
        </button>
        <button v-show="del" @click.stop="del(data)" class="p-1 rounded border border-app-red fill-app-red">
            <TrashSvg class="w-5 h-5" />
        </button>
    </div>
</template>