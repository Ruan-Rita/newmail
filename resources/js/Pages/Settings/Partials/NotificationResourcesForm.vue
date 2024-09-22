<script setup>
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import FormSection from '@/Components/FormSection.vue';

const form = useForm({
    password: '',
});

</script>

<template>
    <FormSection>
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
                        <input type="checkbox" class="border-gray-400" name="limit_out_notification" id="">Enviar email ao atingir limite do plano
                    </label>
                    <label class="flex items-center gap-3 text-gray-700">
                        <input type="checkbox" class="border-gray-400" name="new_resource_notification" id="">Receber notificação quando criar nova campainha, site ou schedule
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
