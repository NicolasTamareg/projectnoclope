<script>
export default {
  data() {
    return {
      role:"",
      email: "",
      password: "",
      result: null,
      token: "",
      feedbackMessage: null,
    };
  },

  methods: {

    // getTorole :async function(){
    //   const token = localStorage.getItem("token")
    //   const response = await fetch("http://127.0.0.1:8000/api/users/{{token}}/edit", {
    //     method: "GET",
    //     headers: {
    //       Accept: "application/json",
    //       "Authorization":"Bearer " + token
    //     },
    //   });
    //   const data = await response.json();
    //   this.contacts = data.contacts;

    //   console.log(this.contacts)

    // },

    async login() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({
          email: this.email,
          password: this.password,
        }),
      };

      const response = await fetch(
        "http://127.0.0.1:8000/api/login",
        options
      );

      const data = await response.json();
      
      console.log(response)
      
      if(response.status !== 200) {
        this.feedbackMessage = data.message ?? "Une erreur s'est produite";
        return;
      }
      
      if (!data.token) {
        this.feedbackMessage = "Une erreur s'est produite";
        return;
      }

      this.token = data.token;
      localStorage.setItem("token", data.token);
      localStorage.setItem("is_admin", data.is_admin);
      localStorage.setItem("role", data.role);
      this.$router.push("/");
    },
  },
  computed:{
    // passwordValid: function () {
    //  if (this.password.length === 0) return "";
    //   const isLengthOk = this.password.length <= 8;
    //   if (!isLengthOk) return "border-red";
    //    for (let char of this.password) {
    //      if (this.password == 5) {
    //       return "border-red";
    //     }
    //   }
    //   return "border-green";
    // },


  },
};
</script>

<template>
  <div class="englobe-all">

    <div class="arround">
      <!-- Formulaire de login -->
      <form @submit.prevent="login" >
          <h1>Connexion</h1>
          
          <label for="email"></label>
          <input type="email" name="email" id="emailInput" v-model="email" placeholder="email" required />
          
          <label for="password"></label>
          <input type="password" name="password" id="passwordInput" v-model="password" placeholder="********" required />
          
          <RouterLink to="/">
            <p v-if="result === true"></p>
            <p v-else-if="result === false" class="error">
              Adresse mail ou mot de passe est invalide.
            </p>
          </RouterLink> 
          <label for="submit"></label>
          <input class="submit" type="submit" value="Se connecter" />
      </form>
  <!-- lien de mot de passe oublier -->
      <p v-if="feedbackMessage">{{feedbackMessage}}</p>
      <RouterLink to="/resetPassword">
      <p>Mot de passe oublier ?</p>
      </RouterLink> 
    </div>
    
  </div>

</template>

<style scoped>

.arround{
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-around;
  padding: 40px;
  
}

form{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  border-radius: 30px;
  padding: 40px;
  width: fit-content;
  text-align: center;
  background-color: #FFFFFF;
  border: 1px solid black;
  max-width: 24rem;
  
}
input{
  
  display: block;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  border: 1px solid black;
  border-radius: 30px;
  text-align: center;
}

label[data-v-45f5edd7]{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
}
.submit{
  display: flex;
  background-color: #6CD1BC;
  text-align: center;
  color: white;
  flex-direction: row-reverse;
  justify-content: space-around;
}
.englobe-all[data-v-45f5edd7] {
    display: flex;
    justify-content: center;
    background: linear-gradient(to bottom , #69D5BF, #FFFFFF );
    padding: 40px;
}
h1 {
  padding: 20px;
  font-size: 1.5em;
  color: black;
}
button{
  margin-top: 20px;
  padding: 10px;
  font-size: 1em;
  background-color: #6CD1BC;
  color: white;
  border: 2px solid black;
  border-radius: 30px;
  width: 20vw;
}
@media (max-width: 766px){


}
</style> 
