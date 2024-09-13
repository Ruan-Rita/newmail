<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Collapse from '@/Components/Collapse.vue';
import Banner from '@/Components/Banner.vue';
import TextInput from '@/Components/TextInput.vue';
import EmailSvg from '@/Components/Svg/EmailSvg.vue';
import SiteSvg from '@/Components/Svg/SiteSvg.vue';
import CursorLightSvg from '@/Components/Svg/CursorLightSvg.vue';
import ShoppingCartSvg from '@/Components/Svg/ShoppingCartSvg.vue';
import ReportsSvg from '@/Components/Svg/ReportsSvg.vue';
import CustomersSvg from '@/Components/Svg/CustomersSvg.vue';
import SupportSvg from '@/Components/Svg/SupportSvg.vue';
import SettingSvg from '@/Components/Svg/SettingSvg.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';


defineProps({
    title: String,
});


const logout = () => {
    router.post(route('logout'));
};

</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <div class="min-h-screen grid grid-cols-[300px_auto] bg-gray-100">
            <div style="background-color: #050F29;">
                <nav class="w-full p-2 flex flex-col h-full max-h-screen py-10">
                    <div class="flex-grow">
                        <div class="flex items-center gap-4 py-3 px-4">
                            <EmailSvg class="w-10 h-10 stroke-app-green"/>
                            <h1 class="text-2xl font-bold text-app-green">
                                NeXMail
                            </h1>
                        </div>
                        <section class="mt-10 flex flex-col gap-7 px-5">
                            <Collapse class="text-white border-r-2 pr-3 border-white" :class="{'border-app-green': route().current('dashboard') || route().current('dashboard.create_campaign')}">
                                <template #title>
                                    <div class="flex gap-4 items-center">
                                        <CursorLightSvg class="fill-transparent stroke-white"/>
                                        <h1 class="text-xl text-white">
                                            Compaigns
                                        </h1>
                                    </div>
                                </template>
                                <div class="px-5 py-2 pl-4mt-2 flex flex-col">
                                    <NavLink :href="route('dashboard')" :class="{'bg-app-green': route().current('dashboard')}" class="hover:text-white rounded-md text-lg">Listas</NavLink>
                                    <NavLink :href="route('dashboard.create_campaign')" :class="{'bg-app-green': route().current('dashboard.create_campaign')}" class="hover:text-white rounded-md text-lg">Nova Campanha</NavLink>
                                </div>
                            </Collapse>
                            <Collapse class="text-white border-r-2 pr-3 border-white">
                                <template #title>
                                    <div class="flex gap-4 items-center">
                                        <SiteSvg class="fill-white" />
                                        <h1 class="text-xl text-white">
                                            Automações
                                        </h1>
                                    </div>
                                </template>
                                <div class="px-5 py-2 bg-blue-950 mt-2">
                                    <h1>Link a1</h1>
                                    <h1>Link a2</h1>
                                    <h1>Link a3</h1>
                                </div>
                            </Collapse>
                            <NavLink :href="route('website')" class="flex gap-4 items-center border-none group group-hover:text-gray-200 text-white ">
                                <ShoppingCartSvg class="group-hover:stroke-gray-400" :class="{'stroke-app-green': route().current('website'), 'stroke-white': !route().current('website')}"/>
                                <h1 class="text-xl group-hover:text-gray-400" :class="{'text-app-green': route().current('website')}">
                                    Website
                                </h1>
                            </NavLink>
                            <NavLink :href="route('reports')" class="flex gap-4 items-center border-none group group-hover:text-gray-200 text-white ">
                                <ReportsSvg class="group-hover:fill-gray-400" :class="{'fill-app-green': route().current('reports'), 'fill-white': !route().current('reports')}"/>
                                <h1 class="text-xl group-hover:text-gray-400" :class="{'text-app-green': route().current('reports')}">
                                    Reports
                                </h1>
                            </NavLink>
                            <NavLink :href="route('customers')" class="flex gap-4 items-center border-none group group-hover:text-gray-200 text-white ">
                                <CustomersSvg class="group-hover:stroke-gray-400" :class="{'stroke-app-green': route().current('customers'), 'stroke-white': !route().current('customers')}" />
                                <span class="text-lg group-hover:text-gray-400" :class="{'text-app-green': route().current('customers')}">
                                    Customers
                                </span>
                            </NavLink>
                        </section>
                    </div>
                    <section class="flex flex-col gap-5 px-5">
                        <NavLink :href="route('customers')" class="flex gap-4 p-0 m-0 items-center border-none group group-hover:text-gray-200 text-white">
                            <SupportSvg class="fill-gray-400"/>
                            <h1 class="text-xl text-gray-400">
                                Supports
                            </h1>
                        </NavLink>

                        <NavLink :href="route('settings')" class="flex gap-4 p-0 m-0 items-center border-none group group-hover:text-gray-200 text-white">
                            <SettingSvg class="stroke-white"/>

                            <h1 class="text-xl text-white">
                                Settings
                            </h1>
                        </NavLink>
                    </section>
                </nav>
            </div>      
            <div>
                <div class="border-b border-gray-200">
                    <nav class="flex justify-between items-center max-w-7xl mx-auto sm:px-6 lg:px-8 py-5">
                        
                        <div class="relative">
                            <Dropdown align="left" width="48">
                                <template #trigger>
                                    <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">
                                    </button>

                                    <span v-else class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 transition ease-in-out duration-150">
                                            Welcome, {{ $page.props.auth.user.name }}

                                            <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Manage Account
                                    </div>

                                    <DropdownLink :href="route('profile.show')">
                                        Profile
                                    </DropdownLink>

                                    <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                        API Tokens
                                    </DropdownLink>

                                    <div class="border-t border-gray-200" />

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button">
                                            Log Out
                                        </DropdownLink>
                                    </form>
                                </template>
                            </Dropdown>
                        </div>
                        
                        <div class="flex items-center gap-3">
                            <TextInput class="w-72" placeholder="Search here . . ."/>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7009 7.14697C9.62899 7.14697 8.64717 8.38197 7.66632 10.607C7.09252 12.1293 6.80727 13.75 6.82587 15.382C8.24252 16.4412 9.94777 17.0173 11.7009 17.029C13.454 17.0173 15.1592 16.4412 16.5759 15.382C16.5948 13.75 16.3099 12.1294 15.7364 10.607C14.7546 8.38197 13.7727 7.14697 11.7009 7.14697Z" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M14.5904 19.2745C14.9209 19.0248 14.9865 18.5545 14.7368 18.224C14.4872 17.8934 14.0168 17.8279 13.6863 18.0775L14.5904 19.2745ZM9.71536 18.0775C9.38484 17.8279 8.91451 17.8934 8.66486 18.224C8.41521 18.5545 8.48078 19.0248 8.81131 19.2745L9.71536 18.0775ZM10.8887 4.75C10.4744 4.75 10.1387 5.08579 10.1387 5.5C10.1387 5.91421 10.4744 6.25 10.8887 6.25V4.75ZM12.513 6.25C12.9272 6.25 13.263 5.91421 13.263 5.5C13.263 5.08579 12.9272 4.75 12.513 4.75V6.25ZM13.6863 18.0775C12.5041 18.9704 10.8975 18.9704 9.71536 18.0775L8.81131 19.2745C10.5285 20.5714 12.8732 20.5714 14.5904 19.2745L13.6863 18.0775ZM10.8887 6.25H12.513V4.75H10.8887V6.25Z" fill="#000000"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24" fill="none">
                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M22 12.0004C22 17.5232 17.5228 22.0004 12 22.0004C10.8358 22.0004 9.71801 21.8014 8.67887 21.4357C8.24138 20.3772 8 19.217 8 18.0004C8 15.7792 8.80467 13.7459 10.1384 12.1762C11.31 13.8818 13.2744 15.0004 15.5 15.0004C17.8615 15.0004 19.9289 13.741 21.0672 11.8572C21.3065 11.4612 22 11.5377 22 12.0004Z" fill="#1C274C"/>
                                <path d="M2 12C2 16.3586 4.78852 20.0659 8.67887 21.4353C8.24138 20.3768 8 19.2166 8 18C8 15.7788 8.80467 13.7455 10.1384 12.1758C9.42027 11.1303 9 9.86422 9 8.5C9 6.13845 10.2594 4.07105 12.1432 2.93276C12.5392 2.69347 12.4627 2 12 2C6.47715 2 2 6.47715 2 12Z" fill="#1C274C"/>
                            </svg>
                        </div>
                    </nav>
                </div>
                <main>
                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
