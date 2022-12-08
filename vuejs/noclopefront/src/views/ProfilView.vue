<script>
import ProfilPage from "../components/ProfilPage.vue";

export default {
  data() {
    return {
      userList: {},

      result: true,
      token: "",
      profile: {},

      showCreatePost: false,
      showModifierProfil: false,
    };
  },

  mounted: function () {
    this.getProfil();
  },
  methods: {
    modifierProfil() {
      this.showModifierProfil = !this.showModifierProfil;
    },
    togglePost() {
      this.showCreatePost = !this.showCreatePost;
    },
    async getProfil() {
      const options = {
        method: "GET",
        headers: {
          "Content-Type": "application/json",
          Authorization: "bearer " + localStorage.getItem("token"),
        },
      };
      const response = await fetch(
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/vuejs/noclopefront/user",
        options
      );

      const responseBody = await response.json();
      this.profile = responseBody;
      console.log("responseBody", responseBody);
      this.userList = responseBody;
    },
  },
  components: { ProfilPage },
};
</script>

<template>




  <div class="card">
    <button @click="modifierProfil" id="inputModifierProfil">
    </button>
    <ProfilPage :profile="userList" v-if="showModifierProfil" />
    <p>{{ userList.firstname }}</p>
    <p>{{ userList.lastname }}</p>

    <div class="objectif">
      <h1>Jour 1</h1>
      <div class="voyage">
<h3>Voyage Voyage</h3>
      </div>
      <div class="separe"></div>
      <h2>100/1000€</h2>
      <div class="progression">
      </div>
    </div>
    <a href="/craquer"><input type="submit" value="J'ai craqué"></a>
    <a href="/ange"><input type="submit" value="Contacter mes anges gardiens"></a>
    <a href="/avance"><input type="submit" value="Demander une avance"></a>
  </div>
</template>

<style scoped>

.objectif{
  border: solid 1px black;
  height: 500px;
  width: 400px;
  background-color: grey;
  margin-top: 0.25rem;
  padding: 6px;
  border-radius: 8px;
  border: 1px solid black;
  box-shadow: 2px 2px 10px 2px lightgray;
}
.voyage{
  margin-left: 30%;
  margin-top: 20%;
  height: 150px;
  width: 150px;
  background-color: black;
  color: beige;
  margin-top: 0.25rem;
  padding: 6px;
  border-radius: 8px;
  border: 1px solid black;
  box-shadow: 2px 2px 10px 2px lightgray;
}
.progression{
  height: 20px;
  width: 90%;
  background-color: aquamarine;
  margin-left: 20px;
  margin-top: 0.25rem;
  padding: 6px;
  border-radius: 8px;
  border: 1px solid black;
  box-shadow: 2px 2px 10px 2px lightgray;
}
h2{
  text-align: center;
}
.separe{
  height: 100px;
}


</style>
