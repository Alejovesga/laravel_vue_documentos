import './bootstrap';
import { createApp } from 'vue';

import App from './App.vue';
import apiService from './services/apiService';
import router from './router';
import DocumentsComponent from './components/Documents/DocumentsComponent.vue'


const app = createApp({});
app.config.globalProperties.$apiService = apiService;
app.use(router);

app.component('documents-component', DocumentsComponent);
app.component('app', App);


app.mount('#app');
