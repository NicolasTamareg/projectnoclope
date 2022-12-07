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
    handleKeyUp: function () {
      this.card = "4567123456789012";
      this.expiry = "2025-06";
      this.cvc = "123";
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
  <h2>Mon formulaire de paiement</h2>
  <form v-if="shouldDisplayForm" @submit.prevent="handleSubmit">
    <label for="card">
      Numéro de carte (16 chiffres)
      <!-- <input :class="cardIsValid ? 'border-green' : 'border-red'" v-model="card" type="text" id="card"/> -->
      <input
        @keyup.alt.enter="handleKeyUp"
        :class="cardIsValid"
        v-model="card"
        type="text"
        id="card"
      />
    </label>
    <label for="expiry">
      Date d'expiration (mois / année)
      <input
        @keyup.alt.enter="handleKeyUp"
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
        @keyup.alt.enter="handleKeyUp"
        :class="cvcValid"
        type="text"
        name="cvc"
        id="cvc"
        v-model="cvc"
      />
    </label>
    <input v-if="formIsValid" type="submit" value="Envoyer" />
  </form>
  <p v-else>Merci pour vos sous!</p>
</template>

<style>
#root {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
  margin: 1rem;
  font-family: sans-serif;
}

form {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  max-width: 50%;
  text-align: center;
}

label {
  display: flex;
  flex-direction: column;
}

input,
button {
  margin-top: 0.25rem;
  padding: 6px;
  border-radius: 8px;
  border: 1px solid black;
  box-shadow: 2px 2px 10px 2px lightgray;
  outline: none;
}

input[type="submit"] {
  cursor: pointer;
  background-color: black;
  color: white;
  padding: 8px;
}

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
