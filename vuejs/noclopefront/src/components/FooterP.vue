<!-- <script setup>
import { RouterLink } from "vue-router";
</script>

<script>
export default {
  methods: {
    logout() {
      localStorage.clear();
    },
  },

  data() {
    return { isConnected: Boolean(localStorage.getItem("token")) };
  },
  mounted: function () {
    this.$router.afterEach(() => {
      // this.isConnected = !!localStorage.getItem("token");
      this.isConnected = Boolean(localStorage.getItem("token"));
    });
  },
};
</script>

<template>
  <div class="wrapper">
    <nav v-if="isConnected">
      <RouterLink to="/"></RouterLink>

      <RouterLink to="/profil">Profil</RouterLink>
      <RouterLink to="/login" @click="logout">Se déconnecter</RouterLink>
    </nav>
    <nav v-else>
      <RouterLink to="/">Accueil</RouterLink>
      <RouterLink to="/register">Créer un compte</RouterLink>
      <RouterLink to="/login">Se connecter</RouterLink>
    </nav>
  </div>
</template> -->
