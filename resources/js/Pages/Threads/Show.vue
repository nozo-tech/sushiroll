<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import DOMPurify from 'dompurify';
import { marked } from 'marked';

const props = defineProps({ thread: Object });
const markdown = DOMPurify.sanitize(
    marked(
        props.thread.text.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/,"")
    )
);
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 text-gray-900 dark:text-white">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tigh md:text-5xl lg:text-6xl">{{ thread.title }}</h1>

            <div class="mb-4">
                <span>By: {{ thread.user.name || 'Deleted User' }}</span>
                <span v-if="thread.community">Posted to: {{ thread.community.title }}</span>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <section v-html="markdown" class="prose dark:prose-invert"></section>
        </div>
    </DefaultLayout>
</template>
