<template>
    <Head title="Forum"/>

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
                        Interact</h1>
                    <p class="text-lg sm:text-2xl sm:leading-10 space-y-6 mb-6 text-gray-900 text-center"> Lorem ipsum
                        dolor sit
                        amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod. Lorem ipsum dolor
                        sit amet consectetur adipisicing elit. Sed recusandae libero possimus culpa quod </p>
                </div>
            </div>
        </section>
        <!--    End Hero    -->

        <!--    Posts    -->
        <div v-for="post in posts" :key="post">
            <div class="xl:w-4/5 xl:mx-auto">
                <div class="text-center my-20 mx-8">
                    <h1 class="2xl:text-2xl xl:text-2xl lg:text-2xl md:text-2xl text-xl font-bold">{{ post.title }}</h1>
                    <h2 class="2xl:text-xl xl:text-xl lg:text-xl md:text-xl text-xl font-bold">{{ post.user.name }},
                        {{ this.format(post.created_at) }}</h2>
                    <p class="mt-4 w-4/5 mx-auto 2xl:text-base xl:text-base lg:text-base md:text-base text-sm">
                        {{ post.content }}
                    </p>
                    <div v-for="comment in comments" :key="comment">
                        <div v-if="comment.post_id === post.id" class="my-10 mx-8">
                            <div class="flex justify-start items-center mx-10">
                                <img :src="comment.user.user_avatar" alt="avatar"
                                     class="h-10 w-10 2xl:mr-10 xl:mr-10 lg:mr-10 md:mr-10 mr-4 rounded-full">
                                <h1 class="2xl:text-lg xl:text-lg lg:text-lg md:text-lg text-base font-bold">
                                    {{ comment.user.name }} @ {{ this.format(comment.created_at) }}</h1>
                                <div v-if="who != null">
                                    <button v-if="comment.user.email === who.email" class="ml-2 text-sm hover:underline"
                                            @click="delete_comment(comment.id)">
                                        Delete
                                    </button>
                                </div>
                            </div>
                            <p class="mt-4 w-4/5 mx-auto 2xl:text-base xl:text-base lg:text-base md:text-base text-sm fl">
                                {{ comment.comment }}
                            </p>
                        </div>
                    </div>
                    <form @submit.prevent="submit(post.id)" class="mx-10 my-10">
                        <textarea v-model="this.form.comment" type="text" name="comment" id="comment"
                                  placeholder="Your comment here"
                                  class="w-full h-12 p-1"></textarea>
                        <button type="submit"
                                class="inline-flex text-md sm:text-xl transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-md text-white bg-blue-500 hover:bg-blue-700 px-4 py-2">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
            <hr class="border border-gray-100">
        </div>
        <!--   End Posts     -->

        <!--   Modal & Overlay     -->
        <div class="flex items-center justify-center">
            <div id="modal"
                 class="fixed w-3/5 h-auto 2xl:text-base xl:text-base lg:text-base md:text-base text-sm top-1/3 bg-white p-6 border rounded-2xl z-50 hidden flex flex-col items-center">
                <div>
                    <h1 class="text-center my-2">Log In/Register to Comment</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic iste praesentium recusandae.
                        Accusamus
                        debitis, error eveniet impedit, iste magnam non porro possimus quidem quod rem repellendus
                        repudiandae soluta tempora vel!</p>
                </div>
                <Link :href="route('register')">
                    <button @click="modalClose" id="modalClose"
                            class="block mx-auto mt-4 sm:mt-4 md:mt-8 border-black inline-flex text-md sm:text-xl transition-colors duration-200 focus:ring-2 focus:ring-offset-2 focus:ring-current focus:outline-none rounded-md text-white bg-blue-500 hover:bg-blue-700 px-4 py-2">
                        Login/Register
                    </button>
                </Link>
            </div>
        </div>
        <div @click="overlayClose" id="overlay"
             class="fixed w-full h-full left-0 top-0 z-20 bg-black opacity-70 hidden"></div>
        <!--   End Modal & Overlay     -->

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
import moment from 'moment';

export default defineComponent({
    components: {
        Head,
        Link,
    },
    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        posts: Array,
        comments: Array,
        who: Object
    },
    data() {
        var date = new Date();
        const form = useForm({
            user_id: null,
            post_id: null,
            comment: null
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
        modal(action) {
            var modal = document.getElementById('modal').classList;
            var overlay = document.getElementById('overlay').classList;
            if (action === 'show') {
                modal.remove('hidden');
                overlay.remove('hidden');
            } else if (action === 'hide') {
                modal.add('hidden');
                overlay.add('hidden');
            }
        },
        modalClose() {
            this.modal('hide')
        },
        overlayClose() {
            this.modal('hide')
        },
        format(param) {
            return moment(String(param)).format('DD/MM/YYYY hh:mm')
        },
        delete_comment(id) {
            if (confirm('Are you sure you want to delete this comment?')) {
                this.$inertia.delete(`/del/${id}`);
            }
        },
        submit(id) {
            if (this.who != null) {
                this.form
                    .transform((data) => ({
                        ...data,
                        user_id: this.who.id,
                        post_id: id,
                    }))
                    .post('/cmt', {
                        preserveScroll: true,
                        onSuccess: () => this.form.reset(),
                    })
            } else this.modal('show');
        }
    }
})
</script>

<style>
.fl {
    display: inline-block;
}

.fl:first-letter {
    text-transform:uppercase;
}
</style>
