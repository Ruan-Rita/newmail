<script setup>
import { ref } from 'vue';


const open = ref(false);

</script>
<template>
    <div>
        <h2 id="accordion-collapse-heading-1">
            <button @click="open=!open" type="button" class="outline-none flex items-center justify-between w-full font-medium rtl:text-right ray-800 gap-3">
                <span>
                    <slot name="title"/>
                </span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div :class="{'hidden' : !open }">
            <!-- <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                <p class="mb-2">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                <p>Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
            </div> -->
            <slot />
        </div>
    </div>
</template>