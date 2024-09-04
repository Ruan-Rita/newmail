<script setup>
import { reactive } from 'vue';
import CampaignStepTwo from '@/Pages/Dashboard/Partials/CampaignStepTwo.vue'
import CampaignStepOne from '@/Pages/Dashboard/Partials/CampaignStepOne.vue'
import ProgressCreate from '@/Pages/Dashboard/Partials/ProgressCreate.vue'
import Template from '@/Layouts/Template.vue';


const stage = reactive({
    step: 0,
    campaign: {}
})

const getProgress = function () {
    if (stage.step === 0) {
        return 33;
    }
    if (stage.step === 1) {
        return 66;
    }
    return 100
}
function success(campaign) {
    stage.campaign = campaign
    stage.step += 1;
}
</script>
<template>
    <Template title="Create Campaign">
        <section class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex flex-col gap-4 items-center">
            <section class="max-w-full flex flex-col gap-4 w-full">
                <ProgressCreate :progress="getProgress()"/>
                <CampaignStepOne :success="success" :campaign="stage.campaign" :step="stage.step" v-if="stage.step == 0"/>
                <CampaignStepTwo :success="success" :campaign="stage.campaign" :step="stage.step" v-if="stage.step == 1"/>
            </section>
        </section>
    </Template>
</template>