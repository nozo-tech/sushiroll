<script setup>
import { computed } from 'vue';
import { Marked } from 'marked';
import DOMPurify from 'dompurify';

const props = defineProps({ markdown: { type: String, required: true } });

const markedInstance = new Marked();

const markdown_output = computed(() => {
    return DOMPurify.sanitize(
        markedInstance.parse(
            props.markdown.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, "")
        )
    );
});
</script>

<template>
    <span v-html="markdown_output" class="prose dark:prose-invert"></span>
</template>
