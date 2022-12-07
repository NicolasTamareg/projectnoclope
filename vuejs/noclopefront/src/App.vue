<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'

</script>

<template>
  <header>
    
    <div class="wrapper">
  
      <nav>
        <RouterLink to="/">Accueil</RouterLink>
        <RouterLink to="/login">Connexion</RouterLink>
        <RouterLink to="/register">Inscription</RouterLink>
        <RouterLink to="/profil">Profil</RouterLink>
      </nav>

    </div>
  </header>

  <RouterView />
</template>

<style scoped>

</style>
