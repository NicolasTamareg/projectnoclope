<script>
export default {
  data() {
    return {
      firstname: "",
      lastname: "",
      telephone: "",
      result: null,
      token: "",
    };
  },

  methods: {
    async ange() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify({
            firstname: this.firstname,
            lastname: this.lastname,
            telephone: this.telephone,
        }),
      };

      const response = await fetch(
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/vuejs/noclopefront/ange",
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
<h2>Vos anges Gardiens</h2>

<form action="/profil">
<label for="">Ange-Gardien 1</label>
<input type="text" placeholder="Nom" id="lastname" v-model="lastname" required>
<input type="text" placeholder="Prénom" id="firstname" v-model="firstname" required>
<input type="number" placeholder="Numéro de telephone" id="telephone" v-model="telephone" required>

<label for="">Ange-Gardien 2</label>
<input type="text" placeholder="Nom" id="lastname" v-model="lastname2" required>
<input type="text" placeholder="Prénom" id="firstname" v-model="firstname2" required>
<input type="number" placeholder="Numéro de telephone" id="telephone" v-model="telephone2" required>



<label for="">Ange-Gardien 3</label>
<input type="text" placeholder="Nom" id="lastname" v-model="lastname3" required>
<input type="text" placeholder="Prénom" id="firstname" v-model="firstname3" required>
<input type="number" placeholder="Numéro de telephone" id="telephone" v-model="telephone3" required>

<input type="submit" value="Valider">
</form>


</template>