<script setup>
import { RouterLink } from "vue-router";
import { ref } from 'vue';
const showMobileMenu = ref(true)
</script>

<script>


export default {
  
  methods: {
    logout() {
      localStorage.clear();
    },
  },

  data() {
    return { isConnected: Boolean(localStorage.getItem("token")), isAdmin: String(localStorage.getItem("is_admin")) };
  },
  mounted: function () {
    this.$router.afterEach(() => {
      // this.isConnected = !!localStorage.getItem("token");
      this.isConnected = Boolean(localStorage.getItem("token"));
      this.isAdmin = String(localStorage.getItem("is_admin"));
    });
  },
};
</script>

<template>
    <nav>
        <!-- desktop menu-->
        <div class="navbar">
            <div class="max-w-7xl mx-auto">
                <div class="flex justify-between">
                    <!-- menu -->
                    <div class="flex space-x-4">
                        <!-- logo -->
                             <a href="" class="flex items-center py-5 px-2 space-x-2">
                                <img src="../views/img/logo-principal.png" alt="" class="h-8 w-8">
                            </a>
                        <!-- menu admin -->
                        <div v-if="isAdmin=='admin' ">
                            <div class="hidden md:flex items-center space-x-1">
                              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
                              <RouterLink class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/adminUtilisateur">Utilisateurs</RouterLink>
                              <RouterLink class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/adminTransaction">Transactions</RouterLink>
                              <RouterLink class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>
                            </div>
                        </div>
                        <!-- menu -->
                        <div v-else>

                          <div v-if="isConnected">
                            <!-- menu utilisateur -->
                            <div class="hidden md:flex items-center space-x-1">
                                <a class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
                                <a href="#" class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/project">Projets</RouterLink></a>
                                <a href=""><RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/profil">Profil</RouterLink></a>
                                <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>
                            </div>
                          </div>
                          <!-- menu visiteur -->
                          <div v-else>
                            <div class="hidden md:flex items-center space-x-1">
                              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
                              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/project">Projets</RouterLink></a>
                              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/register">Créer un compte</RouterLink></a>
                              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/login">Se connecter</RouterLink></a>
                            </div>
                          </div>
                        </div>
                        
                    </div>
                    
                    <!-- button show mobile menu -->
                    <div class="md:hidden flex items-center">
                      <button @click="showMobileMenu = !showMobileMenu" type="button" class=" bg-transparent py-2 px-2 text-black-400  hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                        <svg class="block h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>

                    </div>
                </div>
            </div>
        </div>
        <!-- mobile menu -->
        <div class="navbar md:hidden" :class="{hidden: showMobileMenu}">
          <div v-if="isAdmin=='admin' ">
            <!-- mobile menu admin -->
            <a href="#" class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
              <RouterLink class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/adminUtilisateur">Utilisateurs</RouterLink>
              <RouterLink class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/adminTransaction">Transactions</RouterLink>
              <RouterLink class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>
          </div>
          <div v-else class="navbar md:hidden" :class="{hidden: showMobileMenu}">
            <div v-if="isConnected">
              <!-- mobile menu utilisateur -->
              
                <a class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
                <a href="#" class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/project">Projets</RouterLink></a>
                <a href=""><RouterLink class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/profil">Profil</RouterLink></a>
                <RouterLink class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>
              
            </div>
              <!-- mobile menu visiteur -->
              <div v-else>
               
                  <a href="#" class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
                  <a href="#" class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/project">Projets</RouterLink></a>
                  <a href="#" class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/register">Créer un compte</RouterLink></a>
                  <a href="#" class="text-white block hover:bg-green-300 hover:text-white px-2 py-5 rounded-md text-sm font-medium"><RouterLink to="/login">Se connecter</RouterLink></a>
                
              </div>
              
            
            
          </div>
        </div>
    </nav>
    


    
</template>

<style scoped>
.navbar{
  background-color: #6CD1BC;
}
</style>