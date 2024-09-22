<script setup>

import SectionBorder from '@/Components/SectionBorder.vue';
import UpdatePasswordForm from './Partials/UpdatePasswordForm.vue';
import UpdateProfileInformationForm from './Partials/UpdateProfileInformationForm.vue';
import TwoFactorAuthenticationForm from './Partials/TwoFactorAuthenticationForm.vue';
import LogoutOtherBrowserSessionsForm from './Partials/LogoutOtherBrowserSessionsForm.vue';
import DeleteUserForm from './Partials/DeleteUserForm.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { useForm } from '@inertiajs/vue3';
import Template from '@/Layouts/Template.vue';
import ChangePlanForm from './Partials/ChangePlanForm.vue';
import NotificationResourcesForm from './Partials/NotificationResourcesForm.vue';
import { onMounted, watch } from 'vue';
import axios from 'axios';


const props = defineProps({
    confirmsTwoFactorAuthentication: Boolean,
    sessions: Array,
    settings: Object,
});

</script>
<template>
    <Template title="Settings">
        <div class="py-8">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-2xl font-extrabold mb-5">Configurações da conta</h1>
                <section class="flex flex-col gap-4">
                    <div v-if="$page.props.jetstream.canUpdateProfileInformation">
                        <UpdateProfileInformationForm :user="$page.props.auth.user" />
                    </div>
                    <div v-if="$page.props.jetstream.canUpdatePassword">
                        <UpdatePasswordForm class="mt-10 sm:mt-0" />
                    </div>
                    <div>
                        
                        <ChangePlanForm :settings="settings"/>
                    </div>
                    <div>
                        <NotificationResourcesForm :settings="settings"/>
                    </div>
                    <div v-if="$page.props.jetstream.canManageTwoFactorAuthentication">
                        <TwoFactorAuthenticationForm
                            :requires-confirmation="confirmsTwoFactorAuthentication"
                            class="mt-10 sm:mt-0"
                        />
                    </div>

                    <LogoutOtherBrowserSessionsForm :sessions="sessions" class="mt-10 sm:mt-0" />

                    <div v-if="$page.props.jetstream.hasAccountDeletionFeatures">
                        <DeleteUserForm class="mt-10 sm:mt-0" />
                    </div>
                    
                    <div class="flex justify-end mt-10">
                        <PrimaryButton class="bg-app-blue"> Salvar Configuração</PrimaryButton>
                    </div>
                </section>
            </div>
        </div>
    </Template>
</template>