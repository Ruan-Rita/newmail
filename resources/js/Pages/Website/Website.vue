<script setup>
import Paginator from '@/Components/Paginator.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import Table from '@/Components/Table.vue';
import Template from '@/Layouts/Template.vue';
import { Link } from '@inertiajs/vue3';
import { computed, onMounted, ref } from 'vue';

const websites = ref({
    current_page: 0,
    data: [],
    links: [],
    total: 0,
    per_page: 0,
});

const tableColumns = ref([
    'Name',
    'Title',
    'Status',
    'Created',
    'Actions'
]);

const rowsWebsites = computed(() => {
    return websites.value.data.map(websiteItem => {
        return [
            websiteItem.name,
            websiteItem.title,
            websiteItem.publish_text,
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

function getWebsites(url = null) 
{
    return axios.get(url || route('website.index')).then(response => {
        if (response.data.code === 200) {
            const dataResponse = response.data.data;
            websites.value = dataResponse
        }
    });
}

onMounted(() => {
    getWebsites()
});

</script>
<template>
    <Template title="Reports">
        <div class="py-8">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <section class="flex justify-center">
                    <div class="w-3/4">
                        <h1 class="text-2xl font-extrabold mb-5">Websites</h1>
                        <p class="text-gray-700">
                            Você pode criar páginas personalizadas que complementam suas campanhas de email marketing, tornando suas interações com o cliente ainda mais completas e profissionais.
                        </p>
                    </div>

                    <Link class="w-1/4 flex justify-end" :href="route('website.create')">
                        <PrimaryButton class="bg-app-red h-fit">
                            New Website
                        </PrimaryButton>
                    </Link>
                </section>
            
                <div class="overflow-hidden mt-8 rounded-lg shadow-app-blue shadow">
                    <Table :cols="tableColumns" :rows="rowsWebsites"/>
                    <Paginator class="bg-gray-600 ml-auto  text-white" :current_page="websites.current_page" :links="websites.links" :total="websites.total" :retrieveData="getWebsites"/>
                </div>
            </div>
        </div>
    </Template>
</template>