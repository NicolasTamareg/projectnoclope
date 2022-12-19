<script>
  export default {
  
  data() {
    return {
      user_id:{},
      objective: "",
      user:{}, 
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
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/projects",{
          method: "POST",
          headers:{
              "Content-Type": "application/json",
              "Accept":"application/json",
              "Authorization":"Bearer " + token,
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
   <div class="englobe-all">

     <div class="arround">
       <form @submit.prevent="createProject">
       <h1>Simulation</h1>
       <h3>Faites une simulation rapide et gratuite</h3>
   
       <label for="objective"></label>
       <input type="text" placeholder="Ex: voyage..." id="objective" v-model="objective" name="objective" required />
   
       <label for="price"></label>
       <input type="number" placeholder="Entrez le prix de l'objectif..." id="price" v-model="price" name="price" required />
   
       <label for="Prixpack"></label>
       <input type="number"  placeholder="10€" id="price" v-model="pricepack" />
   
   
       <label for="numbersmoke"></label>
       <input type="number" placeholder="Consommation de cigarettes" id="numbersmoke" v-model="numbersmoke" name="numbersmoke" required/>
        
       <label for="submit"></label>
       <input type="submit" class="submit" name="selancer" value="Commencer" id="selancer" />
       </form>
       <p>{{feedbackMessage}}</p>
   
     
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
  background-color: #FFFFFF;
  border-radius: 30px;
  padding: 20px;
  width: 30vw;
  text-align: center;
  border: solid 1px black; 
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
  background-color: #6CD1BC;
  text-align: center;
  color: white;
  flex-direction: row-reverse;
  justify-content: space-around;
}
.englobe-all {
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
h3 {
  padding: 20px;
  font-size: 1em;
  color: black;
}
button{
  margin-top: 20px;
  padding: 10px;
  font-size: 1em;
  background-color: #6CD1BC;
  color: white;
  border: 2px solid white;
  border-radius: 30px;
  width: 20vw;
}
button:hover{
  background-color: #FFFFFF;
  color: black;
}

</style>


