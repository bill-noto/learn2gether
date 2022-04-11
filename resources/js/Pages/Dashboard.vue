<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="container mx-auto flex flex-wrap justify-around">
                        <div class="2xl:w-1/3 xl:w-1/3 lg:w-1/3 md:w-1/2 w-full p-4">
                            <div class="p-8 rounded-xl shadow-md">
                                <h2 class="text-5xl font-bold py-2 text-gray-500">Meetings</h2>
                                <hr>
                                <div class="my-4 flex flex-col text-base items-center">
                                    <p class="flex items-center w-full my-1">
                                        Here is where you will find your scheduled meetings.
                                    </p>
                                    <hr class="w-full">
                                    <p class="flex items-center w-full my-1">
                                        Why not make some?
                                    </p>
                                </div>
                                <button @click="go_to_meetings"
                                        class="my-4 px-4 py-2 block w-full text-white bg-blue-500 hover:bg-blue-700 rounded">
                                    Go to Meetings
                                </button>
                            </div>
                        </div>
                        <div class="2xl:w-1/3 xl:w-1/3 lg:w-1/3 md:w-1/2 w-full p-4">
                            <div class="p-8 rounded-xl shadow-md">
                                <h2 class="text-5xl font-bold py-2 text-gray-500">Posts</h2>
                                <hr>
                                <div class="my-4 flex flex-col text-base items-center">
                                    <p class="flex items-center w-full my-1">
                                        Here is where you will find your forum posts.
                                    </p>
                                    <hr class="w-full">
                                    <p class="flex items-center w-full my-1">
                                        Why not make some?
                                    </p>
                                </div>
                                <button @click="go_to_posts"
                                        class="my-4 px-4 py-2 block w-full text-white bg-blue-500 hover:bg-blue-700 rounded">
                                    Go to Posts
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                <img src="../../../public/images/learn2gether-logo.png" alt="Learn2Gether"
                     class="inline w-1/2">
                <span class="text-xs text-gray-500">© {{ this.year }}. All rights reserved</span>
            </div>
        </footer>
        <!--    End Footer    -->
    </app-layout>
</template>

<script>
import {defineComponent} from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import Welcome from '@/Jetstream/Welcome.vue'

export default defineComponent({
    components: {
        AppLayout,
        Welcome,
    },
    data() {
        var date = new Date();
        return {
            year: date.getFullYear(),
        }
    },
    methods: {
        go_to_meetings() {
            this.$inertia.get('/meetings');
        },
        go_to_posts() {
            this.$inertia.get('/posts');
        }
    }
})
</script>
