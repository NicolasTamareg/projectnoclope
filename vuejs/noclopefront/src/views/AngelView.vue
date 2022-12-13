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

    //recupere les contacts
    async getContacts () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/contacts", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.contacts = data.contacts;

      console.log(this.contacts)
    },

    //Ajouter des contacts    
      addToContact :async function() {
        const body = {
          firstname: this.firstname,
          lastname: this.lastname,
          numberphone: this.numberphone,
          
        };
          const token = localStorage.getItem("token");
          const option = await fetch( "http://127.0.0.1:8000/api/contacts",{
          
            method: "POST",
            headers: {
                "Content-Type":"application/json",
                Accept: "application/json",
                "Authorization":"Bearer " + token
              },

              body: JSON.stringify(body),
            
        });
          // const response = await fetch(
          //   "http://127.0.0.1:8000/api/contacts"
            
          //   );
          const data = await option.json();
          this.feedbackMessage = data.message;
          this.getContacts();
          console.log(this.feedbackMessage)
      },
  },

  mounted:async function () {
    this.getContacts();
   } 
  // mounted() {
    
  //   this.getContacts();
  // },
};
</script>

<template>
  <h2>Vos anges Gardiens</h2>

  <li v-for = "contacts in contacts" :key="user_id">
    <p>Nom: {{contacts.firstname}}</p>
    <p>Prénom: {{contacts.lastname}}</p>
    <p>Number : {{contacts.numberphone}}</p>
  </li>
  
  <!-- <p>{{contacts.firstname}}</p> -->

  <form @submit.prevent="addToContact">
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
    <input type="submit" value="tes mort" />
    </form>

    <!-- <form>
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
  </form> -->
  <p>{{ feedbackMessage }}</p>
</template>
