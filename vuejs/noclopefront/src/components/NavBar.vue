
<script setup>
import { RouterLink, RouterView } from "vue-router";
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
  }
}
</script>

   
<template>
  <div class="wrapper">
    <nav v-if="isConnected">
      <RouterLink to="/"></RouterLink>


      <RouterLink to="/profil">Profil</RouterLink>
      <RouterLink class="hover-a" to="/login" @click="logout">Se déconnecter</RouterLink>

    </nav>
    <nav v-else>
      <RouterLink to="/"></RouterLink>
      <RouterLink class="hover-a" to="/login">Se connecter</RouterLink>
      <RouterLink class="hover-a" to="/register">Créer un compte</RouterLink>

    </nav>
  </div>

</template>

<style scoped>
s header {
  margin-top: 0;
  line-height: 1.5;
  max-height: 100vh;
}

.logo {
  display: flex;
  /* margin: 0 auto 2rem; */
  width: 250px;
  height: 250px;
}

nav {
  display: flex;
  align-items: center;
  justify-content: center;
  /* width: 100%; */
  font-size: 12px;
  text-align: center;
  margin-top: 1px;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    place-items: center;
    /* padding-right: calc(var(--section-gap) / 2); */
  }

  .logo {
    margin: 0 2rem 0 0;
    align-items: center;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
    margin-top: 0;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;
    margin-top: 0;
  }
}

button {
  margin-right: 25%;
  align-self: center;
  width: 100px;
  text-align: center;
  padding: 10px;
  background-color: #fe8c0e;
  color: white;
  border: 0px;
  border-radius: 5px;
  font-size: 15px;
}

button:hover {
  cursor: pointer;
  background-color: #ffeedd;
  box-shadow: 1px 1px 5px 1px lightgray;
  color: #fe8c0e;
  transition: all 0.3s;
}
</style>
