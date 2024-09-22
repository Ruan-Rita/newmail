<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FormSection from '@/Components/FormSection.vue';
import axios from 'axios';
import { onMounted } from 'vue';

const props = defineProps({
    settings: {
        type: Object,
    }
})

const form = useForm({
    plan_limit_notify: props.settings.plan_limit_notify ? true : false,
    resource_created_notify: props.settings.resource_created_notify ? true : false,
});

const updateNotification = () => {
    if (!props.settings) {
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
    <FormSection @submitted="updateNotification">
        <template #title>
            Notification
        </template>

        <template #description>
            Configure each notification you would like to receive
        </template>

        <template #form>
            <div class="col-span-12 sm:col-span-4">
                <div class="my-5">
                    <h1 class="text-xl font-extrabold mb-2"></h1>
                    <label class="flex items-center gap-3 mb-2 text-gray-700">
                        <input v-model="form.plan_limit_notify" id="notification_limit" type="checkbox" class="border-gray-400" name="limit_out_notification">Enviar email ao atingir limite do plano
                    </label>
                    <label class="flex items-center gap-3 text-gray-700">
                        <input v-model="form.resource_created_notify" id="notification_resource" type="checkbox" class="border-gray-400" name="new_resource_notification">Receber notificação quando criar nova campainha, site ou schedule
                    </label>
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
