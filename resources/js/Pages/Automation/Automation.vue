<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Template from '@/Layouts/Template.vue';
import { onMounted, reactive, ref } from 'vue';
import SimpleFlowchart from './components/SimpleFlowchart.vue'
import TextInput from '@/Components/TextInput.vue';
const dataFlow = reactive({
  scene: {
    centerX: 1024,
    centerY: 140,
    scale: 1,
    nodes: [
      {
        id: 2,
        x: -700,
        y: -69,
        type: 'Action',
        label: 'test1',
      },
      {
        id: 4,
        x: -357,
        y: 80,
        type: 'Script',
        label: 'test2',
      },
      {
        id: 6,
        x: -557,
        y: 80,
        type: 'Rule',
        label: 'test3',
      }
    ],
    links: [
      {
        id: 3,
        from: 2, // node id the link start
        to: 4,  // node id the link end
      }
    ]
  },
  newNodeType: 0,
  newNodeLabel: '',
  nodeCategory:[
    'rule',
    'action',
    'script',
    'decision',
    'fork',
    'join',
  ],
})

function canvasClick(e) {
  console.log('canvas Click, event:', e)
}

function addNode() {
  let maxID = Math.max(0, ...this.scene.nodes.map((link) => {
    return link.id
  }))
  this.scene.nodes.push({
    id: maxID + 1,
    x: -400,
    y: 50,
    type: this.nodeCategory[this.newNodeType],
    label: this.newNodeLabel ? this.newNodeLabel: `test${maxID + 1}`,
  })
}
function nodeClick(id) {
  console.log('node click', id);
}
function nodeDelete(id) {
  console.log('node delete', id);
}
function linkBreak(id) {
  console.log('link break', id);
}
function linkAdded(link) {
  console.log('new link added:', link);
}

</script>
<template>
  <Template title="Reports">
    <div class="bg-gray-700 h-full flex justify-center items-center flex-col">
      <h1 class="text-white text-4xl">Page not ready</h1>
      <p class="text-white text-2xl mb-10">We're coming soon</p>
      <img alt="Página em construção" src="/img/under-construction.jpg" class="rounded-3xl"/>
    </div>
    
    <!-- <simple-flowchart :scene.sync="dataFlow.scene" 
      @nodeClick="nodeClick"
      @nodeDelete="nodeDelete"
      @linkBreak="linkBreak"
      @linkAdded="linkAdded"
      @canvasClick="canvasClick"
      :height="800">
    </simple-flowchart> -->
  </Template>
</template>