<script setup>
import { useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    remember: false,
});
</script>

<template>
    <main class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex items-center justify-center h-screen">
            <div class="w-full max-w-md">
                <div class="mb-4 text-center">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Login</h1>
                    <p class="text-gray-500 dark:text-gray-400">Enter your credentials below</p>
                </div>

                <form class="max-w-sm mx-auto" @submit.prevent="form.post(route('login'))">
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input v-model="form.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@domain.com" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input v-model="form.password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>

                    <Transition name="fade">
                        <div v-if="form.errors?.login" class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                            <span class="font-medium">Error!</span> {{ form.errors.login }}
                        </div>
                    </Transition>

                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input v-model="form.remember" id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"/>
                        </div>
                        <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                    </div>

                    <div class="mb-5">
                        <!-- TODO: not implemented yet -->
                        <!--
                        <a href="#" class="text-blue-600 text-sm hover:underline dark:text-blue-500">Forgot your password?</a>
                        -->

                        <Link :href="route('register')" class="text-blue-600 text-sm hover:underline dark:text-blue-500">Create new account</Link>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
                </form>
            </div>
        </div>
    </main>
</template>
