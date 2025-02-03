<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import { Link } from '@inertiajs/vue3';

defineProps({ rolls: Array });
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto text-center lg:py-16">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Explore Rolls</h1>
            <!--<p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">Here you can start your experience.</p>-->

            <div class="pt-16 px-4">
                <ul class="grid grid-cols-2 lg:grid-cols-4 2xl:grid-cols-5 gap-5">
                    <li v-for="roll in rolls">
                        <Link :href="route('rolls.show', roll.id)" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover h-full rounded-t-lg" src="https://flowbite.com/docs/images/blog/image-1.jpg" alt="">
                            <div class="w-full p-3">
                                <h5 class="h-12 text-sm md:text-base text-left overflow-hidden text-ellipsis font-bold text-gray-900 dark:text-white">{{ roll.title }}</h5>
                            </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </DefaultLayout>
</template>
