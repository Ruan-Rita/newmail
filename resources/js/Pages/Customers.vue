<script setup>
import Template from '@/Layouts/Template.vue';
import Table from '@/Components/Table.vue';
import CreateCustomer from '@/Components/Customer/CreateCustomer.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { onMounted, reactive, ref } from 'vue';
import Paginator from '@/Components/Paginator.vue';
import DialogModal from '@/Components/DialogModal.vue';

const tableColumns = [
    'Nome', 'Email', 'Telefone', 'Endereco', 'Ações'
];

const showCreateCustomer = ref(false)

const customer = reactive({
    rows: [],
    all: [],
    links: [],
    per_page: 10,
    current_page: 1,
    total: 30
})

const getCustomers = (url = null) => {
    return axios.get(url || route('customers.index')).then(response => {
        console.log('O que tmeos', response);
        if (response.data.code === 200) {
            const dataResponse = response.data.data;
            customer.current_page = dataResponse.current_page
            customer.links = dataResponse.links
            customer.per_page = dataResponse.per_page
            customer.total = dataResponse.total
            customer.all = dataResponse.data
            customer.rows = dataResponse.data.map(customerAttr => {
                return [
                    customerAttr.name,
                    customerAttr.email,
                    customerAttr.phone_number,
                    customerAttr.address,
                    {
                        edit: updateCustomer, 
                        del: deleteCustomer, 
                        data: customerAttr
                    }
                ]
            });
            
        }
    });
};

function updateCustomer(customer) {
    console.log('OPa bora abrir o modal de edit customer', customer)
} 
function deleteCustomer(customer) {
    console.log('OPa bora deletar o modal de edit customer', customer)
} 

onMounted(() => {
    getCustomers()
})
</script>

<template>
    <Template title="Dashboard">
        <div class="py-8">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-between mb-5">
                    <TextInput class="w-72" placeholder="Name | Email "/>
                    <PrimaryButton class="bg-app-red" @click.stop="showCreateCustomer = true, console.log('asdasd')">
                        New Customer
                    </PrimaryButton>
                </div>
               
                <div class="overflow-hidden mt-8 rounded-lg shadow-app-blue shadow">
                    <Table :cols="tableColumns" :rows="customer.rows"/>
                    <Paginator class="bg-gray-600 ml-auto  text-white" :current_page="customer.current_page" :links="customer.links" :total="customer.total" :retrieveData="getCustomers"/>
                </div>
            </div>
        </div>
    </Template>
    <DialogModal :closeable="false" :show="showCreateCustomer" @close="showCreateCustomer = false">
        <template #title>
            Create Customer
        </template>

        <template #content>
            <CreateCustomer @close="showCreateCustomer = false" @onCreate="getCustomers()"/>
        </template>
    </DialogModal>
</template>
