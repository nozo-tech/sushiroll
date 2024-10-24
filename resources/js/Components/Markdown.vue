<script setup>
import SushirollLink from '@/Components/SushirollLink.vue';
import { Marked } from 'marked';
import DOMPurify from 'dompurify';
import { h, computed, ref } from 'vue';

const props = defineProps({ markdown: String });

const markedInstance = new Marked();

function get_id(href) {
    var arr = href.split(":");
    arr.shift();
    return arr.join(":");
}

const renderer = {
    link(token) {
        console.log(token);

        var type = false;

        if (token.href.startsWith(":") || token.href.startsWith("roll:")) {
            type = 'roll';
        } else if (token.href.startsWith("live:")) {
            type = 'live';
        } else if (token.href.startsWith("thread:")) {
            type = 'thread';
        } else if (token.href.startsWith("comment:")) {
            type = 'comment';
        }

        if (type) {
            var out;

            switch (type) {
                case 'roll':
                    out = `<a href="${route('rolls.show', { roll: get_id(token.href) })}"`;
                    break;
                case 'live':
                    // out = `<a href="${route('lives.show', { live: get_id(token.href) })}"`;
                    break;
                case 'thread':
                    out = `<a href="${route('threads.show', { thread: get_id(token.href) })}"`;
                    break;
                case 'comment':
                    // out = `<a href="${route('comments.show', { comment: get_id(token.href) })}"`;
                    break;
            }

            if (token.title) {
                out += ` title="${token.title}"`;
            }

            return out + `>${token.text}</a>`;
            /*
            console.log(h(SushirollLink, {
                type,
                id: get_id(token.href),
                text: token.text,
                title: token.title
            }));
            var out = `<a href="${route(token.type + 's.show', {  })}" title="${token.title}">${token.text}</a>`;
            return `<a title="${token.title}">${token.text}</suhiroll-link>`;
            */
        }

        return false;
    }
};

const markdown_output = computed(() => {
    markedInstance.use({ renderer });

    return DOMPurify.sanitize(markedInstance.parse(props.markdown.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, "") + "\n[example.com](https://example.com) [this is a roll](:01j8bbf07fgjeh2n2yzg56tez0)"));
});
</script>

<template>
    <span v-html="markdown_output" class="prose dark:prose-invert"></span>
</template>
