import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { ZiggyVue } from '@ziggy-vue';
import { initFlowbite } from 'flowbite';
import markdown from '@/markdown.js';
import '../css/app.css';

router.on('finish', initFlowbite);

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        var app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)

        app.config.globalProperties.$markdown = markdown;

        app.mount(el)
    },
});
