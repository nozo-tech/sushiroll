<script setup>
import Markdown from '@/Components/Markdown.vue';

defineProps(['page']);
</script>

<template>
    <a href="/" class="fixed top-4 left-4 text-ctp-base bg-ctp-lavender font-bold py-2 px-4 rounded-full shadow-lg hover:bg-ctp-mauve active:bg-ctp-mauve/70">
        Go Back
    </a>

    <main class="border-gray-200">
        <div class="flex items-center justify-center my-16">
            <div class="max-w-screen-lg">
                <Markdown :markdown="page" />
            </div>
        </div>
    </main>
</template>
