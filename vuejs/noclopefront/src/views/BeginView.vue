<script>
export default {
  data() {
    return {
      objective: "",
      price: "",
      numbersmoke:"",
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
          objective: this.objective,
          price: this.price,
          numbersmoke: this.numbersmoke,
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
  <h1>Simulation</h1>
  <h3>Faites une simulation rapide et gratuite</h3>
<form action="/register">
  <label for="">Objectif</label>
  <input type="text" placeholder="Ex: voyage..." id="objective" v-model="objective" name="objective" required />

  <label for="">Prix</label>
  <input type="number" placeholder="Entrez le prix de l'objectif..." id="price" v-model="price" name="price" required />

  <label for="">Consommation Journalière</label>
  <input type="number" placeholder="Consommation de cigarettes" id="numbersmoke" v-model="numbersmoke" name="numbersmoke" required/>

  <input type="submit" name="selancer" value="Commencer" id="selancer" />
  </form>

  
  </div>
</template>

<style scoped>
</style>


