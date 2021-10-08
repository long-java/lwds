
// import vue router, component và routes
import App from './components/app';
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';

//Cloudinary
// import Cloudinary from "cloudinary-vue";
import Cloudinary, { CldImage, CldTransformation } from "cloudinary-vue";
Vue.use(Cloudinary, {
  configuration: { 
    cloudName: "dm9r6ilqz",
    api_key: 455385132243955,
    api_secret: "FsHasUSTOgAxRZaAiKgfaJZz504",
    secure: true },
    components: {
        CldImage,
        CldTransformation
      }
});


//Tag-post input post-up
import VueTagsInput from '@johmun/vue-tags-input';
Vue.use(VueTagsInput);

//Alertify
import VueAlertify from 'vue-alertify';
Vue.use(VueAlertify);

//Error CORS
// import cors from 'cors';
// Vue.use(cors())







//vue-upload-file  => can not use
// const VueUploadComponent = require('vue-upload-component')
// Vue.component('file-upload', VueUploadComponent)

//fontawesome
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare, faTrash, faCaretUp, faCaretDown, faBookmark, faStar, faUserPlus, faPenAlt, faEye, faComments, fas  } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faPlusSquare, faTrash, faCaretUp,faCaretDown,faBookmark,faStar,faUserPlus,faPenAlt, faEye, faComments, fas  );
Vue.component('font-awesome-icon', FontAwesomeIcon)

//CK editor
// import CKEditor from 'ckeditor4-vue';
// Vue.use( CKEditor );

//Jodit
// import 'jodit/build/jodit.min.css'
// import JoditVue from 'jodit-vue'
// Vue.use(JoditVue)

//Quill
import VueQuillEditor from 'vue-quill-editor'
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'
Vue.use(VueQuillEditor, /* { default global options } */)


// use router
Vue.use(VueRouter);


require('./bootstrap');
window.Vue = require('vue').default;

Vue.prototype.$test = 10;


//===================================
// Vue.component('exam', require('./components/exam.vue'));
// Vue.component('home', require('./components/home'));
// Vue.component('user', require('./components/user'));
// Vue.component('posts', require('./components/posts.vue'));
// Vue.component('menu', require('./components/menu.vue'));
// Vue.component('app', require('./components/app.vue'));
// Vue.component('CommentPostComponent', require('./components/CommentPost.vue'));

//Turn off You are running Vue in development mode.
Vue.config.productionTip = false


// khai báo dùng router này
const router = new VueRouter({
    routes,
    mode: 'history'
});




const app = new Vue({
    el: '#app',
    render: h => h(App),
    router,
});

