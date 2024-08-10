<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ShoppingCartSvg from '@/Components/Svg/ShoppingCartSvg.vue';



</script>

<template>
    <Head title="Sender Email" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header class="bg-white lg:mx-0 mx-4 flex justify-center">
            <div class="flex items-center justify-between max-w-5xl w-full py-4">
                <h1 class="h-fit font-bold text-gray-900 text-2xl">NeXMail</h1>
                <div class="flex gap-3 items-center">
                    <Link class="outline-none" :href="route('login')"> Login</Link>
                    <Link class="bg-orange-500 text-white px-3 py-2 rounded" :href="route('register')">Teste Gratuitamente</Link>
                </div>
            </div>
        </header>

        <main>
            <div class="flex justify-center" style="background-image: linear-gradient(to bottom, #172e69, #12285c, #0d2350, #0a1d44, #071838, #1e1d43, #33224c, #482553, #842e61, #bd3e5d, #e85f4a, #fd9029)">
                <div class="flex justify-between max-w-5xl w-full py-24 gap-10">
                    <div class="flex flex-col justify-center">
                        <h3 class="text-orange-500 font-bold text-2xl">NeXTMail</h3>
                        <h1 class="text-green-500 font-bold text-6xl mt-3 mb-8 -ml-1">Email Marketing</h1>
                        <p class="text-white font-bold mb-2 text-xl">
                            Crie campainhas, programe eventos, automatize seus e-mails
                        </p>
                        <p class="text-white font-bold text-xl">
                            Utilize nossas APIs para deixar ainda mais automátizados
                        </p>
                        <Link class="bg-white text-orange-500 w-fit mt-8 px-3 py-2 rounded font-bold" :href="route('register')">Teste Gratuitamente</Link>
    
                    </div>
                    <div>
                        <img style="width:343px; height:329px" src="/email-banner.png" alt="imagem"/>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="max-w-4xl w-full my-28 gap-10">
                    <h1 class="text-blue-800 font-bold text-2xl text-center mb-8">Email é grande oportunidade para:</h1>
                    <div class="grid grid-cols-3 gap-8">
                        <div class="flex flex-col gap-8">
                            <div class="border border-orange-500 rounded-xl p-5">
                                <div class="w-full flex justify-center my-2 mb-4">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl"/>
                                </div>
                                <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                                <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="border border-orange-500 rounded-xl p-5">
                                <div class="w-full flex justify-center my-2 mb-4">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl"/>
                                </div>
                                <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                                <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-8">
                            <div class="border border-orange-500 rounded-xl p-5">
                                <div class="w-full flex justify-center my-2 mb-4">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl"/>
                                </div>
                                <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                                <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="border border-orange-500 rounded-xl p-5">
                                <div class="w-full flex justify-center my-2 mb-4">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl"/>
                                </div>
                                <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                                <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                        </div>
                        <div class="flex flex-col gap-8">
                            <div class="border border-orange-500 rounded-xl p-5">
                                <div class="w-full flex justify-center my-2 mb-4">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl"/>
                                </div>
                                <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                                <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="border border-orange-500 rounded-xl p-5">
                                <div class="w-full flex justify-center my-2 mb-4">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl"/>
                                </div>
                                <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                                <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="flex justify-center bg-green-500">
                <div class="max-w-5xl w-full my-28">
                    <div>
                        <h1 class="text-blue-800 font-extrabold text-4xl text-center mb-9">Conheça os nossos principais serviços:</h1>
                        <div class="flex gap-12">
                            <div class="bg-white shadow shadow-blue-900 rounded-xl p-6">
                                <div class="w-full flex justify-center my-5">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-20 h-20 rounded-xl"/>
                                </div>
                                <h1 class="text-center font-bold text-blue-900 text-lg">Confirmação de compra</h1>
                                <p class="text-center">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="bg-white shadow shadow-blue-900 rounded-xl p-6">
                                <div class="w-full flex justify-center my-5">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-20 h-20 rounded-xl"/>
                                </div>
                                <h1 class="text-center font-bold text-blue-900 text-lg">Confirmação de compra</h1>
                                <p class="text-center">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="bg-white shadow shadow-blue-900 rounded-xl p-6">
                                <div class="w-full flex justify-center my-5">
                                    <ShoppingCartSvg class="bg-orange-500 p-2 w-20 h-20 rounded-xl"/>
                                </div>
                                <h1 class="text-center font-bold text-blue-900 text-lg">Confirmação de compra</h1>
                                <p class="text-center">Os consumidores valorizam as confirmações de recebimento de pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="max-w-5xl w-full my-28">
                    <h1 class="text-blue-800 font-extrabold text-4xl text-center mb-9"><b class="text-orange-500">NeXMail</b> Hosting Pricing</h1>
                    <div class="grid grid-cols-4 border-2 border-blue-900 px-3 py-10 rounded">
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Free</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-blue-900 border border-gray-200 rounded-lg">Start Trial</button>
                            <p class="my-3 font-bold">200 emails/month</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Basic</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-blue-900 border border-gray-200 rounded-lg">Start Trial</button>
                            <p class="my-3 font-bold">200 emails/month</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">Monthly Backups</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Pro</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-white bg-red-500 border border-gray-200 rounded-lg">Start Trial</button>
                            <p class="my-3 font-bold">200 emails/month</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">Weekly Backups</p>
                            <p class="my-3 font-bold">Free email testing</p>
                            <p class="my-3 font-bold">Chat Support</p>
                            <p class="my-3 font-bold">20 Free template</p>


                        </div>
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Business</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-blue-900 border border-gray-200 rounded-lg">Start Trial</button>
                            <p class="my-3 font-bold">200 emails/month</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">Daily Backups</p>
                            <p class="my-3 font-bold">Free email testing</p>
                            <p class="my-3 font-bold">Chat Support</p>
                            <p class="my-3 font-bold">100 Free template</p>
                            <p class="my-3 font-bold">Dedicated Support Engineer</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-black flex justify-center">
            <div class="max-w-5xl w-full my-28">

            </div>
        </footer>
    </div>
</template>
