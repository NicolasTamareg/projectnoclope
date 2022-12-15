<script>
export default {
  name: "App",
  data() {
    return {
        userproject:{},
      feedbackMessage: "",
    };
  },

  methods: {

    //recupere les users
    async getUsers () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/admin", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.user = data.user;
      this.feedbackMessage = data.message;

      console.log("message:", this.user)
    }, 
    async getFullUserProject () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/adminproject", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.userproject = data.userproject;
      this.feedbackMessage = data.message;

      console.log("message:",this.userproject)
    }, 
      
  },

  mounted:async function () {
    // this.getUsers();
    this.getFullUserProject();
   } 
  // mounted() {
    
  //   this.getContacts();
  // },
};


</script>

<template>

<h2>Liste des utilisateurs de l'application</h2>
<br>

<ul v-for = "userproject in userproject" >
    <li>Nom: {{userproject.firstname}}</li>
    <li>Prénom: {{userproject.lastname}}</li>
    <li>Email: {{userproject.email}}</li>
    <li>Project: {{userproject.objective}}</li>
    <li>Prix du project: {{userproject.price}}€</li>
    <li>Fume par jour: {{userproject.numbersmoke}} cigarette</li>

    <br>

    <button>Voir le project</button>
    
</ul>

</template>