import Vue from 'vue';
import Chatroom from './Chatroom';
// import './assets/sass/main.scss';
import 'bootstrap/dist/css/bootstrap.min.css';

Vue.config.productionTip = false

new Vue({
  render: h => h(Chatroom),
}).$mount('#chatroom')
