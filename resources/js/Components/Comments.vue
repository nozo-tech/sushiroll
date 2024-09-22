<script setup>
defineProps({ comments: Array });
</script>

<template>
    <section class="w-all">
        <h2 class="mt-8 mb-4 text-2xl font-bold">Comments</h2>
        <div class="flex flex-col space-y-4">
            <div class="flex items" v-for="comment in comments" :key="comment.id">
                <div class="flex-shrink-0">
                    <!-- <img :src="comment.user.avatar" alt="User Avatar" class="w-8 h-8 rounded-full"> -->
                </div>
                <div class="flex flex-col">
                    <div class="flex items justify-between">
                        <!-- <span class="font-bold">{{ comment.user.name }}</span> -->
                        <span class="text-sm text-gray-500">{{ comment.created_at }}</span>
                    </div>
                    <p v-html="$markdown(comment.text)" class="prose dark:prose-invert"></p>
                </div>
            </div>
        </div>
    </section>
</template>
