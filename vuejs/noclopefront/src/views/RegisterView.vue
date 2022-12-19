<script>
export default {
  name: "App",
  data() {
    return {
      firstname: "",
      lastname: "",
      email: "",
      password: "",
      result: null,
      token: "",
      feedbackMessage: null,
      // result: false,
    };
  },
  // computed: {
  //   validPassword: function () {
  //     if (this.password.length < 4) return false;
  //     return true;
  //   },
  // },
  methods: {
    async createUser() {
      const body = {
        firstname: this.firstname,
        lastname: this.lastname,
        email: this.email,
        password: this.password,
      };
      const response = await fetch("http://127.0.0.1:8000/api/users", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
        },
        body: JSON.stringify(body),
      });
      const data = await response.json();

      if(response.status !== 200 ) {
        return;
      }
      
      window.location.assign(data.url);
      // this.feedbackMessage = data.message;
      // if (response.status !== 200) {
      //   this.feedbackMessage = data.message ?? "Une erreur s'est produite";
      //   return;
      // }

      // if (!data.token) {
      //   this.feedbackMessage = "Une erreur s'est produite";
      //   return;
      // }

      // this.token = data.token;
      // localStorage.setItem("token", data.token);
      // this.$router.push("/login");
    },
  },

};
</script>

<template>
  <div class="englobe-all">
    <div class="arround">
      <form @submit.prevent="createUser">
        <h1>Créer un compte</h1>
       
        <label for="lastame"></label>
        <input placeholder="Nom" v-model="lastname" required />
      
        <label for="firstname"></label>
        <input type="text" placeholder="Prénom" v-model="firstname" required />
        
        <label for="email"></label>
        <input type="email" placeholder="Email@test.com" v-model="email" required />
      
        <label for="password"></label>
        <input type="password" placeholder="Password" v-model="password" required />
      
        <label for="S'inscrire"></label>
        <input class="submit" type="submit" value="S'inscrire" placeholder="S'inscrire"/>
        
      </form>

      <button><a href="/login">Déjà inscrit(e) ?</a></button>
      <p v-if="feedbackMessage">{{ feedbackMessage }}</p>
    </div>
  </div>
    

  
</template>

<style scoped>
.arround{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  
}

form{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  background-color: #6CD1BC;
  border-radius: 30px;
  padding: 20px;
  width: 30vw;
  text-align: center;
  border: 2px solid black;
}
input{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  border: 1px solid black;
  border-radius: 30px;
  text-align: center;
}
label{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
}
.submit{
  display: flex;
  background-color: red;
  text-align: center;
  color: white;
  flex-direction: row-reverse;
  justify-content: space-around;
}
.englobe-all[data-v-bf0653ef] {
    display: flex;
    justify-content: center;
    background: linear-gradient(to bottom, #FFFFFF, #ACE7DC, #69D5BF);
    padding: 40px 40px 40px 40px;
}
h1 {
  padding: 20px;
  font-size: 1.5em;
  color: white;
}
button{
  margin-top: 20px;
  padding: 10px;
  font-size: 1em;
  background-color: red;
  color: white;
  border: 2px solid black;
  border-radius: 30px;
  width: 20vw;
}
</style>
