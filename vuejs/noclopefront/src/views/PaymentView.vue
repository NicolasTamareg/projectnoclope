<script>
export default {
  data() {
    return {
      card: "",
      expiry: "",
      cvc: "",
      shouldDisplayForm: true,
    };
  },
  methods: {
    handleSubmit: function () {
      // remplacer le formulaire par un message
      this.shouldDisplayForm = false;
    },
    
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
        "https://api.mangopay.com/v2.01/oauth/token/projetnoclope/vuejs/noclopefront/login",
        options
      );

      const data = await response.json();

      this.result = data.success;
      if (data.success === true) {
        this.token = data.token;
        localStorage.setItem("token", data.token);
        this.$router.push("/payer");
      }
    },
  },

  computed: {
    cardIsValid: function () {
      if (!this.card || !this.card.length === 0) return "";
      const isLengthOk = this.card.length === 16;
      if (!isLengthOk) return "border-red";
      for (let char of this.card) {
        if (isNaN(char)) {
          return "border-red";
        }
      }
      return "border-green";
    },
    expiryIsValid: function () {
      if (this.expiry.length === 0) return "";
      // Ici 'date' est un tableau avec l'année (0) et le mois (1)
      const date = this.expiry.split("-");
      // Je récupère la date d'aujourd'hui
      const today = new Date();
      // Ainsi que l'année et le mois d'aujourd'hui
      const currentYear = today.getFullYear();
      const currentMonth = today.getMonth() + 1;

      const year = date[0];
      const month = date[1];
      if (year < currentYear) return "border-red";
      if (year > currentYear + 5) return "border-red";
      if (month < 1) return "border-red";
      if (month > 12) return "border-red";
      if (year == currentYear && month <= currentMonth) return "border-red";

      return "border-green";
    },
    cvcValid: function () {
      if (this.cvc.length === 0) return "";
      const isLengthOk = this.cvc.length === 3;
      if (!isLengthOk) return "border-red";

      for (let char of this.cvc) {
        if (isNaN(char)) {
          return "border-red";
        }
      }
      return "border-green";
    },
    formIsValid: function () {
      if (
        this.cardIsValid === "border-green" &&
        this.expiryIsValid === "border-green" &&
        this.cvcValid === "border-green"
      ) {
        return true;
      }
      return false;
    },
  },
};
</script>

<template>
  <div class="arround">
  <h2>Mon formulaire de paiement</h2>
  <form v-if="shouldDisplayForm" @submit.prevent="handleSubmit">
    <label for="card">
      Numéro de carte (16 chiffres)
      <input
        :class="cardIsValid"
        v-model="card"
        type="text"
        id="card"
      />
    </label>
    <label for="expiry">
      Date d'expiration (mois / année)
      <input
        :class="expiryIsValid"
        type="month"
        name="expiry"
        id="expiry"
        v-model="expiry"
      />
    </label>
    <label for="cvc">
      CVC (3 chiffres)
      <input
        :class="cvcValid"
        type="text"
        name="cvc"
        id="cvc"
        v-model="cvc"
      />
    </label>
    <input v-if="formIsValid" type="submit" value="Envoyer" />
  </form>
  <p v-else>Merci de vôtre confiance!</p>
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
