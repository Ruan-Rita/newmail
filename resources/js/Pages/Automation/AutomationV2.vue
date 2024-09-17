<script setup>
import Template from '@/Layouts/Template.vue';
import { onMounted, ref } from 'vue';

// Itens reativos com posição inicial para dois itens
const items = ref([
  { id: 1, name: 'Item 1', top: '10px', left: '10px', ref: null },
  { id: 2, name: 'Item 2', top: '100px', left: '10px', ref: null },
]);

const connection =  ref([
  { id: 1, name: 'connector 1', top: '10px', left: '10px' },
]);

// Referência ao contêiner para pegar suas dimensões
const container = ref(null);
let draggedItemIndex = null;

function onDragStart(eve, index) {
  // Armazena o índice do item que está sendo arrastado
  draggedItemIndex = index;
}

function changePosition(eve) {
  eve.preventDefault();

  // Verifica se o índice do item arrastado é válido
  if (draggedItemIndex === null) {
    return; // Cancela se não houver item sendo arrastado
  }

  const containerRect = container.value.getBoundingClientRect();

  const mouseX = eve.clientX; // Posição x do mouse no viewport
  const mouseY = eve.clientY; // Posição y do mouse no viewport

  const newTop = mouseY - containerRect.top; // Posição relativa ao container
  const newLeft = mouseX - containerRect.left; // Posição relativa ao container

  // Atualiza as coordenadas do item específico baseado no índice
  items.value[draggedItemIndex].top = `${newTop}px`;
  items.value[draggedItemIndex].left = `${newLeft}px`;

  // Limpa o índice após o drop
  draggedItemIndex = null;
}

function allowDrop(eve) {
  eve.preventDefault();
}
function calc(item1, item2) {
  console.log('asdasd', item1,item1.top);
  
  const valorParseA_top = Number(item1.top.replace('px', ''));
  const valorParseA_left = Number(item1.left.replace('px', ''));

  // d = Raiz( w * w + h * h)
  const valorADiagonal = Math.sqrt(Math.pow(valorParseA_top,2) + Math.pow(valorParseA_left,2))
  
  // -----------------------------------
  const valorParseB_top = Number(item2.top.replace('px', ''));
  const valorParseB_left = Number(item2.left.replace('px', ''));

  // d = Raiz( w * w + h * h)
  const valorBDiagonal = Math.sqrt(Math.pow(valorParseB_top,2) + Math.pow(valorParseB_left,2))

  return Math.abs(valorADiagonal - valorBDiagonal)+'px'
}
onMounted(() => {
  console.log("container", container.value.clientWidth)
  console.log("Item 1", items.value[0].ref)
  console.log("Item 2", items.value[1].ref)
  items.value[0].left = `${container.value.clientWidth/2}px`
})
</script>
<template>
  <Template title="Reports">
    <!-- Referência ao contêiner com ref="container" -->
    <div ref="container" class="relative min-h-screen bg-gray-900" @dragover="allowDrop" @drop="changePosition">
      <div 
        v-for="(item, index) in items" 
        :key="item.id" 
        class="rounded-md bg-white border border-gray-300 w-64 absolute"
        draggable="true"
        @dragstart="onDragStart($event, index)"
        :style="{ top: item.top, left: item.left, position: 'absolute' }"
        :ref="item.ref"
      >
        <h3 class="px-5 py-3 bg-yellow-200">{{ item.name }}</h3>
        <p class="p-5">Dispatch email when</p>
      </div>
      <span :style="{ width: calc(items[0], items[1]), height: '10px', backgroundColor: 'red', top: connection[0].top, left: connection[0].left, position: 'absolute'}"></span>
    </div>
  </Template>
</template>
