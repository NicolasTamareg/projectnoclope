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
          Authorization: "bearer",
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

      <input
        :class="profileUpdated"
        type="submit"
        id="inputModifier"
        value="Modifier"
      />
    </form>
  </div>
</template>

<style scoped></style>
