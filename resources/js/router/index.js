import { createRouter, createWebHistory } from "vue-router";
import aboutpage from "../Pages/Aboutpage.vue";
import welcome from "../Pages/Welcome.vue";
import notfound from "../Pages/notfound.vue";

const routes = [
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
    {
        path: "/:catchAll(.*)",
        name: "NotFound",
        component: notfound,
    },
];

const router=createRouter({
    history:createWebHistory(),
    routes,
});

export default router;