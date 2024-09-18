<script setup>
import { reactive } from 'vue';
import Template from '@/Layouts/Template.vue';
import WebsiteStepOne from './Partials/WebsiteStepOne.vue';
import WebSiteStepTwo from './Partials/WebSiteStepTwo.vue';
import WebsiteStepThree from './Partials/WebsiteStepThree.vue';

const stage = reactive({
    step: 0,
    campaign: {}
})

function success(campaign) {
    stage.campaign = campaign
    if (stage !== 2) {
        stage.step += 1;
    } else {
        console.log('finished')
    }
}
</script>
<template>
    <Template title="Create Campaign">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex gap-16">
            <section class="flex flex-col gap-4 w-full">
                <WebsiteStepOne    @success="success" :campaign="stage.campaign" :step="stage.step" v-if="stage.step == 0"/>
                <WebSiteStepTwo    @success="success" :campaign="stage.campaign" :step="stage.step" v-else-if="stage.step == 1"/>
                <WebsiteStepThree  @success="success" :campaign="stage.campaign" :step="stage.step" v-else-if="stage.step == 2"/>
            </section>
        </section>
    </Template>
</template>