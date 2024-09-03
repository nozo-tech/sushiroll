<script setup>
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: '',
    password: '',
    password_confirmation: '',
});
</script>

<template>
    <main class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex items-center justify-center h-screen">
            <div class="w-full max-w-md">
                <div class="mb-4 text-center">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Register</h1>
                    <p class="text-gray-500 dark:text-gray-400">Enter your credentials below</p>
                </div>

                <form @submit.prevent="form.post(route('users.store'))" class="max-w-sm mx-auto">
                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                        <input :value="form.email" type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="name@domain.com" required />
                    </div>
                    <div class="mb-5">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                        <input :value="form.password" type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                    </div>
                    <div class="mb-5">
                        <label for="password-confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
                        <input :value="form.password_confirmation" type="password" id="password-confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                    </div>

                    <!-- TODO: not implemented yet -->

                    <!--
                    <div class="flex items-start mb-5">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" required />
                        </div>

                        <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" target="_blank" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a></label>
                    </div>
                    -->

                    <Link :href="route('login')" class="mb-5 float-right text-blue-600 text-sm hover:underline dark:text-blue-500">I already have an account</Link>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create account</button>
                </form>
            </div>
        </div>
    </main>
</template>
