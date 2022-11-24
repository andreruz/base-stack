import './bootstrap';
import '../css/app.css';

import { createApp } from 'vue/dist/vue.esm-bundler';

import Home from '@/Pages/Home/Home.vue';
import BlogPost from '@/Components/Home/BlogPost.vue';
import CountButton from '@/Components/Home/CountButton.vue';

const app = createApp({});

app.component('home', Home);
app.component('blog-post', BlogPost);
app.component('count-button', CountButton);


app.mount('#app');

//createApp(Home).mount('#app');