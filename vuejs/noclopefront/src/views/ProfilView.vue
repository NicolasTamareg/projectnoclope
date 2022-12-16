<script>


export default {
  data() {
    return {
      userList: {},
      user:{},
      result: true,
      token: "",
      profile: {},
    };
  },

  mounted: function () {
    this.getProfil();
  },
  methods: {
   
    async getProfil() {
      const token = localStorage.getItem("token")
      const response =await fetch(
        "http://127.0.0.1:8000/api/users/edit",{
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
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
  },
  // components: { ProfilPage },
};
</script>

<template>
  <div class="all">
    <div class="user-title" >
    <h2>Bonjour {{user.firstname}} {{user.lastname}}</h2>
  </div>

  <div class="card">
      <div class="objectif">
        <h1>Jour 1</h1>
      <div></div>  
      <div class="voyage">
        <h3>Voyage</h3>
      </div>
      
      <h4>100/1000€</h4>
      <div class="progression">
      </div>
    </div>
    <div class="links">
      <a href="/craquer"><input type="submit" value="J'ai craqué"></a>
      <a href="/ange"><input type="submit" value="Contacter mes anges gardiens"></a>
      <a href="/avance"><input type="submit" value="Demander une avance"></a>
    </div>
  </div>
  </div>

 
</template>

<style scoped>
.all{
  background: linear-gradient(to bottom, #bdc3c7, #2c3e50);

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
  width: 600px;
  background-color: rgb(31 41 55 );
  margin-top: 0.25rem;
  padding: 10px;
  border-radius: 8px;
  border: 1px solid black;
  
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
</style>
