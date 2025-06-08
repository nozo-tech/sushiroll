<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import { router, Link } from '@inertiajs/vue3';

defineProps({ channel: Object });
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                {{ channel.name }}
            </h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                {{ channel.description }}
            </p>
            <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Subscribe
            </button>
            <button @click="router.get(route('rolls.create'))" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Upload Roll
            </button>

            <div class="pt-16 px-4">
                <h3 class="mb-2 text-4xl font-bold tracking-tight text-gray-900 dark:text-white">
                    Rolls
                </h3>

                <ul class="flex flex-col gap-5">
                    <li v-for="roll in channel.rolls">
                        <Link :href="route('rolls.show', { roll: roll.id })" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow lg:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <!-- <img class="object-cover h-full rounded-t-lg w-96 lg:w-auto lg:h-48 md:rounded-none md:rounded-s-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt=""> -->
                            <div class="flex flex-col justify-between p-4 mx-auto leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ roll.title }}
                                </h5>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ roll.description }}
                                </p>
                                <!--
                                <div class="flex mb-3 items-center mt-4">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                        7👍 | 3👎
                                    </span>
                                    <div class="w-3/4 h-5 mx-4 bg-red-700 rounded dark:bg-red-500">
                                        <div class="h-5 bg-green-700 rounded dark:bg-green-500" :width="'70%'"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">70% | 30%</span>
                                </div>
                                -->
                            </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </DefaultLayout>
</template>
