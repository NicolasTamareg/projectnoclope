<template>
  <!-- formulaire de requete pour mot de passe oublier -->
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


</template>
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