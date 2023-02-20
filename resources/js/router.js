import { createRouter, createWebHistory } from "vue-router";

import Home from "./pages/Home.vue";
import Restaurant from "./pages/restaurant.vue";
import Cart from "./pages/cart.vue";
import Team from "./pages/team.vue";
import Error404 from "./pages/Error404.vue";

const router = createRouter({
    history: createWebHistory(),
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home,
        },
        {
            path: "/ristorante/:slug",
            name: "restaurant",
            component: Restaurant,
        },
        {
            path: "/carrello",
            name: "cart",
            component: Cart,
        },
        {
            path: "/team",
            name: "team",
            component: Team,
        },
        {
            path: "/:pathMatch(.*)*",
            component: Error404,
        },
    ],
});

export { router };
