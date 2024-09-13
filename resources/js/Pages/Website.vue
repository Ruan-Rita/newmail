<script setup>
import Paginator from '@/Components/Paginator.vue';
import Table from '@/Components/Table.vue';
import Template from '@/Layouts/Template.vue';
import { computed, onMounted, ref } from 'vue';

const websites = ref({
    current_page: 0,
    data: [
        {
            name: 'teste',
            slug: 'teste-soft',
            status: 'published',
            created_at: '20/08/2024',
        },
        {
            name: 'teste',
            slug: 'teste-soft',
            status: 'published',
            created_at: '20/08/2024',
        },
        {
            name: 'teste',
            slug: 'teste-soft',
            status: 'published',
            created_at: '20/08/2024',
        },
    ],
    links: [
  {
    "url": null,
    "label": "&laquo; Previous",
    "active": false
  },
  {
    "url": "http://127.0.0.1:8000/api/customers?page=1",
    "label": "1",
    "active": true
  },
  {
    "url": "http://127.0.0.1:8000/api/customers?page=2",
    "label": "2",
    "active": false
  },
  {
    "url": "http://127.0.0.1:8000/api/customers?page=3",
    "label": "3",
    "active": false
  },
  {
    "url": "http://127.0.0.1:8000/api/customers?page=2",
    "label": "Next &raquo;",
    "active": false
  }
],
    total: 3,
})
const tableColumns = ref([
    'Name',
    'Slug',
    'Status',
    'Created',
    'Actions'
]);

const rowsWebsites = computed(() => {
    return websites.value.data.map(websiteItem => {
        return [
            websiteItem.name,
            websiteItem.slug,
            websiteItem.status,
            websiteItem.created_at,
            {
                edit: editWebsiteCustomer, 
            }
        ]
    })
})

function editWebsiteCustomer() 
{

}

function getWebsites() 
{

}

</script>
<template>
    <Template title="Reports">
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-2xl font-extrabold mb-5">Websites</h1>
            
                <div class="overflow-hidden mt-8 rounded-lg shadow-app-blue shadow">
                    <Table :cols="tableColumns" :rows="rowsWebsites"/>
                    <Paginator class="bg-gray-600 ml-auto  text-white" :current_page="websites.current_page" :links="websites.links" :total="websites.total" :retrieveData="getWebsites"/>
                </div>
            </div>
        </div>
    </Template>
</template>