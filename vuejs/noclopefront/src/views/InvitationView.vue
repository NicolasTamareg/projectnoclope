<script>

export default {
  data() {
    return {
      userList: {},
      user:{},
      contact:{},
      token:"",
      verified:null,
      message:"",
      
    };
  },

  mounted () {
    this.token=this.$route.params.token
    
  },
  methods: {
    
   
    async addToAngel() {
      const token=this.token
      console.log("token",token)
      const response =await fetch(
        `http://127.0.0.1:8000/api/invitation/${token}`,{
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          "Authorization": `bearer ${token}` 
          
        },
        body: JSON.stringify({
          verified: 1,
          // token : this.$route.params.token
        })
      });
     
      
      const data = await response.json();
      this.contact = data.contact;
      console.log(this.contact)
      this.$router.push({ name: 'home' })
      
    },

    async DeleteToAngel() {
      const token=this.token
      const response =await fetch(
        `http://127.0.0.1:8000/api/deletecontac/${token}`,{
        method: "DELETE",
        headers: {
          "Content-Type": "application/json",
          Accept: "application/json",
          
        },
       
      });
     

      const data = await response.json();
      this.message = data.message;
      console.log(this.message)
      this.$router.push({ name: 'home' })
      
      
    },
  },
  // components: { ProfilPage },
};

</script>


<template>
  <div class="all">
        <header>
<h2>Vous avez etait choisi comme ange gardien !</h2>
</header>
<img class="angel" src="../views/img/image3.png" alt="">


<br>
<main>

<p>Voulez vous l'aidez a arreter de fumer ?</p>


<div class="style">
   <form @submit.prevent="addToAngel">
      
  <button class="vert" type="submit">Accepter</button>
  
  </form>


<form @submit.prevent="DeleteToAngel">

    <button class="rouge"  type="submit">Refuser</button>

</form>
</div>
 


</main>
  </div>
    




</template>

<style scoped>

.all{
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
.vert{background-color: aquamarine;
  border-radius: 10px;
  border: 1px solid black;}
.rouge{background-color: red;
  border-radius: 10px;
  border: 1px solid black;}

  .style{display: flex;
  justify-content: space-around;}

  .vert:hover {
  background-color: #6cd1bc;
  border-radius: 30px;

  color: white;
}
.rouge:hover {
  background-color: #f51111;
  border-radius: 30px;

  color: white;
}

button{
  padding: 5px;
}

p{padding: 10px;}

.angel{
  height: 25vh;
  width: 25vh;
}
@media (max-width: 766px) {
  .all{
  display: flex;
  flex-direction: column;
  background-color: #f7f4f4;
  border: 1px solid black;
  padding: 1px;
}
  
}
</style>