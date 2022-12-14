<script>
export default {
  data() {
    return {
      email: "",
      password: "",
      result: null,
      token: "",
      feedbackMessage: null,
    };
  },

  methods: {
    async login() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify({
          email: this.email,
          password: this.password,
        }),
      };

      const response = await fetch("http://127.0.0.1:8000/api/login", options);

      const data = await response.json();

      if (response.status !== 200) {
        this.feedbackMessage = data.message ?? "Une erreur s'est produite";
        return;
      }

      if (!data.token) {
        this.feedbackMessage = "Une erreur s'est produite";
        return;
      }

      this.token = data.token;
      localStorage.setItem("token", data.token);
      this.$router.push("/profil");
    },
  },
  computed: {
    passwordValid: function () {
      if (this.password.length === 0) return "";
      const isLengthOk = this.password.length <= 8;
      if (!isLengthOk) return "border-red";
      for (let char of this.password) {
        if (this.password == 5) {
          return "border-red";
        }
      }
      return "border-green";
    },
  },
};
</script>

<template>
  <div class="arround">
    <!-- Formulaire de login -->
    <form @submit.prevent="login" class="form-style">
      <!-- <input
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
      /> -->
      <RouterLink to="/profil">
        <p v-if="result === true"></p>
        <p v-else-if="result === false" class="error">
          Adresse mail ou mot de passe est invalide.
        </p>
      </RouterLink>
      
    </form>

    <p v-if="feedbackMessage">{{ feedbackMessage }}</p>
  </div>

  <div
    class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
  >
    <div class="w-full max-w-md space-y-8">
      <div>
        <h2
          class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900"
        >
          Connexion
        </h2>
        <p class="mt-2 text-center text-sm text-gray-600">
          <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500"
            >commence a te connecter</a
          >
        </p>
      </div>
      <form
        class="mt-8 space-y-6"
        action="#"
        @submit.prevent="login"
        method="POST"
      >
        <input type="hidden" name="remember" value="true" />
        <div class="-space-y-px rounded-md shadow-sm">
          <div>
            <label for="email-address" class="sr-only">Email </label>
            <input
              id="email-address"
              v-model="email"
              name="email"
              type="email"
              autocomplete="email"
              required
              class="relative block w-full appearance-none rounded-none rounded-t-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Email"
            />
          </div>
          <div>
            <label for="password" class="sr-only">mot de passe</label>
            <input
              id="password"
              v-model="password"
              name="password"
              type="password"
              autocomplete="current-password"
              required
              class="relative block w-full appearance-none rounded-none rounded-b-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="mot de passe"
            />
          </div>
        </div>

        <div class="flex items-center justify-between">
          <div class="flex items-center">
            <input
              id="remember-me"
              name="remember-me"
              type="checkbox"
              class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
            />
            <label for="remember-me" class="ml-2 block text-sm text-gray-900"
              >se souvenir de moi</label
            >
          </div>

          <div class="text-sm">
            <a
              href="#"
              class="font-medium text-indigo-600 hover:text-indigo-500"
              >mot de passe oublie?</a
            >
          </div>
        </div>

        <div>
          <button
            type="submit"
            value="Se connecter"
            class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
          >
            Se connecter
          </button>
        </div>
      </form>
    </div>
  </div>
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
