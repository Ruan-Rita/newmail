<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Template from '@/Layouts/Template.vue';
import { onMounted, ref } from 'vue';
const container = ref(null)
const buttonStart = ref(null)

const componentActions = ref([
  { id: 1, name: 'Item 1', top: '40px', left: '10px', ref: null },

])

onMounted(() => {
  componentActions.value[0].left = `${(container.value.clientWidth/2)-(buttonStart.value.clientWidth/2)}px`
  console.log('o que temos', buttonStart.value.clientWidth);
  
})

const showSpans = ref(false)
function handleShowOptions() {

}
</script>
<template>
  <Template title="Reports">
    <!-- Referência ao contêiner com ref="container" -->
    <div ref="container" class="relative min-h-screen bg-gray-900">
      <div class="relative w-fit" :style="{ top: componentActions[0].top, left: componentActions[0].left, position: 'absolute' }">
        <button v-on:click="showSpans = !showSpans" ref="buttonStart" class="btn-actions text-white px-5 py-3 rounded-lg bg-red-500">New</button>
        <div v-show="showSpans" class="absolute bg-gray-200 right-full bottom-0 h-full mr-5">
          adasds
        </div>
        <div v-show="showSpans" class="absolute bg-gray-200 left-full bottom-0 text-red-700 ml-5">Span Left</div>
        <div v-show="showSpans" class="absolute bg-gray-200 top-full mt-5">Span Right</div>
      </div>
    </div>
  </Template>
</template>