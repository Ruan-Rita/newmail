<script setup>
import { Head, Link } from '@inertiajs/vue3';
import ShoppingCartSvg from '@/Components/Svg/ShoppingCartSvg.vue';
import EnvelopeSvg from '@/Components/Svg/EnvelopeSvg.vue';
import LockedSvg from '@/Components/Svg/LockedSvg.vue';
import DealHandsSvg from '@/Components/Svg/DealHandsSvg.vue';
import NewspaperSvg from '@/Components/Svg/NewspaperSvg.vue';
import PercentSvg from '@/Components/Svg/PercentSvg.vue';
import GemSvg from '@/Components/Svg/GemSvg.vue';
import BitySvg from '@/Components/Svg/BitySvg.vue';
import CodeBranchSvg from '@/Components/Svg/CodeBranchSvg.vue';
import UserAstronautSvg from '@/Components/Svg/UserAstronautSvg.vue';
import TextInput from '@/Components/TextInput.vue';



</script>

<template>
    <Head title="Sender Email" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <header class="bg-white lg:mx-0 mx-4 flex justify-center">
            <div class="flex items-center justify-between max-w-5xl w-full py-4">
                <h1 class="h-fit font-bold text-gray-900 text-2xl">NeXMail</h1>
                <div class="flex gap-3 items-center">
                    <Link class="outline-none" :href="route('login')"> Login</Link>
                    <Link class="bg-orange-500 text-white px-3 py-2 rounded" :href="route('register')">
                        <span class="hidden sm:block">
                            Teste Gratuitamente
                        </span>
                        <span class="sm:hidden">
                            Registrar
                        </span>
                    </Link>
                </div>
            </div>
        </header>

        <main>
            <div class="flex justify-center"
                style="background-image: linear-gradient(to bottom, #172e69, #12285c, #0d2350, #0a1d44, #071838, #1e1d43, #33224c, #482553, #842e61, #bd3e5d, #e85f4a, #fd9029)">
                <div class="flex justify-between max-w-5xl w-full py-24 gap-10 lg:mx-0 mx-4">
                    <div class="flex flex-col justify-center">
                        <h3 class="text-orange-500 font-bold text-2xl">NeXTMail</h3>
                        <h1 class="text-green-500 font-bold text-6xl mt-3 mb-8 -ml-1">Email Marketing</h1>
                        <p class="text-white font-bold mb-2 text-xl">
                            Crie campainhas, programe eventos, automatize seus e-mails
                        </p>
                        <p class="text-white font-bold text-xl">
                            Utilize nossas APIs para deixar ainda mais automátizados
                        </p>
                        <Link class="bg-white text-orange-500 w-fit mt-8 px-3 py-2 rounded font-bold"
                            :href="route('register')">Teste Gratuitamente</Link>

                    </div>
                    <div class="hidden md:flex items-center">
                        <img class="max-w-[243px] md:max-w-[343px] object-contain" src="/email-banner.png" alt="imagem" />
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="max-w-4xl w-full my-28 gap-10 lg:mx-0 mx-4">
                    <h1 class="text-blue-800 font-bold text-2xl text-center mb-8">Email é grande oportunidade para:</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="h-[262px] border border-orange-500 rounded-xl p-5">
                            <div class="w-full flex justify-center my-2 mb-4">
                                <ShoppingCartSvg class="bg-orange-500 p-2 w-14 h-14 rounded-xl" />
                            </div>
                            <h1 class="text-sm text-center font-bold text-blue-900">Confirmação de compra</h1>
                            <p class="text-center text-sm">Os consumidores valorizam as confirmações de recebimento de
                                pedidos e os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                        </div>
                        <div class="h-[262px] border border-orange-500 rounded-xl p-5">
                            <div class="w-full flex justify-center my-2 mb-4">
                                <LockedSvg class="fill-white bg-orange-500 p-2 w-14 h-14 rounded-xl" />
                            </div>
                            <h1 class="text-sm text-center font-bold text-blue-900">Recuperação de senha</h1>
                            <p class="text-center text-sm">
                                O e-mail é o ponto de recuperação para plataformas que usam esse canal como seu principal ponto de contato com o cliente.
                            </p>
                        </div>
                        <div class="h-[262px] border border-orange-500 rounded-xl p-5">
                            <div class="w-full flex justify-center my-2 mb-4">
                                <GemSvg class="fill-white bg-orange-500 p-2 w-14 h-14 rounded-xl" />
                            </div>
                            <h1 class="text-sm text-center font-bold text-blue-900">Notificação de envio</h1>
                            <p class="text-center text-sm">
                                Os clientes valorizam notificações relacionadas ao status de suas remessas pendentes.
                            </p>
                        </div>
                        <div class="h-[262px] border border-orange-500 rounded-xl p-5">
                            <div class="w-full flex justify-center my-2 mb-4">
                                <DealHandsSvg class="fill-white bg-orange-500 p-2 w-14 h-14 rounded-xl" />
                            </div>
                            <h1 class="text-sm text-center font-bold text-blue-900">Recomendação de produtos</h1>
                            <p class="text-center text-sm">Recomendações de produtos personalizadas podem ajudar a gerar fidelidade e receita por usuário.</p>
                        </div>
                        <div class="h-[262px] border border-orange-500 rounded-xl p-5">
                            <div class="w-full flex justify-center my-2 mb-4">
                                <PercentSvg class="fill-white bg-orange-500 p-2 w-14 h-14 rounded-xl" />
                            </div>
                            <h1 class="text-sm text-center font-bold text-blue-900">Oferta de desconto</h1>
                            <p class="text-center text-sm">Ofertas promocionais são amplamente eficazes por meio de e-mails, pois os clientes frequentemente abrem suas caixas de entrada em busca de ofertas e descontos.</p>
                        </div>
                        <div class="h-[262px] border border-orange-500 rounded-xl p-5">
                            <div class="w-full flex justify-center my-2 mb-4">
                                <NewspaperSvg class="fill-white bg-orange-500 p-2 w-14 h-14 rounded-xl" />
                            </div>
                            <h1 class="text-sm text-center font-bold text-blue-900">Newsletter mensal</h1>
                            <p class="text-center text-sm">Manter contato com os clientes é fundamental para gerar fidelidade e manter relacionamentos sólidos com eles.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center bg-green-500">
                <div class="max-w-5xl w-full my-28 lg:mx-0 mx-4">
                    <div>
                        <h1 class="text-blue-800 font-extrabold text-4xl text-center mb-9">Conheça os nossos principais
                            serviços:</h1>
                        <div class="flex gap-12 justify-center flex-wrap">
                            <div class="max-w-[300px] bg-white shadow shadow-blue-900 rounded-xl p-6">
                                <div class="w-full flex justify-center my-5">
                                    <BitySvg class="fill-blue-900 w-20 h-20 rounded-xl" />
                                </div>
                                <h1 class="text-center font-bold text-blue-900 text-lg">Confirmação de compra</h1>
                                <p class="text-center">Os consumidores valorizam as confirmações de recebimento de pedidos e
                                    os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="max-w-[300px] bg-white shadow shadow-blue-900 rounded-xl p-6">
                                <div class="w-full flex justify-center my-5">
                                    <CodeBranchSvg class="fill-blue-900 w-20 h-20 rounded-xl" />
                                </div>
                                <h1 class="text-center font-bold text-blue-900 text-lg">Confirmação de compra</h1>
                                <p class="text-center">Os consumidores valorizam as confirmações de recebimento de pedidos e
                                    os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                            <div class="max-w-[300px] bg-white shadow shadow-blue-900 rounded-xl p-6">
                                <div class="w-full flex justify-center my-5">
                                    <UserAstronautSvg class="fill-blue-900 w-20 h-20 rounded-xl" />
                                </div>
                                <h1 class="text-center font-bold text-blue-900 text-lg">Confirmação de compra</h1>
                                <p class="text-center">Os consumidores valorizam as confirmações de recebimento de pedidos e
                                    os recibos enviados por e-mail, pois facilitam a referência futura.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-center">
                <div class="max-w-5xl w-full my-28 lg:mx-0 mx-4">
                    <h1 class="text-blue-800 font-extrabold text-4xl text-center mb-9"><b class="text-orange-500">NeXMail</b> Hosting Pricing</h1>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 border-2 border-blue-900 gap-4 px-3 py-10 rounded">
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Free</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold text-center">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-blue-900 border border-gray-200 rounded-lg">Start
                                Trial</button>
                            <p class="my-3 font-bold">200 emails/month</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Basic</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold text-center">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-blue-900 border border-gray-200 rounded-lg">Start
                                Trial</button>
                            <p class="my-3 font-bold">200 emails/month</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">100 subscribers</p>
                            <p class="my-3 font-bold">Monthly Backups</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <h1 class="text-blue-800 mb-4 font-extrabold text-xl">Pro</h1>
                            <p class="font-bold">$0<span>/Month</span></p>
                            <p class="font-bold text-center">Billed annually or $0monthly</p>
                            <button
                                class="font-bold my-4 px-4 py-1 text-white bg-red-500 border border-gray-200 rounded-lg">Start
                                Trial</button>
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
                            <p class="font-bold text-center">Billed annually or $0monthly</p>
                            <button class="font-bold my-4 px-4 py-1 text-blue-900 border border-gray-200 rounded-lg">Start
                                Trial</button>
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
            <div class="max-w-5xl w-full mt-20 mb-10 lg:mx-0 mx-4">
                <div class="flex gap-8 mb-28 flex-wrap justify-center">
                    <div class="md:border-0 border-b md:pb-0 pb-10 md:flex-grow flex flex-col justify-center w-80 md:w-full">
                        <h1 class="text-gray-300 mb-14 font-extrabold text-4xl">NeWMail</h1>
                        <div class="gap-24 flex">
                            <div>
                                <p class="text-white mb-3">APIs</p>
                                <p class="text-white mb-3">Automation</p>
                                <p class="text-white mb-3">Emails Marketing</p>
                                <p class="text-white mb-3">Custom site</p>
                            </div>
                            <div>
                                <p class="text-white mb-3">Reports</p>
                                <p class="text-white mb-3">Notification</p>
                                <p class="text-white mb-3">Faq</p>
                                <p class="text-white mb-3">News updates</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-80">
                        <h1 class="text-gray-300 mb-7 font-extrabold text-2xl">Contact us</h1>
                        <div class="flex">
                            <EnvelopeSvg class="mr-3" />
                            <p class="text-gray-50">support@nextmail.com</p>
                        </div>
                        <p class="text-center my-4 text-gray-300">Or</p>
                        <div class="flex flex-col">
                            <label class="text-gray-50">
                                <TextInput class="w-full" placeholder="Email"/>
                            </label>
                            <label class="text-gray-50 my-2">
                                <TextInput class="w-full" placeholder="Describe your contact here ..."/>
                            </label>
                            <button class="block font-bold px-4 py-2 text-white bg-red-500 rounded-lg">Enviar</button>
                        </div>
                    </div>
                </div>
                <h1 class="text-center text-white">Developed by RuanRita</h1>
            </div>
        </footer>
    </div>
</template>
