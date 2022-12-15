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
  background-color: rgb(31 41 55 );
  color: white;
  height: 20vh;
}
</style>
