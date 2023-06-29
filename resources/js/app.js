import './bootstrap';

import {createApp} from "vue/dist/vue.esm-bundler";
import AgoraChat from "./components/AgoraChat.vue";

createApp({
    components: {
        AgoraChat,
    }
}).mount('#myApp')
