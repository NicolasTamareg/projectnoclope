<script>
export default {
  data() {
    return {
      role:"",
      email: "",
      password: "",
      result: null,
      feedbackMessage: null,
    };
  },

  methods: {

    // getTorole :async function(){
    //   const token = localStorage.getItem("token")
    //   const response = await fetch("http://127.0.0.1:8000/api/users/{{token}}/edit", {
    //     method: "GET",
    //     headers: {
    //       Accept: "application/json",
    //       "Authorization":"Bearer " + token
    //     },
    //   });
    //   const data = await response.json();
    //   this.contacts = data.contacts;

    //   console.log(this.contacts)

    // },

    async login() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({
          email: this.email,
          password: this.password,
        }),
      };

      const response = await fetch(
        "http://127.0.0.1:8000/api/login",
        options
      );

      const data = await response.json();

      console.log(response)
      
      if(response.status !== 200) {
        this.feedbackMessage = data.message ?? "Une erreur s'est produite";
        return;
      }
      
      if (!data.token) {
        this.feedbackMessage = "Une erreur s'est produite";
        return;
      }

      localStorage.setItem("token", data.token);
      localStorage.setItem("role", data.role);
      this.$router.push("/profil");
    },
  },
  computed:{
    // passwordValid: function () {
    //  if (this.password.length === 0) return "";
    //   const isLengthOk = this.password.length <= 8;
    //   if (!isLengthOk) return "border-red";
    //    for (let char of this.password) {
    //      if (this.password == 5) {
    //       return "border-red";
    //     }
    //   }
    //   return "border-green";
    // },


  },
};
</script>

<template>
  <div class="arround">
      <h1>Connexion</h1>
    <!-- Formulaire de login -->
    <form @submit.prevent="login" class="form-style">
        <input
          type="email"
          name="email"
          id="emailInput"
          v-model="email"
          placeholder="email"
          required
        />
        
        <input
        
          type="password"
          name="password"
          id="passwordInput"
          v-model="password"
          placeholder="********"
          required
        />
       <RouterLink to="/profil">
        <p v-if="result === true"></p>
        <p v-else-if="result === false" class="error">
          Adresse mail ou mot de passe est invalide.
        </p>
      </RouterLink> 
      <input class="login-button" type="submit" value="Se connecter" />
    </form>

    <p v-if="feedbackMessage">{{feedbackMessage}}</p>
  </div>
       
<!-- <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="w-full max-w-md space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Connexion</h2>
      <p class="mt-2 text-center text-sm text-gray-600">
        
        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">commence a te connecter</a>
      </p>
    </div>
    <form class="mt-8 space-y-6" action="#" @submit.prevent="login" method="POST">
      <input type="hidden" name="remember" value="true">
      <div class="-space-y-px rounded-md shadow-sm">
        <div>
          <label for="email-address" class="sr-only">Email </label>
          <input id="email-address" v-model="email" name="email" type="email" autocomplete="email" required class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="Email">
        </div>
        <div>
          <label for="password" class="sr-only">mot de passe</label>
          <input id="password" v-model="password" name="password" type="password" autocomplete="current-password" required class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm" placeholder="mot de passe">
        </div>
      </div>

      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
          <label for="remember-me" class="ml-2 block text-sm text-gray-900">se souvenir de moi</label>
        </div>

        <div class="text-sm">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">mot de passe oublie?</a>
        </div>
      </div>

      <div>
        <button type="submit" value="Se connecter" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3">
            Heroicon name: mini/lock-closed
            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> -->
               <!-- <path fill-rule="evenodd" d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z" clip-rule="evenodd" />
            </svg>
          </span>
          Se connecter
        </button>
      </div>
    </form> 
  </div>
</div>  -->

</template>

<style scoped>
.border-red {
  border-color: red;
}

.border-green {
  border-color: green;
}

.border-green,
.border-red {
  border-width: 2px;
}
</style> 
