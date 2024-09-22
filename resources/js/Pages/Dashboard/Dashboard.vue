<script setup>
import Template from '@/Layouts/Template.vue';
import Table from '@/Components/Table.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import { onMounted, reactive, ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import Paginator from '@/Components/Paginator.vue';

var dropFilter = reactive({
    filter: 'Todos',
    order: 'Data de criação'
})

const showModalCampaigns = ref(false)

function dropValue(attr, value = null) {
    if (attr === 'clear') {
        dropFilter.filter = 'Todos';
        dropFilter.order = 'Data de criação';
        return;
    }
    dropFilter[attr] = value
}
const tableColumns = [
    'Nome', 'Publico', 'Enviado', 'Análise', 'Ações'
];

const campaign = reactive({
    rows: [],
    all: [],
    links: [],
    per_page: 10,
    current_page: 1,
    total: 30
})

const getCampaings = (url = null) => {
    return axios.get(url || route('campaign.all')).then(response => {
        if (response.data.code === 200) {
            const dataResponse = response.data.data;
            campaign.current_page = dataResponse.current_page
            campaign.links = dataResponse.links
            campaign.per_page = dataResponse.per_page
            campaign.total = dataResponse.total
            campaign.all = dataResponse.data
            campaign.rows = dataResponse.data.map(item => {
                return [
                    item.title,
                    item.segmentation,
                    item.send_at,
                    item.status,
                    {
                        show: showCampaign, 
                        copy: duplicateCampaign, 
                        edit: updateCampaign, 
                        del: deleteCampaign, 
                        data: item
                    }
                ]
            });
            console.log('O que tmeos', campaign);
            
        }
    });
};

function showCampaign(campaign) {
} 
function duplicateCampaign(campaign) {
} 
function updateCampaign(campaign) {
} 
function deleteCampaign(campaign) {
} 

onMounted(() => {
    getCampaings()
})
</script>

<template>
    <Template title="Dashboard">
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between mb-5">
                    <TextInput class="w-72 dark:bg-gray-800 dark:text-gray-300" placeholder="Campaign name"/>
                    <Link :href="route('dashboard.create_campaign')">
                        <PrimaryButton class="bg-app-red">
                            New Campaign
                        </PrimaryButton>
                    </Link>
                </div>
                <section class="flex gap-4">
                    <div class="relative w-fit">
                        <Dropdown align="left" width="60">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none active:bg-gray-50 transition ease-in-out duration-150">
                                        Filtro: <span class="text-blue-700 ml-2">{{ dropFilter.filter }}</span>  
                                        <svg class="text-blue-700 ms-1 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </template>
    
                            <template #content>
                                <div class="w-60">
                                    <DropdownLink as="button" @click="dropValue('filter', 'Todos')">Todos</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('filter', 'Segmentação')">Segmentação</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('filter', 'Publicado')">Publicado</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('filter', 'Não publicado')">Não publicado</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('filter', 'Rascunho')">Rascunho</DropdownLink>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                    <div class="relative w-fit">
                        <Dropdown align="left" width="60">
                            <template #trigger>
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none active:bg-gray-50 transition ease-in-out duration-150">
                                        Ordernar: <span class="text-blue-700 ml-2">{{ dropFilter.order }}</span>  
                                        <svg class="text-blue-700 ms-1 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    </button>
                                </span>
                            </template>
    
                            <template #content>
                                <div class="w-60">
                                    <DropdownLink as="button" @click="dropValue('order', 'Data de criação')">Data de criação</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('order', 'Maior envios')">Maior envios</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('order', 'Menor envios')">Menor envios</DropdownLink>
                                    <DropdownLink as="button" @click="dropValue('order', 'Não publicado')">Não publicado</DropdownLink>
                                </div>
                            </template>
                        </Dropdown>
                    </div>
                    <div class="relative w-fit flex items-center">
                        <button class="text-blue-700 text-sm" @click="dropValue('clear')">Clear</button>
                    </div>
                </section>
                <div class="overflow-hidden mt-5 rounded-lg shadow-app-blue shadow">
                    <Table :cols="tableColumns" :rows="campaign.rows"/>
                    <Paginator class="bg-gray-600 ml-auto  text-white" :current_page="campaign.current_page" :links="campaign.links" :total="campaign.total" :retrieveData="getCampaings"/>
                </div>
            </div>
        </div>
    </Template>
</template>
