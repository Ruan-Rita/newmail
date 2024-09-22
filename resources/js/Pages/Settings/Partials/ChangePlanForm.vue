<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FormSection from '@/Components/FormSection.vue';
import { ref } from 'vue';
import axios from 'axios';

const form = useForm({
    plan: null,
});

const props = defineProps({
    settings: {
        type: Object,
    }
})

const plan = ref(props.settings.plan)

function renderPlanActive(current) {
    if (plan.value === current) {
        return {
            'bg-app-blue': true, 
            'text-white': true,
            'border-app-green': true,
        }
    }
    return {
        'border-gray-400': true
    }
}

function changePlan(other) {
    plan.value = other
    form.plan = other
}

const updatePlan = () => {
    if (!props.settings || !form.plan || form.plan === props.settings.plan) {
        return false;
    }
    let successTimeout;
    axios.put(route('settings.update', {settings: props.settings.id}), form.data()).then(response => {
        if (response.status >= 200 && response.status < 300) {
            form.recentlySuccessful = true;
            clearTimeout(successTimeout);
            successTimeout = setTimeout(() => {
                form.recentlySuccessful = false;
            }, 1000);
        } 
    }).catch(error => {
        if (error.response) {
            if (error.response.status === 422) {
                const errors = error.response.data.errors;
                form.setError(errors);
            } else {
                console.error(`Unexpected error: ${error.response.status}`);
            }
        } else {
            console.error("Network error or no response received.");
        }
    });
};
</script>
<template>
    <FormSection @submitted="updatePlan">
        <template #title>
            Change Plan
        </template>

        <template #description>
            Change the plan when you want
        </template>

        <template #form>
            <div class="col-span-12 sm:col-span-4">

                <div class="max-w-xl text-sm text-gray-600">
                    <h1 class="text-lg font-medium text-gray-900">Where to change</h1>
                    Once your plan is changed, you will can change the next month
                </div>
                {{ settings.plan }}
                <div class="mt-5 w-full">
                    <div class="flex gap-7 justify-center flex-wrap w-full">
                        <button type="button" @click="changePlan('free')" class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl" :class="renderPlanActive('free')">Free plan <span>Free plan</span></button>
                        <button type="button" @click="changePlan('basic')" class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl" :class="renderPlanActive('basic')">Basic plan <span>11$ per Month</span></button>
                        <button type="button" @click="changePlan('normal')" class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl" :class="renderPlanActive('normal')">Normal plan <span>22$ per Month</span></button>
                        <button type="button" @click="changePlan('business')" class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl" :class="renderPlanActive('business')">Business plan <span>36$ per Month</span></button>
                    </div>
                </div>
            </div>

            </template>
            <template #actions>
                <ActionMessage :on="form.recentlySuccessful" class="me-3">
                    Saved.
                </ActionMessage>
    
                <PrimaryButton :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Save
                </PrimaryButton>
            </template>
    </FormSection>
</template>
