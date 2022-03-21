<template>
    <Head title="About Us"/>

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
                        A Little About Us</h1>
                    <p class="text-lg sm:text-2xl sm:leading-10 space-y-6 mb-6 text-gray-900 text-center"> Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod </p>
                </div>
            </div>
        </section>
        <!--    End Hero    -->

        <!--   Mission & Vision     -->
        <div class="xl:w-4/5 xl:mx-auto my-6">
            <section id="teamSection" class="2xl:flex xl:flex lg:flex justify-around h-auto mx-auto">
                <div class="p-4 m-14 xl:m-0 xl:ml-10 xl:my-14 shadow-md 2xl:w-1/2 xl:w-1/2 lg:w-1/2">
                    <img
                        class="mx-auto rounded-full h-44 w-44 transition-all transform hover:scale-110 hover:border-black"
                        src="../../../public/images/mission.jpg" alt="Inclusion">
                    <h1 class="text-center text-lg mt-5 font-bold">Our Mission</h1>
                    <p class="text-center text-base mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet tellus sed tellus egestas facilisis. Pellentesque eu ante aliquet nulla dapibus finibus. Donec ac velit sed sapien interdum semper vitae quis ligula. Morbi interdum massa sed dui dapibus ultricies. Nulla nisl lacus, posuere eget bibendum vitae, congue vel diam. Proin at velit purus. Sed euismod non arcu efficitur commodo. Proin eu quam vestibulum, pretium tellus vel, venenatis lacus.</p>
                </div>
                <div class="p-4 m-14 xl:m-0 xl:ml-10 xl:my-14 shadow-md 2xl:w-1/2 xl:w-1/2 lg:w-1/2">
                    <img
                        class="mx-auto rounded-full h-44 w-44 transition-all transform hover:scale-110 hover:border-black"
                        src="../../../public/images/vision.png" alt="Diversity">
                    <h1 class="text-center text-lg mt-5 font-bold">Our Vision</h1>
                    <p class="text-center text-base mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut
                        ultricies
                        dolor sed erat pulvinar sodales. Phasellus gravida gravida turpis eu sollicitudin.</p>
                </div>
            </section>
        </div>
        <!--   End Mission & Vision     -->

        <!--    Company's Story    -->
        <div class="p-4 min-w-0 w-full flex-auto lg:static lg:max-h-full lg:overflow-visible">
            <div class="w-full flex shadow-md">
                <div class="min-w-0 flex-auto px-4 sm:px-6 xl:px-8 pb-4">
                    <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight text-center">Our Story</h1>
                    <hr class="my-5">
                    <p class="mt-1 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet tellus sed tellus
                        egestas facilisis. Pellentesque eu ante aliquet nulla dapibus finibus. Donec ac velit sed sapien
                        interdum semper vitae quis ligula. Morbi interdum massa sed dui dapibus ultricies. Nulla nisl
                        lacus, posuere eget bibendum vitae, congue vel diam. Proin at velit purus. Sed euismod non arcu
                        efficitur commodo. Proin eu quam vestibulum, pretium tellus vel, venenatis lacus.
                        <br>
                        <br>
                        Phasellus euismod ornare molestie. Donec at rutrum quam. Integer sit amet venenatis mi. Nulla
                        sagittis ullamcorper libero. Maecenas et ipsum ut nibh imperdiet hendrerit ut ac enim. Aenean
                        pretium justo nulla, a varius diam pretium sit amet. Pellentesque habitant morbi tristique
                        senectus et netus et malesuada fames ac turpis egestas. Aenean quam neque, condimentum sit amet
                        nibh non, gravida malesuada ipsum. In mi massa, dictum in urna a, sodales iaculis turpis. Fusce
                        venenatis, felis vitae ornare efficitur, nibh erat vestibulum magna, et porta ante odio sed
                        lectus. Donec eu pellentesque justo. Suspendisse rutrum feugiat tellus lobortis porta. Curabitur
                        vulputate rutrum est, eget dapibus turpis consequat vitae.
                        <br>
                        <br>
                        Praesent non tristique ante. Nullam aliquet nisl mauris, quis mollis leo ultricies ac. Curabitur
                        consequat tristique dictum. Nam semper sagittis turpis, eu pulvinar augue porttitor nec. Nunc
                        cursus nisl ut augue pharetra auctor. Curabitur fermentum mattis tempor. Mauris efficitur
                        placerat fringilla. Integer tincidunt facilisis mi, non elementum massa iaculis in. Phasellus
                        arcu enim, interdum a ornare non, lobortis id arcu. Praesent faucibus, est sit amet rhoncus
                        dignissim, ex mi cursus arcu, sed dignissim lectus odio sed erat. Aliquam placerat turpis a enim
                        tempor viverra. Mauris felis ante, pulvinar vitae odio vel, euismod gravida arcu.</p>
                </div>
            </div>
        </div>
        <!--    End Company's Story    -->

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
import {Head, Link} from '@inertiajs/inertia-vue3';

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
    },
    data() {
        var date = new Date();
        return {
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
        }
    }
})
</script>
