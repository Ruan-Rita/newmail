<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import EditSvg from '@/Components/Svg/EditSvg.vue';
import TextInput from '@/Components/TextInput.vue';
import Template from '@/Layouts/Template.vue';
import { useForm } from '@inertiajs/vue3';

const formSettings = useForm({
    
})

</script>
<template>
    <Template title="Settings">
        <div class="py-8">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-2xl font-extrabold mb-5">Configurações da conta</h1>
                <section class="flex flex-col gap-4">
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="segmentationInput" value="Owner Account" />
                        <div class="relative">
                            <TextInput
                            id="segmentationInput"
                            ref="passwordInput"
                            v-model="formSettings.segmentation"
                            class="mt-2 block w-full"
                            />
                            <button class="flex absolute right-2 rounded top-2 border px-2 items-center"><EditSvg class="w-5 h-5" />Alterar</button>
                        </div>
                        <InputError :message="formSettings.errors.password" class="mt-2" />
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <InputLabel for="segmentationInput" value="Password Account" />
                        <div class="relative">
                            <TextInput
                            id="segmentationInput"
                            ref="passwordInput"
                            v-model="formSettings.segmentation"
                            class="mt-2 block w-full"
                            />
                            <button class="flex absolute right-2 rounded top-2 border px-2 items-center"><EditSvg class="w-5 h-5" />Alterar</button>
                        </div>
                        <InputError :message="formSettings.errors.password" class="mt-2" />
                    </div>
                    <div class="my-5">
                        <h1 class="text-xl font-extrabold mb-2">Notification</h1>
                        <label class="flex items-center gap-3 mb-2 text-gray-700">
                            <input type="checkbox" class="border-gray-400" name="limit_out_notification" id=""> Enviar email ao atingir limite do plano
                        </label>
                        <label class="flex items-center gap-3 text-gray-700">
                            <input type="checkbox" class="border-gray-400" name="new_resource_notification" id=""> Receber notificação quando criar nova campainha, site ou schedule
                        </label>
                    </div>
                    <h1 class="text-xl font-extrabold my-3">Plans</h1>

                    <div class="flex gap-7 flex-wrap ">
                        <button class="w-64 flex flex-col justify-center items-center h-20 border-2 rounded-2xl border-gray-400 ">Free plan <span>Free plan</span></button>
                        <button class="w-64 flex flex-col justify-center items-center h-20 border-2 rounded-2xl border-gray-400 ">Basic plan <span>11$ per Month</span></button>
                        <button class="w-64 flex flex-col justify-center items-center h-20 border-2 rounded-2xl bg-app-blue text-white border-app-green ">Normal plan <span>22$ per Month</span></button>
                        <button class="w-64 flex flex-col justify-center items-center h-20 border-2 rounded-2xl border-gray-400 ">Business plan <span>36$ per Month</span></button>
                    </div>
                    <div class="flex justify-end mt-10">
                        <PrimaryButton class="bg-app-blue"> Salvar Configuração</PrimaryButton>
                    </div>
                </section>
            </div>
        </div>
    </Template>
</template>