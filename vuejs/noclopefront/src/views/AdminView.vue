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

<table class="customers " v-for = "userproject in userproject">
      <tr>
        <th>nom</th>
        <th>prenon</th>
        <th>email</th>
        <th>project</th>
        <th>prix de project</th>
        <th>cigarette par jour</th>
      </tr>
      <tr>
        <td>{{userproject.firstname}}</td>
        <td>{{userproject.lastname}}</td>
        <td>{{userproject.email}}</td>
        <td>{{userproject.objective}}</td>
        <td>{{userproject.price}}€</td>
        <td>{{userproject.numbersmoke}}</td>
        
      </tr>
      <button>Voir le project</button>
    </table>


<br>

<!-- <div class="grid" v-for = "userproject in userproject">
  
   <p> Nom: {{userproject.firstname}}</p>
   <p> Prénom: {{userproject.lastname}}</p>
   <p> Email: {{userproject.email}}</p>
   <p> Project: {{userproject.objective}}</p>
   <p> Prix du project: {{userproject.price}}€</p>
   <p> Fume par jour: {{userproject.numbersmoke}} cigarette</p>

    <br>

    <button>Voir le project</button>
    
  </div> -->



</template>

<style scoped>

/* .grid {
  grid-column: 1 / 5;
  border: 1px solid;
  display: grid;
  

} */
h2{
  display: flex;
  justify-content: space-around;
  
}

button{
  margin-bottom: 10px;
  
  padding: 10px;
  font-size: 1em;
  background-color: #6CD1BC;
  color: rgb(15, 15, 15);
  border: 2px solid black;
  border-radius: 30px;
  
  width: fit-content;
}


.customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.customers td, .customers th {
  border: 1px solid #ddd;
  padding: 8px;
}





.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#8dc2b4;
  color: rgb(14, 13, 13);
}
</style>