<script>
export default {
  name: "App",
  data() {
    return {
      firstname: "",
      lastname: "",
      numberphone: "",
      result: null,
      token: "",
      feedbackMessage: "",
    };
  },

  methods: {
    async getContacts() {
      const response = await fetch("http://127.0.0.1:8000/api/contacts", {
        method: "GET",
        headers: {
          Accept: "application/json",
        },
      });
      const data = await response.json();
      this.contacts = data.contacts;
    },
    async createContact() {
      const body = {
        firstname: this.firstname,
        lastname: this.lastname,
        numberphone: this.numberphone,
      };
      const response = await fetch("http://127.0.0.1:8000/api/contacts", {
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
  mounted() {
    this.getContacts();
  },
};
</script>

<template>
  <h2>Vos anges Gardiens</h2>

  <form @submit.prevent="createContact">
    <label for="">Ange-Gardien 1</label>
    <input
      type="text"
      placeholder="Nom"
      id="lastname"
      v-model="lastname"
      required
    />
    <input
      type="text"
      placeholder="Prénom"
      id="firstname"
      v-model="firstname"
      required
    />
    <input
      type="number"
      placeholder="Numéro de telephone"
      id="numberphone"
      v-model="numberphone"
      required
    />

    <label for="">Ange-Gardien 2</label>
    <input
      type="text"
      placeholder="Nom"
      id="lastname"
      v-model="lastname2"
      required
    />
    <input
      type="text"
      placeholder="Prénom"
      id="firstname"
      v-model="firstname2"
      required
    />
    <input
      type="number"
      placeholder="Numéro de telephone"
      id="numberphone3"
      v-model="numberphone2"
      required
    />

    <label for="">Ange-Gardien 3</label>
    <input
      type="text"
      placeholder="Nom"
      id="lastname"
      v-model="lastname3"
      required
    />
    <input
      type="text"
      placeholder="Prénom"
      id="firstname"
      v-model="firstname3"
      required
    />
    <input
      type="number"
      placeholder="Numéro de telephone"
      id="numberphone3"
      v-model="numberphone3"
      required
    />

    <input type="submit" value="Valider" />
  </form>
  <p>{{ feedbackMessage }}</p>
</template>
