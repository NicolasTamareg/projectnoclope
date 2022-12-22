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
    <header>
<h2>Vous avez etait choisi comme ange gardien !</h2>
</header>

<br>
<main>

<p>Voulez vous l'aidez a arreter de fumer ?</p>



  <form @submit.prevent="addToAngel">
      
  <button type="submit">Accepter</button>
  
  </form>


<form @submit.prevent="DeleteToAngel">

    <button type="submit">Refuser</button>

</form>


</main>




</template>