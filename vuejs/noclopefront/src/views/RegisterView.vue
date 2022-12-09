

<script>
export default {
  name: "App",
  data() {
    return {
      role:"",
      nummbercard:"",
      firstname: "",
      lastname: "",
      email: "",
      password: "",
      // result: false,
    };
  },
  // computed: {
  //   validPassword: function () {
  //     if (this.password.length < 4) return false;
  //     return true;
  //   },
  // },
  methods: {
    async createUser() {
      const body = {
        role: this.role,
        nummbercard: this.firstname,
        firstname: this.firstname,
        lastname: this.lastname,
        password: this.password,
      };
      const response = await fetch("http://127.0.0.1:8000/api/users", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(body),
      });
      const data = await response.json();
      this.feedbackMessage = data.message;
    },
  },
  
};
</script>

<template>
  <div class="arround">
    <h1>Créer un compte</h1>
    <form @submit.prevent="createUser">
      <label for="role"></label>
        <input
          placeholder="role"
          v-model="role"
          required
        />
      <label for="numbercard"></label>
        <input
          placeholder="numbercard"
          v-model="numbercard"
          required
        />
        <label for="lastame"></label>
        <input
          placeholder="Nom"
          v-model="lastname"
          required
        />
        <label for="firstname"></label>
        <input
          type="text"
          placeholder="Prénom"
          v-model="firstname"
          required
        />
        <label for="email"></label>
        <input
          type="email"
          placeholder="Email@test.com"
          v-model="email"
          required
        />
        <label for="password"></label>
        <input
          type="password"
          placeholder="Password"
          v-model="password"
          required
        />
      <input type="submit" value="S'inscrire" />
    </form>
    <a href="/login">Déjà inscrit(e) ?</a>
  </div>

  <!-- <div v-if="result" class="input-container"> -->
    <RouterLink to="/login"></RouterLink>
  <!-- </div> -->
</template>

<style scoped>
</style>
