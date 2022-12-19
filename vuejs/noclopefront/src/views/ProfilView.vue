<script>


export default {
  data() {
    return {
      userList: {},
      user: {},
      result: true,
      token: "",
      profile: {},
      projectUser: {},
      projectDelete:{}

    };
  },

  mounted: function () {
    this.getProfil();
    this.getProjectUser() 
   
  },
  methods: {
    

    async getProfil() {
      const token = localStorage.getItem("token")
      const response = await fetch(
        "http://127.0.0.1:8000/api/users/edit", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization": "Bearer " + token
        },
      });
      // const response = await fetch(
      //   "http://127.0.0.1:8000/api/users/edit",
      //   options
      // );

      const data = await response.json();
      this.user = data.user;
      console.log(this.user)
      // console.log("responseBody", responseBody);
      // this.userList = responseBody;
    },
  
   async getProjectUser() {
    const token = localStorage.getItem("token")
    const response = await fetch(
      "http://127.0.0.1:8000/api/projects", {
      method: "GET",
      headers: {
        Accept: "application/json",
        "Authorization": "Bearer " + token
      },
    });
    // const response = await fetch(
    //   "http://127.0.0.1:8000/api/users/edit",
    //   options
    // );

    const data = await response.json();
    this.projectUser = data.projectUser;
    console.log(this.projectUser)
    // console.log("responseBody", responseBody);
    // this.userList = responseBody;
  },

  async DeleteProject() {
    const token = localStorage.getItem("token")
    const response = await fetch(
      "http://127.0.0.1:8000/api/projects", {
      method: "DELETE",
      headers: {
        Accept: "application/json",
        "Authorization": "Bearer " + token
      },
    });
    // const response = await fetch(
    //   "http://127.0.0.1:8000/api/users/edit",
    //   options
    // );

    const data = await response.json();
    this.projectDelete = data.projectDelete;
    console.log(this.projectDelete)
    // console.log("responseBody", responseBody);
    // this.userList = responseBody;
  },
},


}




  // components: { ProfilPage },

</script>

<template>

  <div class="all">
    <div class="user-title" >
    <h2>Bonjour {{user.firstname}} {{user.lastname}}</h2>
    </div>
  </div>

  <div v-for = "projectUser in projectUser">
    
    
    <div class="card">
       <div class="objectif">
         <h1>Jour 1</h1>
       <div></div>  
       <div class="voyage">
         <h3>Project: <br>{{projectUser.objective}}</h3>
       </div>
       
       <h4>Prix: {{projectUser.price}}<br></h4>
       <div class="progression">
       </div>
     </div>
 
     <button @click="DeleteProject">Delete</button>
     <a href="/dashboard">Tableau de bord</a>
    
   </div>
  </div>
 
     <div class="links">
      <a href="/craquer"><input type="submit" value="J'ai craqué"></a>
      <a href="/ange"><input type="submit" value="Contacter mes anges gardiens"></a>
      <a href="/avance"><input type="submit" value="Demander une avance"></a>
    </div>
  
  
  

   
  

  
</template>

<style scoped>
.all{
  background: linear-gradient(to bottom, #FFFFFF, #ACE7DC, #69D5BF);

}
.card{
  padding: 20px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  
 
}
.objectif{
  display: flex;
  flex-direction: column;
  justify-content: center;
  text-align: center;
  border: solid 1px black;
  height: 500px;
  width: fit-content;
  background-color: #6CD1BC;
  margin-top: 0.25rem;
  padding: 10px;
  border-radius: 8px;
  border: 2px solid black;
  
}
.voyage{
  display: flex;
  align-items: center;
  justify-content: center;
  height: 300px;
  width: 400px;
  background-image: url(../views/img/projet.jpg);
  color: black;
  font-weight: bold;
  background-position: center;
  background-size: cover;
  margin-top: 0.25rem;
  padding: 6px;
  border-radius: 8px;
  border: 1px solid black;
  align-self: center;
}
.progression{
  display: flex;
  align-items: center;
  justify-content: center;
  height: 20px;
  width: 90%;
  background-color: chartreuse;
  margin-left: 20px;
  margin-top: 0.25rem;
  padding: 6px;
  border-radius: 8px;
  border: 1px solid black;
  
}
.user-title{
  display: flex;
  text-align: center;
  align-content: center;
  justify-content: center;
  padding: 20px;
}
.separe{
  height: 100px;
}
h1{
  padding: 10px;
  color: white;
}
h2{
  padding: 20px;
  font-size: 2em;
}
h4{
  padding: 20px;
  color: white;
}
.links{
  display: flex;
    justify-content: space-between;
    padding: 10px;
    align-self: normal;
}
a{
  font-size: 1.3em;
  color: white;
}
a:hover{
  background-color: red;
  border-radius: 30px;
  padding: 5px;
}
button{
  margin-top: 20px;
  padding: 15px;
  font-size: 1em;
  background-color: #6CD1BC;
  color: white;
  border: 2px solid black;
  border-radius: 15px;
  
  width: fit-content;
}
</style>
