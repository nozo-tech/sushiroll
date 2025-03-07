<script setup>
import Markdown from '@/Components/Markdown.vue';

defineProps(['page']);
</script>

<template>
    <main class="border-gray-200">
        <div class="flex items-center justify-center h-screen">
            <div class="w-full">
                <Markdown :markdown="page" />
            </div>
        </div>
    </main>
</template>
