<script>
export default {
  props: ["profile"],
  data() {
    return {
      profileUpdated: this.$props.profile,
    };
  },

  methods: {
    modifierProfil() {
      this.showModifierProfil = !this.showModifierProfil;
      this.showProfilUpdated;
    },
    async updateProfile() {
      const options = {
        method: "PUT",
        headers: {
          "Content-Type": "application/json",
          Authorization: "bearer" 
        },
        body: {
          firstname: JSON.stringify.this.profileUpdated,
          
          // email: String,
          // age: Number,
          // occupation: String,
        },
      };

      const response = await fetch(
        "https://social-network-api.osc-fr1.scalingo.io/chat-match/user",
        options
      );

      const modifyProfil = await response.json();
      console.log(modifyProfil);
    },
  },
};
</script>

<template>
  <div id="card-post">
    <form @submit.prevent="profileUpdated">
      <input v-model="profileUpdated.firstname" type="firstname" />
      <input v-model="profileUpdated.lastname" type="lastname" />
 
      <input  :class="profileUpdated" type="submit" id="inputModifier" value="Modifier"/>
      
    </form>
  </div>
</template>

<style scoped>
form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

#inputModifier {
  padding: 2px;
  background-color: #fe8c0e;
  color: white;
  border: 0px;
  border-radius: 5px;
}

#inputModifier:hover {
  cursor: pointer;
  background-color: #f9ddbe;
  color: #fe8c0e;
  transition: all 0.2s;
}

input {
  border: none;
  text-align: center;
  font-family: Inter, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
    Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue",
    sans-serif;
  outline: none;
  background-color: #f9ddbe;
  margin: 2px;
  border-radius: 5px;
  box-shadow: 1px 1px 2px 1px lightgray;
  color: #fe8c0e;
  font-weight: 500;
}
</style>
