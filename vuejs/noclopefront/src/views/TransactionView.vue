<script>
export default {
  name: "App",
  

data() {
  return {
    operation:[],
    
  };
},

  methods :{
    //recupere les users
    async getOperation () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/adminoperation", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.operation = data.operation;
      

      console.log(this.operation)

     
    }, 
   
      
  },




mounted() {
          this.getOperation();
          
      }
};



</script>
<template>

<H2>les transactions</H2>

<div v-for = "operation in operation">
      

        <p>Montant :{{operation.amount}}€</p>

        <p> Date de transactions :{{operation.created_at}}</p>
    
</div>

</template>