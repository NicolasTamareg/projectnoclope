<script setup>
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
  <div class="wrapper">
    <nav v-if="isConnected">
        <div v-if="isAdmin=='admin'">
          <nav class="navbar">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="flex h-16 items-center justify-center">
                <a href="#"><RouterLink  to="/"><img src="../views/img/logo-principal.png" alt="" class="logo"></RouterLink></a>

                <div class="flex items-center">
                  <div class="flex-shrink-0">
          
                  </div>
                  <div class="md:block">
          
                    <div class="ml-10 flex items-baseline space-x-4">
          
                      <a href="#" class="hidden md:block text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        <RouterLink to="/">NO CLOPE</RouterLink>
                      </a>
                      <a href="#"
                        class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        <RouterLink to="/">Accueil</RouterLink>
                      </a>
                      <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/adminUtilisateur">Utilisateurs</RouterLink>
                      <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/adminTransaction">Transactions</RouterLink>
                      <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>
                    </div>
                    
                    
                  </div>
          
                </div>
              </div>
          
            </div>
          </nav>
          

        </div>
        <div v-else>
          <nav class="navbar">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="flex h-16 items-center justify-center">
                <a href="#"><RouterLink  to="/"><img src="../views/img/logo-principal.png" alt="" class="logo"></RouterLink></a>

                <div class="flex items-center">
                  <div class="flex-shrink-0">
          
                  </div>
                  <div class="hidden md:block">
          
                    <div class="ml-10 flex items-baseline space-x-4">
          
                      <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/">NO CLOPE</RouterLink></a>
                      <a class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/">Accueil</RouterLink></a>
                      <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/project">Projets</RouterLink></a>
                      <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/profil">Profil</RouterLink>
                      <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>
                    </div>
                  </div>
          
                </div>
              </div>
          
            </div>
          </nav>
          

        </div>

      </nav>
    <nav v-else>
      
      
      
      <nav class="navbar">
        
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-center">
        <a href="#"><RouterLink  to="/"><img src="../views/img/logo-principal.png" alt="" class="logo"></RouterLink></a>
        <div class="flex items-center">
          <div class="flex-shrink-0">
            
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="#" class="bg-green-300 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page"><RouterLink  to="/">NO CLOPE</RouterLink></a>
              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/project">Projets</RouterLink></a>
              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/register">Créer un compte</RouterLink></a>
              <a href="#" class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium"><RouterLink to="/login">Se connecter</RouterLink></a>
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            

            <!-- Profile dropdown -->
            
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" class="inline-flex items-center justify-center rounded-md bg-green-300 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
           
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden" id="mobile-menu">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-green-300 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page"><RouterLink  to="/">NO CLOPE</RouterLink></a>

        <a href="#" class="text-white bg-green-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><RouterLink to="/project">Projets</RouterLink></a>

        <a href="#" class="text-white bg-green-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><RouterLink to="/register">Créer un compte</RouterLink></a>

        <a href="#" class="text-white bg-green-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium"><RouterLink to="/login">Se connecter</RouterLink></a>

        
      </div>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          
          <div class="ml-3">
            <!-- <div class="text-base font-medium leading-none text-white">{{user.firstname}} {{user.lastname}}</div> -->
            <!-- <div class="text-sm font-medium leading-none text-gray-400">{{ user.email }}</div> -->
          </div>
         
        </div>
        <div class="mt-3 space-y-1 px-2">

          <RouterLink class="text-white hover:bg-green-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium" to="/login" @click="logout">Se déconnecter</RouterLink>

        </div>
      </div>
    </div>
  </nav>
    </nav>
  </div>
</template>

<style scoped>
.navbar{
  background-color: #6CD1BC;
}
img{width: fit-content;
height: 40px;}
.logo{
  width: 8vh;
  height: 8vh;

}
/* @media screen and (min-width: 576px) and (max-width: 767px) {
.navbar{display: flex; flex-direction: column;}

nav{display: flex; flex-direction: column;}

} */
</style>

