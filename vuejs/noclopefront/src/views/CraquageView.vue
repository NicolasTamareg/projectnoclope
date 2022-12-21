<script>
export default {
  name:"App",
  data() {
    return {
        feedbackMessage:"",

        numbercigarette: "",
        
      result: false,
    };
  },
  methods:{
    async createCraquage(){
        const body = {
            numbercigarette:this.numbercigarette,
        };
        const token = localStorage.getItem("token")
        const response = await fetch("http://127.0.0.1:8000/api/craques",{
            method: "POST",
            headers:{
                "Content-Type": "application/json",
                "Accept":"application/json",
                "Authorization":"Bearer " + token
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
    <h2>Oups, ca arrive..</h2>
    <!-- <p><a href="#">Craquage !</a></p> -->
    
    <form action="#" method="POST" form @submit.prevent="createCraquage">
      <input type="hidden" name="remember" value="true">
      <div>
        <div>
          <label >Combien de cigarettes ?</label>
          <input id="email-address" v-model="numbercigarette" required  type="number" placeholder="Entrez le chiffre">
        </div>
        
        <button type="submit">J'ai craquer</button>
      </div>
    </form>
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
  background-color: #FFFFFF;
  border-radius: 30px;
  padding: 20px;
  width: fit-content;
  text-align: center;
  border: 1px solid black;
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
.englobe-all{
    display: flex;
    justify-content: center;
    background: linear-gradient(to bottom , #69D5BF, #FFFFFF );
    padding: 40px 40px 40px 40px;
}
h2 {
  padding: 20px;
  font-size: 1.5em;
  color: black;
}
p {
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
  border: 2px solid black;
  border-radius: 30px;
  
  width: fit-content;
}
</style>
