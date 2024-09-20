<script setup>
import { reactive } from 'vue';
import Template from '@/Layouts/Template.vue';
import WebsiteStepOne from './Partials/WebsiteStepOne.vue';
import WebSiteStepTwo from './Partials/WebSiteStepTwo.vue';
import ConfirmationModal from '@/Components/ConfirmationModal.vue';
import NavLink from '@/Components/NavLink.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SuccessModal from '@/Components/SuccessModal.vue';

const stage = reactive({
    step: 3,
    website: {}
})

function success(website) {
    stage.website = website
    if (stage.step <= 3) {
        stage.step += 1;
    } 
}
</script>
<template>
    <Template title="Create website">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex gap-16">
            <section class="flex flex-col gap-4 w-full">
                <WebsiteStepOne    @success="success" :website="stage.website" :step="stage.step" v-if="stage.step == 0"/>
                <WebSiteStepTwo    @success="success" :website="stage.website" :step="stage.step" v-else-if="stage.step == 1"/>
            </section>
        </section>
        <SuccessModal :closeable="false" :show="true">
            <template #title>
                Success
            </template>

            <template #content>
                <p>Vou acabou de finalizar seu novo site, logo em breve estará pronto para uso. Subindo seu site dentre alguns minutos.</p>
                <NavLink :href="route('website')" class="flex gap-4 items-center border-none group group-hover:text-gray-200 text-white ">
                    <SecondaryButton class="mr-2" @click="optionCustomer.deleteConfirmation = false">
                        Cancel
                    </SecondaryButton>
                </NavLink>
                <NavLink :href="route('website')" class="flex gap-4 items-center border-none group group-hover:text-gray-200 text-white ">
                    <PrimaryButton class="bg-app-blue">
                        Meu sites
                    </PrimaryButton>
                </NavLink>

            </template>
        </SuccessModal>
    </Template>
</template>