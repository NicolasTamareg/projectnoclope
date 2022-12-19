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
footer{
  background-color: #6CD1BC;
  color: white;
  padding: 40px;
  border-top: 1px solid black;
}
</style>
