<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import FormError from '@/Components/FormError.vue';
import { computed } from 'vue';
import { usePage, useForm } from '@inertiajs/vue3';

const page = usePage();
const user = computed(() => page.props.auth.user);
const form = useForm({
    handle: user.value?.handle ?? '',
    name: '',
    description: '',
});
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto max-w-screen-lg text-center lg:py-16">
            <h1 class="mb-8 text-3xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Create channel</h1>

            <form @submit.prevent="form.post(route('channels.store'))" class="max-w-lg mx-auto text-left">
                <div class="mb-5">
                    <label for="handle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel handle (<span class="italic">you can reuse your username</span>)</label>
                    <FormError :error="form.errors?.handle" />
                    <input v-model="form.handle" type="text" id="handle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>
                <div class="mb-5">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel display name</label>
                    <FormError :error="form.errors?.name" />
                    <input v-model="form.name" type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
                </div>
                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Channel Description</label>
                    <FormError :error="form.errors?.description" />
                    <textarea v-model="form.description" type="text" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></textarea>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create channel</button>
            </form>
        </div>
    </DefaultLayout>
</template>
