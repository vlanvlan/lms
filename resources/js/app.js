import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link } from '@inertiajs/vue3';

import '../css/styles.css';
import '../css/doc.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

createInertiaApp({
  resolve: (name) => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    const page = pages[`./Pages/${name}.vue`];
    return page?.default || page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Head', Head)
      .component('Link', Link);

    app.mount(el);
  },
});
