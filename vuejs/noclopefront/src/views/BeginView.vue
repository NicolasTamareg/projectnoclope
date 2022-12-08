<script>
export default {
  name:"App",
  data() {
    return {
      objective: "",
      price: "",
      pricepack: "",
      numbersmoke:"",
      feedbackMessage:"",
    };
  },

  methods:{
        async createProject(){
            const body = {
                objective:this.objective,
                price:this.price,
                pricepack:this.pricepack,
                numbersmoke:this.numbersmoke,
            };
            const response = await fetch("http://127.0.0.1:8000/api/projects",{
                method: "POST",
                headers:{
                    "Content-Type": "application/json",
                    "Accept":"application/json",
                },
                body: JSON.stringify(body),
            });
            const data =await response.json();
            this.feedbackMessage = data.message;
        }
    },
};
</script>




<template>
  <div class="arround">
  <h1>Simulation</h1>
  <h3>Faites une simulation rapide et gratuite</h3>
<form @submit.prevent="createProject">
  <label for="">Objectif</label>
  <input type="text" placeholder="Ex: voyage..." id="objective" v-model="objective" name="objective" required />

  <label for="">Prix</label>
  <input type="number" placeholder="Entrez le prix de l'objectif..." id="price" v-model="price" name="price" required />

  <label for="">Prix</label>
  <input type="number"  placeholder="10€" id="price" v-model="pricepack" />


  <label for="">Consommation Journalière</label>
  <input type="number" placeholder="Consommation de cigarettes" id="numbersmoke" v-model="numbersmoke" name="numbersmoke" required/>

  <input type="submit" name="selancer" value="Commencer" id="selancer" />
  </form>
  <p>{{feedbackMessage}}</p>

  
  </div>
</template>


<style scoped>
</style>


