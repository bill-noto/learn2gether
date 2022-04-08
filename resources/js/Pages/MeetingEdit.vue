<template>
    <Head title="Edit Meeting"/>

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
                        Editing Meeting #: {{ this.meeting.id }}</h1>
                    <p class="text-lg sm:text-2xl sm:leading-10 space-y-6 mb-6 text-gray-900 text-center"> Lorem ipsum
                        dolor sit
                        amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod </p>
                </div>
            </div>
        </section>
        <!--    End Hero    -->

        <!--    Create Meeting Form    -->
        <div class="xl:w-4/5 xl:mx-auto">
            <div class="flex justify-center mx-10 p-4 my-10 shadow-md">
                <div class="2xl:w-4/6 xl:w-4/6 lg:w-4/6 md:w-4/6 w-full">
                    <form @submit.prevent="submit(this.meeting.id)">
                        <div class="pb-4">
                            <label for="patron">Your Name</label>
                            <select name="patron" id="patron" class="w-full h-10 p-1">
                                <option :value="this.meeting.patron.id" selected>{{ this.meeting.patron.name }}</option>
                            </select>
                        </div>
                        <div class="py-4">
                            <label for="host">Host Name</label>
                            <select name="host" id="host" class="w-full h-10 p-1">
                                <option :value="this.meeting.host.id" selected>{{ this.meeting.host.name }}</option>
                            </select>
                        </div>
                        <div class="py-4">
                            <label for="date">Date</label>
                            <input v-model="this.form.date_time_of_meeting"
                                   type="datetime-local" class="w-full h-10 p-1" id="date" name="date">
                        </div>
                        <div>
                            <button
                                class="inline-flex text-md sm:text-xl transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-md text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 w-1/3">
                                Confirm Changes
                            </button>
                        </div>
                    </form>
                    <button @click="expand_meeting(this.meeting.id)"
                            class="inline-flex text-md sm:text-xl transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-md text-white bg-red-500 hover:bg-red-700 px-4 py-2 my-2 w-1/3">
                        Cancel Changes
                    </button>
                </div>
            </div>
        </div>

        <!--   End Create Meeting Form     -->

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
import moment from "moment";

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        meeting: Object,
    },
    data() {
        var date = new Date();
        const form = useForm({
            host_id: this.meeting.host.id,
            patron_id: this.meeting.patron.id,
            date_time_of_meeting: this.format(this.meeting.date_time_of_meeting)
        });
        return {
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
        format(param) {
            return moment(String(param)).format('YYYY-MM-DDTHH:mm');
        },
        expand_meeting(id) {
            this.$inertia.get(`/meetings/${id}`);
        },
        submit(id) {
            this.form.patch(`/meetings/${id}`)
        }
    }
})
</script>
