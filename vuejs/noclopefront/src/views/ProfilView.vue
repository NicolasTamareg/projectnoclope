<script>
import ProfilPage from "../components/ProfilPage.vue";

export default {
  data() {
    return {
      userList: {
      },

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
      this.showModifierProfil = !this.showModifierProfil
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
    <p class="photoProfil">
      <img src="src\assets\Chat_Match_1avatard.png" alt="" />
    </p>
    <button @click="modifierProfil" id="inputModifierProfil">
      <i class="fa-solid fa-sun"></i>
    </button>
    <ProfilPage :profile="userList" v-if="showModifierProfil" />
    <p>@{{ userList.firstname }} </p>
    <p>{{ userList.lastname }}</p>

    <textarea cols="" rows="" placeholder="Ecrivez votre bio ici..."></textarea>

  </div>

</template>

<style scoped>
#inputModifierProfil {
  padding: 2px;
  background-color: #fe8c0e;
  color: white;
  border: 0px;
  border-radius: 5px;
}

#inputModifierProfil:hover {
  cursor: pointer;
  background-color: #f9ddbe;
  color: #fe8c0e;
  transition: all 0.2s;
}

#inputCreatePost {
  margin: 20px;
  padding: 10px;
  background-color: #fe8c0e;
  color: white;
  border: 0px;
  border-radius: 5px;
  font-size: 15px;
}

#inputCreatePost:hover {
  cursor: pointer;
  background-color: #f9ddbe;
  color: #fe8c0e;
  transition: all 0.2s;
}

h1 {
  text-align: center;
  padding: 5px;
  color: #fe8c0e;
}

.card {
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: white;
  height: 340px;
  padding: 5px;
  box-shadow: 1px 1px 5px 1px lightgray;
  border-radius: 20px;
}

.photoProfil {
  background-color: transparent;
  height: 100px;
  width: 100px;
  padding: 5px;
}

img {
  height: 100%;
  width: 100%;
  border-radius: 100px;
}

textarea {
  cursor: pointer;
  width: 300px;
  height: 100px;
  margin: 0;
  resize: none;
  background-color: white;
  border: 1px solid grey;
  outline: none;
  padding: 5px;
  box-shadow: 0.5px 0.5px 2.5px 0.5px lightgray;
  border-radius: 5px;
  font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue",
    sans-serif;
  scroll-behavior: smooth;
}

p {
  font-size: larger;
  font-weight: 400;
}

@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
