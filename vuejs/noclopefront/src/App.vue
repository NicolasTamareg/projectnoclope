<script setup>
import { RouterView } from "vue-router";
import NavBar from "./components/NavBar.vue";

</script>

<template>
  <header>
    <NavBar />
  </header>
  
 
  <RouterView />
  <footer>
        Noclope &copy;Tout droits reservés
    </footer>
</template>

<style scoped>
</style>
