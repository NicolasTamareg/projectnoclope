<script>
export default {
  name: "App",
  data() {
    return {
      contacts:[],
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
    async helpContacts () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/test", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.feedbackMessage = data.message;

      console.log(this.feedbackMessage)
    },

    //Ajouter des contacts    
      addToContact :async function() {
        const body = {
          firstname: this.firstname,
          lastname: this.lastname,
          email: this.email,
          
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
          
      },

     
      
  },

  mounted:async function () {
    this.getContacts();
    // this.helpContacts();
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
    <p>Email : {{contacts.email}}</p>
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
      type="email"
      placeholder="Email"
      id="email"
      v-model="email"
      required
    />
    <input type="submit" value="tes mort" />
    </form>

    <form @submit.prevent="helpContacts">

      <button type="submit">JE VAIS CRAQUER !</button>

    </form>

  <p>{{ feedbackMessage }}</p>
</template>
