<template>
  <!-- formulaire de requete pour mot de passe oublier -->
  <div class="glob"> 
    <h2>Mot de passe oublier ?</h2>
    <p>Entre votre email pour revoir un lien pour la réinitialisation de votre mot de passe</p>

    <form @submit.prevent="reset">
        <label for="email">Entre votre email:
        <input type="email" v-model="email" placeholder="Entrez votre email" name="email" id="email" autofocus>
        </label>
        <button type="submit">Reset</button>
    </form>
    <a href="#" >
    <RouterLink to="/login">Connexion</RouterLink>
    </a>
 </div>


</template>
<style scoped>
.glob{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  background-color: #FFFFFF;
  align-items: center;
  padding: 200px;
  text-align: center;
  border: 1px solid black;
  height: 40vh;
  font-size: 1.3em;
 
}

form{
  display: flex;
    flex-wrap: wrap;
    align-items: center;
    flex-direction: column;
    padding-bottom: 20px;
  
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
  padding-bottom: 10px;
  
}
.submit{
  display: flex;
  background-color: #6CD1BC;
  text-align: center;
  color: white;
  flex-direction: row-reverse;
  justify-content: space-around;
}

button{display: flex;
  justify-content: space-around;
  background-color: #6cd1bc;
  padding: 5px;
  border-radius: 30px;
  border: 1px solid black;
  
}
h2{padding: 10px;}
p{padding: 10px;}

a{
  background-color: #6cd1bc;
  
  padding: 5px;
  border-radius: 30px;
  
}

 

</style>
<script>
export default {
    data() {
      return {
        email: "",
        
      };
    },

    methods:{

      // requete async pour envoyer un email crée token unique dans l'url dans l'index avec :token sur le route 
      
         async reset  (){
            const body={
                email: this.email
            }
            const response = await fetch(
        "http://127.0.0.1:8000/api/forgot-password", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify(body),
      });


      const data = await response.json();

      console.log(data)
      
    }

}


}
</script>