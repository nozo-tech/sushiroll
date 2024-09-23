<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({ type: String, id: String, title: String });

const href = computed(() => {
    switch (props.type) {
        case 'roll':
            return route('rolls.show', props.id);
        case 'live':
            return route('lives.show', props.id);
        case 'thread':
            return route('threads.show', props.id);
        case 'comment':
            return route('comments.show', props.id);
        default:
            return '';
    }
});
</script>

<template>
    <div>
        <Link :data-tooltip-target="`${type}-${id}-link-tooltip`" :href :title><slot></slot></Link>

        <div :id="`${type}-${id}-link-tooltip`" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Tooltip content
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
    </div>
</template>
