import './bootstrap';
import '../css/main.css';
import 'remixicon/fonts/remixicon.css'
import VueApexCharts from 'vue3-apexcharts';
import { createApp, h } from 'vue'
import { createInertiaApp, Link } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import Layout_base from './Pages/components/layout/layout_base.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    let page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || Layout_base;
    return page;
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({ render: () => h(App, props) });
    app.use(plugin);
    app.use(VueApexCharts); // Registra o VueApexCharts aqui
    app.use(ZiggyVue);
    app.use(VueSweetalert2);
    app.component('Link', Link);
    app.component('apexchart', VueApexCharts); // Registra o componente apexchart
    app.mount(el);
  },

  progress: {
    delay: 250,
    color: '#f90',
    includeCSS: true,
    showSpinner: false
  }

});
