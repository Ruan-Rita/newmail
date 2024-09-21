<script setup>
import Template from '@/Layouts/Template.vue';
import axios from 'axios';
import { onMounted, ref } from 'vue';

const data = ref({
    options: {
    chart: {
        id: 'vuechart-example'
    },
    xaxis: {
        categories: [1991, 1992, 1993, 1994, 1995, 1996, 1997, 1998]
    }
    },
    series: [{
    name: 'series-1',
    data: [30, 40, 45, 50, 49, 60, 70, 91]
    }]
});

function retrieveReports() {
    axios.get(route('reports.index')).then(response => {
        console.log("Getting Reports", response.data);
        if (response.status === 200) {
            console.log('Make something');
        }
    })
}

onMounted(() => {
    retrieveReports()
});

</script>
<template>
    <Template title="Reports">
        <div class="py-8">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-2xl font-extrabold mb-5">Reports</h1>
                <div class="flex justify-center mb-10">
                    <apexchart width="800" type="bar" :options="data.options" :series="data.series"></apexchart>
                </div>
                <div class="flex justify-evenly gap-10 flex-wrap">
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">2056</h1>
                        <p class="text-center text-2xl text-app-blue">Customer</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">10</h1>
                        <p class="text-center text-2xl text-app-blue">Campaigns</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">56%</h1>
                        <p class="text-center text-2xl text-app-blue">Taxa de conversão</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">79%</h1>
                        <p class="text-center text-2xl text-app-blue">Taxa de visualização</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">230K</h1>
                        <p class="text-center text-2xl text-app-blue">Emails enviados</p>
                    </div>
                </div>
            </div>
        </div>
    </Template>
</template>