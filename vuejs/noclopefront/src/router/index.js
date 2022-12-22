import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path: "/adminUtilisateur",
      name: "adminUtilisateur",
      component: () => import("../views/AdminView.vue")
    },
    
    {
      path: "/adminTransaction",
      name: "adminTransaction",
      component: () => import("../views/TransactionView.vue")
    },
    {
      path: "/profil",
      name: "profil",
      component: () => import("../views/ProfilView.vue"),
    },

    {
      path: "/login",
      name: "login",
      component: () => import("../views/LoginView.vue"),
    },
    {
      path: "/register",
      name: "register",
      component: () => import("../views/RegisterView.vue"),
    },
    {
      path: "/lancer",
      name: "lancer",
      component: () => import("../views/BeginView.vue"),
    },
    {
      path: "/payer",
      name: "payer",
      component: () => import("../views/PaymentView.vue"),
    },
    {
      path: "/craquer",
      name: "craquer",
      component: () => import("../views/CraquageView.vue"),
    },
    {
      path: "/avance",
      name: "avance",
      component: () => import("../views/AvanceView.vue"),
    },
    {
      path: "/ange",
      name: "ange",
      component: () => import("../views/AngelView.vue"),
    },
  {
      path: "/dashboard",
      name: "dashboard",
      component: () => import("../views/DashboardView.vue"),
    },
    {
      path: "/project",
      name: "project",
      component: () => import("../views/BeginView.vue"),
    },
    {
      path: "/resetPassword",
      name: "resetPassword",
      component: () => import("../views/ResetPasswordView.vue")
    },
    {
      path: "/renew-password/:token",
      name: "renewPassword",
      component: () => import("../views/RenewPasswordView.vue")
    },
    {
      path: "/invitation/:token",
      name: "invitation",
      component: () => import("../views/InvitationView.vue")
    },
  ],
});

export default router;
