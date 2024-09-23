<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import Markdown from '@/Components/Markdown.vue';
import Comments from '@/Components/Comments.vue';

defineProps({ thread: Object });
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 text-gray-900 dark:text-white">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tigh md:text-5xl lg:text-6xl">{{ thread.title }}</h1>

            <div class="mb-4 grid grid-flow-row">
                <span>By: {{ thread.user?.name || 'Deleted User' }}</span>
                <span v-if="thread.community">Posted to: {{ thread.community.name }}</span>
                <span>Posted on: {{ thread.created_at }}</span>
                <span v-if="thread.updated_at !== thread.created_at">Updated on: {{ thread.updated_at }}</span>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <!-- <section v-html="$markdown(thread.text)" class="prose dark:prose-invert"></section> -->

            <Markdown :markdown="thread.text" ></Markdown>

            <Comments :comments="thread.comments" />
        </div>
    </DefaultLayout>
</template>
