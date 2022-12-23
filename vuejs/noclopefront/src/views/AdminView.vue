<script>
export default {
  name: "App",
  

data() {
  return {
    users:{},
    userproject:{},
    feedbackMessage: "",
    adminproject:{},
    saving_now:{},
    pourcentage:{},
    final:{},
    elapse_day:{},
  };
},

  methods :{
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
      console.log(this.userproject)
      this.feedbackMessage = data.message;

      
    }, 
    getProjet: async function (reccupid) {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/adminget/"+reccupid, {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.adminproject = data.adminproject;
      
      // this.feedbackMessage = data.message;

      

    },
    async AdminDashboardProject() {
  
  const token = localStorage.getItem("token")
  const response = await fetch("http://127.0.0.1:8000/api/adminproject", {
    method: "GET",
    headers: {
     
      "Accept": "application/json",
      "Authorization": "Bearer " + token,
    },
   
  });
          const data = await response.json();
      this.users=data.users
      this.saving_now=data.saving_now
      this.pourcentage=data.pourcentage
      this.final=data.final
      this.elapse_day=data.elapse_day
        console.log(this.saving_now)
}
      
  },




mounted() {
          this.AdminDashboardProject();
          this.getFullUserProject();
      }
};



</script>

<template>
<h2>Liste des utilisateurs de l'application</h2>

<table class="customers " v-for = "users in users">
      <tr>
        <th>nom</th>
        <th>prenom</th>
        <th>email</th>
        <th>projet</th>
        <th>prix de projet</th>
        <th>cigarette par jour</th>
      </tr>
      <tr>
        <td>{{users.firstname}}</td>
        <td>{{users.lastname}}</td>
        <td>{{users.email}}</td>
        <td>{{users.objective}}</td>
        <td>{{users.price}}€</td>
        <td>{{users.numbersmoke}}</td>
        <td>{{saving_now}}</td>
        <td> <div class="progressbar-wrapper">
          <div title="downloaded" class="progressbar jours" :style="'width: ' + pourcentage + '%'">{{ pourcentage }}%
        </div>
        </div>
      </td>
        
      </tr>
      
      
      <button @click="getProjet(userproject.id)">Voir le project</button>
    
    </table>

<br>

<section>
    <table class="customers">
      <tr>
        <th>Son objectif: </th>
        <th>Prix de l'objectif:</th>
        <th>Prix de son packe: </th>
        
        <th>Nombre de cigarette fumer :</th>
        <th>Date de creation : </th>
      </tr>
      <tr>
        <td>{{ adminproject.objective }}</td>
        <td>{{ adminproject.price }}</td>
        <td>{{ adminproject.pricepack }}</td>
        <td>{{ adminproject.numbersmoke }}</td>
        <td> {{ adminproject.updated_at }}</td>
        
        
      </tr>

    </table>
      <!-- <h2>Detail project</h2>
    <div>
      <p>Son objectif: {{ adminproject.objective }}</p>
      <p>Prix de l'objectif: {{ adminproject.price }}</p>
      <p>Prix de son packe: {{ adminproject.pricepack }}</p>
      <p>Nombre de cigarette fumer : {{ adminproject.numbersmoke }}</p>
      <p>Date de creation : {{ adminproject.updated_at }}</p>
      
    </div> -->
</section>







</template>

<style scoped>



section{
    display: flex;
    flex-direction: column;
    align-items: center;
} 
:root {
  --success: #00b894;
  --progress: #e17055;
}

.progressbar-wrapper {
  background-color: #dfe6e9;
  color: white;
  border-radius: 15px;
  width: 100%;
}

.progressbar {
  background-color: var(--progress);
  color: white;
  padding: 1rem;
  text-align: right;
  font-size: 20px;
  border-radius: 15px;
}

.progressbar[title="downloading"] {
  background-color: var(--progress);
}

.progressbar[title="downloaded"] {
  background-color: var(--success);
}
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