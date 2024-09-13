<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import 'video.js/dist/video-js.css';
import videojs from 'video.js';
import DOMPurify from 'dompurify';
import { marked } from 'marked';

const props = defineProps({ roll: Object });

const player_container = ref(null);
const player = ref(null);

onMounted(() => {
    player.value = videojs(player_container.value, {
        controls: true,
        autoplay: false,
        preload: 'auto',
        fluid: true,
        liveui: true,
        sources: [{
            src: 'https://file-examples.com/storage/feab15190e668af9da02618/2017/04/file_example_MP4_1920_18MG.mp4',
            type: 'video/mp4',
        }],
    });
});
onBeforeUnmount(() => {
    if (player.value) {
        player.value.dispose();
    }
});

const description_md = DOMPurify.sanitize(
    marked(
        props.roll.description.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/,"")
    )
);
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 text-gray-900 dark:text-white">
            <div class="max-h-1/4 rounded-lg shadow-lg">
                <video ref="player_container" class="video-js"></video>
            </div>

            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tigh md:text-5xl lg:text-6xl">{{ roll.title }}</h1>

            <div class="mb-4">
                <span>By: {{ roll.channel?.name || 'Deleted Channel' }}</span>
                <!-- <span v-if="thread.community">Posted to: {{ thread.community.title }}</span> -->
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <section v-html="description_md" class="prose dark:prose-invert"></section>
        </div>
    </DefaultLayout>
</template>
