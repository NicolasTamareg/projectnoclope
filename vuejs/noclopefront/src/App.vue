<script setup>
import { RouterView } from "vue-router";
import NavBar from "./components/NavBar.vue";
import Navbar2 from "./components/Navbar2.vue";
import FooterPVue from "./components/FooterP.vue";

</script>

<template>
  <header>
    <Navbar2 />
  </header>
  
 
  <RouterView />
    <FooterPVue/>
  </template>

<style scoped>

</style>
