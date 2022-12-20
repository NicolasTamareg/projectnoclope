<script>

export default {
  data() {
    return {
      userList: {},
      user:{},
      
    };
  },

  mounted: function () {
    this.getProfil();
  },
  methods: {
   
    async getProfil() {
      const token = localStorage.getItem("token")
      const response =await fetch(
        "http://127.0.0.1:8000/api/users/edit",{
        method: "GET",
        headers: {
          Accept: "application/json",
          "Authorization":"Bearer " + token
        },
      });
      // const response = await fetch(
      //   "http://127.0.0.1:8000/api/users/edit",
      //   options
      // );

      const data = await response.json();
      this.user = data.user;
      console.log(this.user)
      // console.log("responseBody", responseBody);
      // this.userList = responseBody;
    },
  },
  // components: { ProfilPage },
};

</script>


<template>
    <header>
<h2>Vous avez etait choisi comme ange gardien par {{user.firstname}} {{user.lastname}}</h2>
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