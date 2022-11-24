import './bootstrap';
import '../css/app.css';

import { createApp } from 'vue/dist/vue.esm-bundler';

import Home from '@/Pages/Home/Home.vue';
//import BlogPost from '@/Components/Home/BlogPost.vue';
import CountButton from '@/Components/Home/CountButton.vue';

const appHome = createApp({});
const appButton = createApp({});

appHome.component('home', Home)
//app.component('blog-post', BlogPost);
appButton.component('count-button', CountButton);



appHome.mount('#app-home');
appButton.mount('#app-button')

//createApp(Home).mount('#app');