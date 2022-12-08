<script>
export default {
  data() {
    return {
        nbrcigarette: "",
      result: false,
    };
  },
  computed: {
   
  },
  methods: {
    async register() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
          nbrcigarette: this.nbrcigarette,
          
        }),
      };

      const response = await fetch(
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/vuejs/noclopefront/register",
        options
      );
      const data = await response.json();
      this.result = data.success;

      this.$router.push("/login");
    },
  },
};
</script>



<template>
    <div class="arround">
    <h1>Oups, ca arrive...</h1>

    <form action="/profil">
<label for="">Combien de cigarettes ?</label>
<input type="number" placeholder="Entrez le chiffre" id="nbrcigarette" v-model="nbrcigarette" name="nbrcigarette" required>
<input type="submit">


    </form>
</div>
</template>

<style scoped>

</style>