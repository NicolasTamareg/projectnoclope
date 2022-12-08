<script>
export default {
  data() {
    return {
      email: "",
      password: "",
      result: null,
      token: "",
    };
  },

  methods: {
    async login() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          email: this.email,
          password: this.password,
        }),
      };

      const response = await fetch(
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/vuejs/noclopefront/login",
        options
      );

      const data = await response.json();

      this.result = data.success;
      if (data.success === true) {
        this.token = data.token;
        localStorage.setItem("token", data.token);
        this.$router.push("/profil");
      }
    },
  },
  computed:{
    // passwordValid: function () {
    //   if (this.password.length === 0) return "";
    //   const isLengthOk = this.password.length =< 8;
    //   if (!isLengthOk) return "border-red";

    //   for (let char of this.password) {
    //     if (this.password == 5) {
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
          :class="emailValid"
          id="emailInput"
          v-model="email"
          placeholder="test@test.com"
          required
        />
        
        <input
        :class="passwordValid"
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
