import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import '../css/app.css';

// DEBUG: Log all found pages
const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
console.log('Found pages:', Object.keys(pages));

createInertiaApp({
  resolve: name => {
    const page = pages[`./Pages/${name}.vue`];
    if (!page) {
      console.error(`Page not found: ${name}`);
      console.log('Available pages:', Object.keys(pages));
      return null;
    }
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .mount(el);
  },
});