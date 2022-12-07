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
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/login",
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
};
</script>

<template>
  <div id="mainContainer">
    <div class="h2-style">
      <h2>Nous sommes heureux de vous revoir !</h2>
    </div>
    <!-- Formulaire de login -->
    <form @submit.prevent="login" class="form-style">
      <div class="input-container">
        <input
          type="email"
          id="emailInput"
          v-model="email"
          placeholder="test@test.com"
          required
        />
      </div>

      <div class="input-container">
        <input
          type="password"
          id="passwordInput"
          v-model="password"
          placeholder="********"
          required
        />
      </div>
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
