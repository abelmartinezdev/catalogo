// Views
import Navbar from "./components/global/Navbar";
import Footer from "./components/global/Footer";
import Sidebar from "./components/global/Sidebar";
import Container from "./components/Container";
import Login from "./components/auth/Login";
import Register from "./components/auth/Register";
import PasswordReset from "./components/auth/PasswordReset";
import PasswordUpdate from "./components/auth/PasswordUpdate";

import Customer from "./components/customers/Customer";
import Customeredit from "./components/customers/Edit";
import Customercreate from "./components/customers/Create";


import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import VueSweetalert2 from 'vue-sweetalert2';


// Import Bootstrap and BootstrapVue CSS files (order is important)
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import 'sweetalert2/dist/sweetalert2.min.css';
// Make BootstrapVue available throughout your project
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

Vue.use(VueSweetalert2);


require("./bootstrap");

window.Vue = require("vue").default;


const app = new Vue({
    el: "#app",
    components: {
        Container,
        Navbar,
        Sidebar,
        Footer,
        Login,
        Register,
        PasswordReset,
        PasswordUpdate,
        Customer,
        Customeredit,
        Customercreate
    }
});
