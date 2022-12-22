<script>
export default {
  name: "App",
  data() {
    return {
      contacts:[],
      firstname: "",
      lastname: "",
      email: "",
      result: null,
      token: "",
      feedbackMessage: "",
    };
  },

  methods: {

    //recupere les contacts
    async getContacts () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/contacts", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.contacts = data.contacts;

      console.log(this.contacts)
    },

    async helpContacts () {
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/test", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      const data = await response.json();
      this.feedbackMessage = data.message;

      console.log(this.feedbackMessage)
    },

    //Ajouter des contacts    
      addToContact :async function() {
        const body = {
          firstname: this.firstname,
          lastname: this.lastname,
          email: this.email,
          
        };
          const token = localStorage.getItem("token");
          const option = await fetch( "http://127.0.0.1:8000/api/contacts",{
          
            method: "POST",
            headers: {
                "Content-Type":"application/json",
                Accept: "application/json",
                "Authorization":"Bearer " + token
              },

              body: JSON.stringify(body),
            
        });
          // const response = await fetch(
          //   "http://127.0.0.1:8000/api/contacts"
            
          //   );
          const data = await option.json();
          this.feedbackMessage = data.message;
          this.getContacts();
          
      },

     
      
  },

  mounted:async function () {
    this.getContacts();
    // this.helpContacts();
   } 
  // mounted() {
    
  //   this.getContacts();
  // },
};
</script>

<template>
  <div class="englobe-all">
    <div class="arround">
      <h2>Vos anges Gardiens</h2>

      <div v-for = "contacts in contacts" :key="user_id">
        <div v-if = "contacts.verified==null" >
        </div>
          <li v-else>
          
            <p>Nom: {{contacts.firstname}}</p>
            <p>Prénom: {{contacts.lastname}}</p>
            <p>Email : {{contacts.email}}</p>
          </li>
      </div>
 
      <!-- <p>{{contacts.firstname}}</p> -->

      <form class="allo" @submit.prevent="addToContact">
        <label for="">Nouvel Ange-Gardien </label>

          <label for="lastname"></label>
          <input type="text" placeholder="Nom" id="lastname" v-model="lastname" required/>

          <label for="firstname"></label>
          <input type="text" placeholder="Prénom" id="firstname" v-model="firstname" required/>

          <label for="email"></label>
          <input type="email" placeholder="Email" id="email" v-model="email" required/>

          <label for="submit"></label>
          <input class="submit"  type="submit" value="Valider" />

        
      </form>
      
      <form class="lola" @submit.prevent="helpContacts">
        
        <button type="submit">JE VAIS CRAQUER !</button>
      </form>
      

      
    <p>{{ feedbackMessage }}</p>

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

.allo{
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
button{
  margin-top: 10px;
  padding: 10px;
  font-size: 1em;
  background-color: #6CD1BC;
  color: white;
  border: 2px solid black;
  border-radius: 30px;
  width: fit-content;
}
.nothing{
  display: none;
}


</style>
