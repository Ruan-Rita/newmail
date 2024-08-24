<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import ActionMessage from '@/Components/ActionMessage.vue';
import FormSection from '@/Components/FormSection.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Template from '@/Layouts/Template.vue';

const passwordInput = ref(null);
const currentPasswordInput = ref(null);

const form = useForm({
    current_password: '',
    password: '',
    password_confirmation: '',
});

const updatePassword = () => {
    form.put(route('user-password.update'), {
        errorBag: 'updatePassword',
        preserveScroll: true,
        onSuccess: () => form.reset(),
        onError: () => {
            if (form.errors.password) {
                form.reset('password', 'password_confirmation');
                passwordInput.value.focus();
            }

            if (form.errors.current_password) {
                form.reset('current_password');
                currentPasswordInput.value.focus();
            }
        },
    });
};
</script>
<template>
    <Template title="Create Campaign">
        <form class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8 flex flex-col gap-4 items-center">
            <div class="w-full">
                <div class="w-[30%] font-extrabold text-app-blue text-center">Creating</div>
            </div>
            <div class="w-full bg-gray-300 h-5  rounded-lg">
                <div class="w-[30%] bg-app-green h-5 rounded-lg"></div>
            </div>
            <section class="max-w-3xl flex flex-col gap-4 w-full">
                <h1 class="font-bold my-10 text-2xl text-app-blue">Nova Campaigns</h1>
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="titleInput" value="Titulo" />
                    <TextInput
                        id="title"
                        ref="titleInput"
                        v-model="form.title"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="form.errors.title" class="mt-2" />
                </div>
    
                <div class="col-span-6 sm:col-span-4">
                    <InputLabel for="segmentationInput" value="Segmentação" />
                    <TextInput
                        id="segmentationInput"
                        ref="passwordInput"
                        v-model="form.segmentation"
                        class="mt-1 block w-full"
                    />
                    <InputError :message="form.errors.password" class="mt-2" />
                </div>
                <div>
                    <h1 class="font-bold text-app-blue">Agendar</h1>
                    <div class="flex gap-6 mt-2">
                        <div class="w-full">
                            <InputLabel for="segmentationInput" value="Data" />
                            <TextInput
                                id="segmentationInput"
                                ref="passwordInput"
                                type="date"
                                v-model="form.segmentation"
                                class="mt-1 block w-full"
                            />
                        </div>
                        <div class="w-full">
                            <InputLabel for="segmentationInput" value="Horário" />
                            <TextInput
                                id="segmentationInput"
                                ref="passwordInput"
                                type="time"
                                v-model="form.segmentation"
                                class="mt-1 block w-full"
                            />
                        </div>
                    </div>
                </div>
                
                
                <ActionMessage :on="form.recentlySuccessful" class="me-3">
                    Saved.
                </ActionMessage>
                <div class="flex justify-end">
                    <PrimaryButton class="bg-app-blue" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Continue
                    </PrimaryButton>
                </div>
            </section>
        </form>
    </Template>

</template>