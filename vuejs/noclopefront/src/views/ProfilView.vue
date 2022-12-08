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
        "https://social-network-api.osc-fr1.scalingo.io/projetnoclope/user",
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
      <i class="fa-solid fa-sun"></i>
    </button>
    <ProfilPage :profile="userList" v-if="showModifierProfil" />
    <p>{{ userList.firstname }}</p>
    <p>{{ userList.lastname }}</p>

    <textarea cols="" rows="" placeholder="Ecrivez votre bio ici..."></textarea>
    <a href="/craque"><button>J'ai craqué</button></a>
  </div>
</template>

<style scoped>


</style>
