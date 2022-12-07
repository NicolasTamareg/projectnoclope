<script>
export default {
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      password: "",
      result: false,
    };
  },
  computed: {
    validPassword: function () {
      if (this.password.length < 4) return false;
      return true;
    },
  },
  methods: {
    async register() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          firstname: this.firstname,
          lastname: this.lastname,
          email: this.email,
          password: this.password,
        }),
      };

      const response = await fetch(
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/register",
        options
      );
      const data = await response.json();
      this.result = data.success;

      this.$router.push('/login')
    },
  },
};
</script>




<template>
  <div class="mainContainer">

    <form @submit.prevent="register">
      <h1>Créer un compte</h1>
      <div class="input-container">
        <label for="lastame"></label>
        <input placeholder="Nom" id="lastnameInput" v-model="lastname" required />
      </div>
      <div class="input-container">
        <label for="firstname"></label>
        <input
          type="text"
          id="firstnameInput"
          placeholder="Prénom"
          v-model="firstname"
          required
        />
      </div>
      <div class="input-container">
        <label for="email"></label>
        <input
          type="email"
          id="emailInput"
          placeholder="Email"
          v-model="email"
          required
        />
      </div>
      <div class="input-container">
        <label for="password"></label>
        <input
          type="password"
          :class="password"
          id="passwordInput"
          placeholder="Password"
          v-model="password"
          required
        />
      </div>
      <input class="createaccount-btn" type="submit" value="S'inscrire" />
    </form>
    <a href="/login">Déjà inscrit(e) ?</a>
  </div>
  
  
    <div v-if="result" class="input-container">
     
      <RouterLink to="/login"></RouterLink>
    </div>
  </template>

  <style scoped>


</style>