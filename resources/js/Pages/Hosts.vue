<template>
    <Head title="Our Hosts"/>

    <div class="min-h-screen bg-red-100 sm:items-center sm:pt-0 font-sans leading-normal tracking-normal text-gray-900">
        <!--    Header    -->
        <header class="sticky top-0 z-50">
            <nav class="bg-gray-100 relative border-b-2 border-gray-300 text-gray-900">
                <div class="container mx-auto flex justify-between items-center">
                    <div class="relative block p-2 lg:p-4 text-xl text-blue-600 font-bold content-center">
                        <Link :href="route('home')">
                            <img src="../../../public/images/learn2gether-logo.png" alt="Learn2Gether"
                                 class="inline w-1/2">
                        </Link>
                    </div>
                    <ul class="2xl:flex xl:flex lg:flex md:flex hidden">
                        <li>
                            <Link :href="route('home')"
                                  class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                Home
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('hosts')"
                                  class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                Hosts
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('forum')"
                                  class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                Forum
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('about')"
                                  class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                About Us
                            </Link>
                        </li>
                        <li>
                            <Link :href="route('contact')"
                                  class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                Contact Us
                            </Link>
                        </li>
                        <li v-if="canLogin">
                            <Link v-if="$page.props.user" :href="route('dashboard')"
                                  class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                Dashboard
                            </Link>

                            <template v-else>
                                <ul class="flex">
                                    <li>
                                        <Link :href="route('login')"
                                              class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                            Log in
                                        </Link>
                                    </li>
                                    <li>
                                        <Link v-if="canRegister" :href="route('register')"
                                              class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                            Register
                                        </Link>
                                    </li>
                                </ul>
                            </template>
                        </li>
                    </ul>
                    <img @click="burgerMenu" src="../../../public/images/menu.png"
                         class="cursor-pointer 2xl:hidden xl:hidden lg:hidden md:hidden inline-block w-5 h-5 mx-3">
                </div>
            </nav>

            <ul ref="bmenu"
                class="bg-gray-100 text-center h-full w-full hidden border-b-2 border-gray-300 text-gray-900">
                <li>
                    <Link class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold" :href="route('home')">
                        Home
                    </Link>
                </li>
                <li>
                    <Link class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold" :href="route('hosts')">
                        Hosts
                    </Link>
                </li>
                <li>
                    <Link class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold" :href="route('forum')">
                        Forum
                    </Link>
                </li>
                <li>
                    <Link class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold" :href="route('about')">
                        About Us
                    </Link>
                </li>
                <li>
                    <Link class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold"
                          :href="route('contact')">Contact Us
                    </Link>
                </li>

                <li v-if="canLogin">
                    <Link v-if="$page.props.user" :href="route('dashboard')"
                          class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                        Dashboard
                    </Link>

                    <template v-else>
                        <ul class="bg-gray-100 text-center h-full w-full border-b-2 border-gray-300 text-gray-900">
                            <li>
                                <Link :href="route('login')"
                                      class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                    Log in
                                </Link>
                            </li>
                            <li>
                                <Link v-if="canRegister" :href="route('register')"
                                      class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                                    Register
                                </Link>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
        </header>
        <!--    End Header    -->

        <!--   Hero     -->
        <section class="relative h-auto shadow-md">
            <div class="container py-12 md:px-0 px-4 mx-auto flex">
                <div class="flex flex-col w-full relative">
                    <h1 class="title-font text-3xl sm:text-5xl lg:text-6xl leading-none tracking-tight mb-8 text-grey-900 text-center">
                        Our Hosts</h1>
                    <p class="text-lg sm:text-2xl sm:leading-10 space-y-6 mb-6 text-gray-900 text-center"> Lorem ipsum
                        dolor sit
                        amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod </p>
                    <div class="flex flex-col items-center justify-center">
                        <label for="sorting">Select a Language:</label>
                        <select name="sorting" id="sorting" class="w-1/3 bg-gray-100" v-model="this.sorting">
                            <option value="" selected>-- All --</option>
                            <option v-for="language in lang" :value="language.id" :key="language">{{ language.language }}</option>
                        </select>
                        <p>{{ this.sorting }}</p>
                    </div>
                </div>
            </div>
        </section>
        <!--    End Hero    -->

        <!--   Hosts     -->
        <div class="container mx-auto flex flex-wrap">
            <div v-for="host in hosts" :key="host" class="lg:w-1/3 md:w-1/2 w-full p-4">
                <div class="p-8 rounded-xl shadow">
                    <img class="mb-4 shadow-md mx-auto h-auto w-full"
                         alt="Host Profile Picture"
                         :src="host.user_avatar">
                    <h4 class="mb-2 text-lg font-semibold text-center"> {{ host.name }} </h4>
                    <p class="text-base"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae libero
                        possimus culpa quod </p>
                    <h4 class="my-2 text-lg font-semibold text-center">Languages:</h4>
                    <p v-if="host.languages.length === 0" class="text-lg mt-2">Serbian</p>
                    <div v-for="l in host.languages" :key="l">
                        <p class="text-lg mt-2">{{ l.language }}</p>
                    </div>
                    <div class="flex items-center justify-center">
                        <Link :href="route('register')">
                            <button
                                class="block mx-auto mt-4 sm:mt-4 md:mt-8 border-black inline-flex text-md sm:text-xl transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-md text-white bg-blue-500 hover:bg-blue-700 px-4 py-2">
                                Request Meeting
                            </button>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
        <!--   End Hosts     -->

        <!--    Newsletter    -->
        <div class="w-full p-4 my-4 mx-auto container shadow-md">
            <h1 class="text-2xl sm:text-xl font-bold text-center py-4">Our Newsletter</h1>
            <div class="flex md:p-2 p-0 rounded-xl shadow-md items-center">
                <div class="lg:w-1/6 md:w-1/5 mr-2 md:block hidden">
                    <img class="shadow-md h-fit w-auto"
                         alt="Newsletter Man"
                         src="../../../public/images/newsletter.jpg">
                </div>
                <div class="lg:w-5/6 md:4/5 w-full md:m-0 m-4">
                    <h2 class="mb-2 text-lg font-semibold"> Subscribe to our newsletter </h2>
                    <p class="text-base"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae libero
                        possimus culpa quod Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae
                        libero possimus culpa quod </p>
                    <form @submit.prevent="submit" class="flex items-center py-2">
                        <input required
                               class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 leading-tight focus:outline-none"
                               type="email" v-model="this.form.email" placeholder="Insert email" id="email" name="email"
                               aria-label="Email">
                        <button
                            class="flex-shrink-0 transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-full text-white bg-blue-500 hover:bg-blue-700 px-4 py-2"
                            type="submit"> Subscribe<span class="md:inline-block hidden">To Newsletter</span>
                        </button>
                    </form>
                    <div class="mt-2 flex flex-wrap items-center">
                        <p class="text-gray-500 text-xs"> Terms &amp; conditions apply. </p>
                    </div>
                </div>
            </div>
        </div>
        <!--   End Newsletter     -->

        <!--    Footer    -->
        <footer
            class="px-4 py-4 h-auto w3-full flex flex-wrap justify-center items-center bg-gray-200 border-gray-300 border-t-2">
            <div class="flex flex-wrap flex-col items-center">
                <div class="flex flex-wrap">
                    <img class="h-6 w-6 mx-1 rounded-full bg-blue-200"
                         alt="Facebook Logo" src="../../../public/images/facebook.jpeg">
                    <img
                        class="h-6 w-6 mx-1 rounded-full bg-blue-200" alt="Instagram Logo"
                        src="../../../public/images/instagram.png">
                    <img class="h-6 w-6 mx-1 rounded-full bg-blue-200"
                         alt="Twitter Logo"
                         src="../../../public/images/twitter.png">
                </div>
                <img src="../../../public/images/learn2gether-logo.png" alt="Learn2Gether" class="inline w-1/2">
                <span class="text-xs text-gray-500">© {{ this.year }}. All rights reserved</span>
            </div>
        </footer>
        <!--    End Footer    -->
    </div>
</template>

<script>
import {defineComponent} from 'vue';
import {Head, Link, useForm} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        hosts: Array,
        lang: Array,
    },
    data() {
        var date = new Date();
        const form = useForm({
            email: null,
        });
        return {
            sorting: '',
            form,
            year: date.getFullYear(),
        }
    },
    methods: {
        burgerMenu() {
            var content = this.$refs.bmenu;
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
            }
        },
        submit() {
            this.form.post('/nlt', {
                preserveScroll: true,
                onSuccess: () => this.form.reset(),
            })
        }
    },
    mounted() {
        console.log(this.hosts);
    }
})
</script>
