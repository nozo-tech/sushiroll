<script setup>
import DefaultLayout from '@/Layouts/Default.vue';
import Markdown from '@/Components/Markdown.vue';
import Comments from '@/Components/Comments.vue';
import { ref, onMounted, onBeforeUnmount } from 'vue';
import { Link } from '@inertiajs/vue3';
import 'video.js/dist/video-js.css';
import videojs from 'video.js';

defineProps({ roll: Object });
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
    player.value?.dispose();
});
</script>

<template>
    <DefaultLayout>
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 text-gray-900 dark:text-white">
            <div class="max-h-1/4 rounded-lg shadow-lg">
                <video ref="player_container" class="video-js"></video>
            </div>

            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tigh md:text-5xl lg:text-6xl">{{ roll.title }}</h1>

            <div class="mb-4 grid grid-flow-row">
                <span>By: <Link v-if="roll.channel" :href="route('channels.show', { channel: roll.channel.id })">{{ roll.channel.name }}</Link><span v-else>Deleted Channel</span></span>
                <!-- <span v-if="thread.community">Posted to: {{ thread.community.title }}</span> -->
                <span>Posted on: {{ roll.created_at }}</span>
                <span v-if="roll.updated_at !== roll.created_at">Updated on: {{ roll.updated_at }}</span>
            </div>

            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <section class="w-all">
                <Markdown :markdown="roll.description" />
            </section>

            <Comments :comments="roll.comments" />
        </div>
    </DefaultLayout>
</template>
