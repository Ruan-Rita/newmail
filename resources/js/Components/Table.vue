<script setup>
import MiniButtons from './ButtonsActions/MiniButtons.vue';

defineProps({
  cols: {
    required: true,
    default: [],
    type: Array
  },
  rows: {
    required: true,
    default: [],
    type: Array
  },

})
</script>
<template>
  <table class="min-w-full rounded-lg overflow-hidden text-left">
    <thead class="bg-app-blue text-white">
      <tr>
        <th class="px-6 py-4 text-sm font-semibold uppercase" v-for="column of cols">{{ column }}</th>
      </tr>
    </thead>
    <tbody class="[&>*:nth-child(even)]:bg-white dark:[&>*:nth-child(even)]:bg-app-blue-dark">
      <tr class="bg-gray-100 dark:bg-app-black dark:text-gray-300 dark:hover:!bg-gray-600 hover:!bg-red-100 transition duration-200" v-for="row of rows">
        <td class="px-6 py-4 text-gray-900 dark:text-gray-400" v-for="(value, indexColumn) in cols">
          <span v-if="typeof row[indexColumn] == 'string'">{{ row[indexColumn] }}</span>
          <span v-else-if="typeof row[indexColumn] == 'object' && row[indexColumn]">
            <MiniButtons 
              :edit="row[indexColumn].edit " 
              :show="row[indexColumn].show " 
              :copy="row[indexColumn].copy " 
              :del="row[indexColumn].del " 
              :data="row[indexColumn].data"/>
          </span>
          <span v-else>'NONE'</span>
        </td>
      </tr>
    </tbody>
  </table>
</template>