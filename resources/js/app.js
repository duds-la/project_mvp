import './bootstrap';
import '../css/main.css';
import 'remixicon/fonts/remixicon.css'
import VueApexCharts from 'vue3-apexcharts';
import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`];
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.use(plugin);
    app.use(VueApexCharts); // Registra o VueApexCharts aqui
    app.component('apexchart', VueApexCharts); // Registra o componente apexchart
    app.mount(el);
  },
});
