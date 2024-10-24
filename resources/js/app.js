import { createApp, h } from 'vue';
import { createInertiaApp, router } from '@inertiajs/vue3';
import { ZiggyVue } from '@ziggy-vue';
import { initFlowbite } from 'flowbite';
import DOMPurify from 'dompurify';
import { marked } from 'marked';
import '../css/app.css';

router.on('navigate', initFlowbite);

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        var app = createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)

        app.config.globalProperties.$markdown = (text) => {
            return DOMPurify.sanitize(marked(text.replace(/^[\u200B\u200C\u200D\u200E\u200F\uFEFF]/, "")));
        };

        app.mount(el);
    },
});
