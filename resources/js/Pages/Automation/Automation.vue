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
    <!-- <div class="bg-green-100 pt-5">
      <h1 class="text-center font-bold">Simple flowchart</h1>
      <div class="relative flex justify-center py-5">
        <select class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" v-model="dataFlow.newNodeType">
          <option v-for="(item, index) in dataFlow.nodeCategory" :key="index" :value="index">{{item}}</option>
        </select>
        <TextInput type="text" v-model="dataFlow.newNodeLabel" placeholder="Input node label" />
        <PrimaryButton class="bg-app-blue" @click="addNode">ADD</PrimaryButton>
      </div>
    </div> -->
    
    <simple-flowchart :scene.sync="dataFlow.scene" 
      @nodeClick="nodeClick"
      @nodeDelete="nodeDelete"
      @linkBreak="linkBreak"
      @linkAdded="linkAdded"
      @canvasClick="canvasClick"
      :height="800">
    </simple-flowchart>
  </Template>
</template>