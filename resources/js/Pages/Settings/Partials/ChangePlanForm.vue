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
    
                <div class="mt-5 w-full">
                    <div class="flex gap-7 justify-center flex-wrap w-full">
                        <button class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl border-gray-400 ">Free plan <span>Free plan</span></button>
                        <button class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl border-gray-400 ">Basic plan <span>11$ per Month</span></button>
                        <button class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl bg-app-blue text-white border-app-green ">Normal plan <span>22$ per Month</span></button>
                        <button class="w-52 flex flex-col justify-center items-center h-32 border-2 rounded-2xl border-gray-400 ">Business plan <span>36$ per Month</span></button>
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
