<template>
    <Head title="Home"/>

    <div class="min-h-screen bg-red-100 sm:items-center sm:pt-0 font-sans leading-normal tracking-normal">
        <!--    Header    -->
        <nav class="sticky top-0 z-50 bg-gray-100 relative border-b-2 border-gray-300 text-gray-900">
            <div class="container mx-auto flex justify-between">
                <div class="relative block p-2 lg:p-4 text-xl text-blue-600 font-bold content-center">
                    <Link :href="route('home')">
                        <img src="../../../public/images/learn2gether-logo.png" alt="Learn2Gether" class="inline w-1/2">
                    </Link>
                </div>
                <ul class="flex items-center">
                    <li>
                        <Link :href="route('home')"
                              class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                            Home
                        </Link>
                    </li>
                    <li>
                        <Link :href="route('aboutUs')"
                              class="relative block py-6 px-2 lg:p-6 text-sm lg:text-base font-bold">
                            About Us
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
            </div>
        </nav>
        <!--    End Header    -->

        <!--   Hero     -->
        <section class="relative h-auto shadow-md">
            <div class="absolute inset-0"><img class="object-cover h-full w-full bg-red-100 opacity-60" alt="Hero Image"
                                               src="../../../public/images/hero.jpg"></div>
            <div class="container py-24 md:px-0 px-4 mx-auto flex">
                <div class="flex flex-col w-full relative z-10">
                    <h1 class="title-font text-3xl sm:text-5xl lg:text-6xl leading-none tracking-tight mb-8 text-black">
                        Learn While Having Fun</h1>
                    <p class="text-lg sm:text-2xl sm:leading-10 space-y-6 mb-6 text-gray-500"> Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod </p>
                    <div class="flex">
                        <Link :href="route('aboutUs')">
                            <button
                                class="inline-flex text-md sm:text-xl transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-md text-white bg-blue-500 hover:bg-blue-700 px-4 py-2">
                                Learn More
                            </button>
                        </Link>
                    </div>
                </div>
            </div>
        </section>
        <!--    End Hero    -->

        <!--   Services     -->
        <div>
            <h1 class="text-2xl sm:text-xl font-bold text-center pt-4">Our Services</h1>
            <div class="m-4 max-w-md mx-auto overflow-hidden md:max-w-2xl bg-white rounded-xl shadow-md">
                <div class="md:flex">
                    <div class="md:w-1/2 w-full"><img class="object-cover h-auto w-full"
                                                      alt="Hosts"
                                                      src="../../../public/images/people.jpg"></div>
                    <div class="md:w-1/2 w-full p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Talk</div>
                        <Link class="block mt-1 text-lg leading-tight font-medium text-black hover:underline"
                              :href="route('hosts')">Pick Who To Talk With
                        </Link>
                        <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                            recusandae libero possimus culpa quod. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Sed recusandae libero possimus culpa quod</p>
                    </div>
                </div>
            </div>
            <div class="m-4 max-w-md mx-auto overflow-hidden md:max-w-2xl bg-white rounded-xl shadow-md">
                <div class="md:flex">
                    <div class="md:w-1/2 w-full"><img class="object-cover h-auto w-full"
                                                      alt="Community"
                                                      src="../../../public/images/forum.jpg"></div>
                    <div class="md:w-1/2 w-full p-8">
                        <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Help & Receive</div>
                        <Link class="block mt-1 text-lg leading-tight font-medium text-black hover:underline"
                              :href="route('forum')">Join a Community
                        </Link>
                        <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                            recusandae libero possimus culpa quod. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit.
                            Sed recusandae libero possimus culpa quod</p>
                    </div>
                </div>
            </div>
        </div>
        <!--   End Services     -->

        <!--    Testimonials    -->
        <div class="container mx-auto my-4 shadow-md">
            <h1 class="text-2xl sm:text-xl font-bold text-center py-4 mx-auto">Testimonials</h1>
            <div class="flex flex-wrap m-4">
                <div class="lg:w-1/3 md:w-1/2 w-full p-4">
                    <div class="p-8 rounded-xl text-center"><img class="mb-4 shadow-md mx-auto h-40 w-40 rounded-full"
                                                                 alt="Testimonial Users Profile Pictures"
                                                                 :src="users[this.n1].user_avatar">
                        <p class="text-base"> &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                            recusandae
                            libero possimus culpa quod&quot; </p>
                        <h4 class="mb-2 font-semibold"> {{ users[this.n1].name }} </h4>
                    </div>
                </div>
                <div class="lg:w-1/3 md:w-1/2 w-full p-4">
                    <div class="p-8 rounded-xl text-center"><img class="mb-4 shadow-md mx-auto h-40 w-40 rounded-full"
                                                                 alt="Users Profile Pictures"
                                                                 :src="users[this.n2].user_avatar">
                        <p class="text-base"> &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                            recusandae
                            libero possimus culpa quod&quot; </p>
                        <h4 class="mb-2 font-semibold"> {{ users[this.n2].name }} </h4>
                    </div>
                </div>
                <div class="lg:w-1/3 md:w-1/2 w-full p-4">
                    <div class="p-8 rounded-xl text-center"><img class="mb-4 shadow-md mx-auto h-40 w-40 rounded-full"
                                                                 alt="Users Profile Pictures"
                                                                 :src="users[this.n3].user_avatar">
                        <p class="text-base"> &quot;Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed
                            recusandae
                            libero possimus culpa quod&quot; </p>
                        <h4 class="mb-2 font-semibold"> {{ users[this.n3].name }} </h4>
                    </div>
                </div>
            </div>
        </div>
        <!--    End Testimonials    -->

        <!--    Newsletter    -->
        <div class="w-full p-4 my-4 mx-auto container shadow-md">
            <h1 class="text-2xl sm:text-xl font-bold text-center py-4">Our Newsletter</h1>
            <div class="flex md:p-2 p-0 rounded-xl shadow-md items-center">
                <div class="lg:w-1/6 md:1/5 mr-2 md:block hidden">
                    <img class="shadow-md h-fit w-auto"
                         alt="Newsletter Man"
                         src="../../../public/images/newsletter.jpg">
                </div>
                <div class="lg:w-5/6 md:4/5 w-full md:m-0 m-4">
                    <h2 class="mb-2 text-lg font-semibold"> Subscribe to our service... </h2>
                    <p class="text-base"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae libero
                        possimus culpa quod Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed recusandae
                        libero possimus culpa quod </p>
                    <div class="flex items-center py-2">
                        <input
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 leading-tight focus:outline-none"
                            type="text" placeholder="Insert email" aria-label="Email">
                        <button
                            class="flex-shrink-0 transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-full text-white bg-blue-500 hover:bg-blue-700 px-4 py-2"
                            type="button"> Subscribe<span class="md:inline-block hidden"> To Newsletter</span>
                        </button>
                    </div>
                    <div class="mt-2 flex flex-wrap items-center">
                        <p class="text-gray-500 text-xs"> Terms &amp; conditions apply. </p>
                    </div>
                </div>
            </div>
        </div>
        <!--   End Newsletter     -->

        <!--    Footer    -->
        <footer class="px-4 py-4 h-auto w3-full flex flex-wrap justify-center items-center bg-gray-200 border-gray-300 border-t-2">
            <div class="flex flex-wrap flex-col items-center">
                <div class="flex flex-wrap">
                    <img class="h-6 w-6 mx-1 rounded-full bg-blue-200"
                         alt="Facebook Logo" src="../../../public/images/facebook.jpeg">
                    <img
                        class="h-6 w-6 mx-1 rounded-full bg-blue-200" alt="Instagram Logo"
                        src="../../../public/images/instagram.jpg">
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
import {Head, Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        users: Array
    },
    data() {
        var date = new Date();
        return {
            year: date.getFullYear(),
            n1: Math.round(Math.random() * (this.users.length - 1)),
            n2: Math.round(Math.random() * (this.users.length - 1)),
            n3: Math.round(Math.random() * (this.users.length - 1)),
        }
    },
})
</script>

<style scoped>

</style>
