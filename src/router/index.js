import { createRouter, createWebHistory } from 'vue-router';
import Home from "../views/Home.vue";
//in CASE OF DATA BASE API
/* import HomeApi from "../views/HomeApi.vue"; */
import About from "../views/About.vue";

const routes = [
    {
        path: '/',
        name: "Home",
        component: Home,
    },
    {
        path: '/about',
        name: "About",
        component: About,
    },
    //INCASE OF DATABASE API
    /*  {
         path: '/',
         name: "HomeApi",
         component: HomeApi,
     }, */


]
const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes,
})
export default router