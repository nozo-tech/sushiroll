<script setup>
import SushirollLink from '@/Components/SushirollLink.vue';
import { Marked } from 'marked';
import DOMPurify from 'dompurify';
import { h, computed, ref } from 'vue';
import { data } from 'autoprefixer';

const props = defineProps({ markdown: String });

const markedInstance = new Marked();

function get_type(href) {
    var type = false;

    if (href.startsWith(":") || href.startsWith("roll:")) {
        type = 'roll';
    } else if (href.startsWith("live:")) {
        type = 'live';
    } else if (href.startsWith("thread:")) {
        type = 'thread';
    } else if (href.startsWith("comment:")) {
        type = 'comment';
    }

    return type;
}

function get_id(href) {
    var arr = href.split(":");
    arr.shift();
    return arr.join(":");
}

function link_onclick(evt) {
    //evt.preventDefault();
    //evt.stopPropagation();

    router.visit(evt.target.href, {
        method: evt.target.method,
        data: evt.target.data,
    });
}

window.link_onclick = link_onclick;

const renderer = {
    link(token) {
        // console.log(token);

        var type = get_type(token.href);
        var id = get_id(token.href);

        if (type !== false) {
            console.log(type, id);

            var out;

            switch (type) {
                case 'roll':
                    out = `<a href="${route('rolls.show', { roll: id })}"`;
                    break;
                case 'live':
                    out = `<a href="${route('lives.show', { live: id })}"`;
                    break;
                case 'thread':
                    out = `<a href="${route('threads.show', { thread: id })}"`;
                    break;
                case 'comment':
                    out = `<a href="${route('comments.show', { comment: id })}"`;
                    break;
            }

            if (token.title) {
                out += ` title="${token.title}"`;
            }

            return out + `>${token.text} (${type})</a>`;
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

    return DOMPurify.sanitize(markedInstance.parse(props.markdown.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, "")));
});
</script>

<template>
    <span v-html="markdown_output" class="prose dark:prose-invert"></span>
</template>
