<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <main>
        <section>
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl lg:text-6xl">Welcome to Sushiroll!</h1>

                <p class="mb-8 text-lg font-normal lg:text-xl sm:px-16 lg:px-48">We are on Open Alpha! 🎉🎉🎉<br>Sushiroll is your new go-to livestreaming and video sharing platform. Join our community today.</p>

                <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
                    <a href="/alpha-test" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-900">
                        Read more
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>

                    <Link :href="route('register')" class="inline-flex justify-center items-center py-3 px-5 sm:ms-4 text-base font-medium text-center rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-900">
                        Register
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </Link>

                    <Link :href="route('home')" class="py-3 px-5 sm:ms-4 text-sm font-medium focus:outline-none rounded-lg border hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-black dark:hover:bg-gray-70">
                        I just want to look around
                    </Link>
                </div>
            </div>
        </section>
    </main>
</template>
