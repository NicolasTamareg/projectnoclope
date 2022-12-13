<script>
export default {
  name: "App",
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      password: "",
      result: null,
      token: "",
      feedbackMessage: null,
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
        firstname: this.firstname,
        lastname: this.lastname,
        email: this.email,
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
      window.location.assign(data.url);
      // this.feedbackMessage = data.message;
      // if (response.status !== 200) {
      //   this.feedbackMessage = data.message ?? "Une erreur s'est produite";
      //   return;
      // }

      // if (!data.token) {
      //   this.feedbackMessage = "Une erreur s'est produite";
      //   return;
      // }

      // this.token = data.token;
      // localStorage.setItem("token", data.token);
      // this.$router.push("/login");
    },
  },

};
</script>

<template>
  <div class="arround">
    <h1>Créer un compte</h1>
    <form @submit.prevent="createUser">
      <label for="lastame"></label>
      <input placeholder="Nom" v-model="lastname" required />
      <label for="firstname"></label>
      <input type="text" placeholder="Prénom" v-model="firstname" required />
      <label for="email"></label>
      <input type="email" placeholder="Email@test.com" v-model="email" required />
      <label for="password"></label>
      <input type="password" placeholder="Password" v-model="password" required />
      <input type="submit" value="S'inscrire" action />
    </form>
    <a href="/login">Déjà inscrit(e) ?</a>
    <p v-if="feedbackMessage">{{ feedbackMessage }}</p>
  </div>
</template>

<style scoped>

</style>
