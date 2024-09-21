<script setup>
import Template from '@/Layouts/Template.vue';
import axios from 'axios';
import { computed, onMounted, ref } from 'vue';

const infoDataChart = computed(() => {
    const infos = Array.from(reports.value.conversionRates)
    
    if (infos.length > 0) {
        return infos.map(format => format.conversion_rate_percents);
    }

    return []
})

const dataChart = ref({
    options: {
        chart: {
            id: 'vuechart-reports'
        },
        xaxis: {
            categories: getMonthsOfYear()
        }
    },
    series: [{
    name: 'The Best',
    data: infoDataChart
    }]
});

const reports = ref({
    campaignOpens: 0,
    campaigns: 0,
    conversionRateTotal: 0,
    conversionRates: 0,
    customers: 0,
    emailsSent: 0,
})



function retrieveReports() {
    axios.get(route('reports.index')).then(response => {
        console.log("Getting Reports", response.data);
        if (response.status === 200) {
            console.log('Make something',response.data.data);
            const retrievedReport = response.data.data;

            reports.value = {
                campaignOpens: retrievedReport.opensRateTotalInPercents,
                campaigns: retrievedReport.campaigns,
                conversionRateTotal: retrievedReport.conversionRateTotalInPercents,
                conversionRates: retrievedReport.conversionRatesInPercents,
                customers: retrievedReport.customers,
                emailsSent: retrievedReport.emailsSentFormatted
            }
        }
    })
}

function getMonthsOfYear() {
    return [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "Octobers", "November", "December"
    ];
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
                    <apexchart width="850" type="bar" :options="dataChart.options" :series="dataChart.series"></apexchart>
                </div>
                <div class="flex justify-evenly gap-10 flex-wrap">
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">{{ reports.customers }}</h1>
                        <p class="text-center text-2xl text-app-blue">Customer</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">{{  reports.campaigns }}</h1>
                        <p class="text-center text-2xl text-app-blue">Campaigns</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">{{reports.conversionRateTotal}}%</h1>
                        <p class="text-center text-2xl text-app-blue">Taxa de conversão</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">{{ reports.campaignOpens }}%</h1>
                        <p class="text-center text-2xl text-app-blue">Taxa de visualização</p>
                    </div>
                    <div class="px-16 py-5 bg-blue-500 rounded-md">
                        <h1 class="text-center text-4xl text-white">{{reports.emailsSent}}</h1>
                        <p class="text-center text-2xl text-app-blue">Emails enviados</p>
                    </div>
                </div>
            </div>
        </div>
    </Template>
</template>