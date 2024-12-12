import { createRouter, createWebHistory } from "vue-router";
import Homepage from "../Pages/Homepage.vue";
import aboutpage from "../Pages/Aboutpage.vue";
import welcome from "../Pages/Welcome.vue";
import notfound from "../Pages/notfound.vue";

const routes = [
    {
        path: "/",
        name: "Homepage",
        component: Homepage,
    },
    {
        path: "/about",
        name: "AboutPage",
        component: aboutpage,
    },
    {
        path: "/welcome",
        name: "Welcome",
        component: welcome,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
