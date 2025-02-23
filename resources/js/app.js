import './bootstrap';
import { createApp } from 'vue';
import ApiList from './Components/ApiList.vue';

const app = createApp({});
app.component('api-list', ApiList);
app.mount('#app');
