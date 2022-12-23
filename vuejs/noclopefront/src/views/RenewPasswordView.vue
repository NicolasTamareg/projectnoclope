<template>
    <!-- formulaire de changement de mot de passe -->
    <div class="all">
        <form @submit.prevent="submitRenewPassword">
            <label for="email">Email:
                <input type="email" v-model="email" name="email" id="email">
            </label>

            <label for="password">Password:
                <input type="password" v-model="password" name="password" id="password">
            </label>
            
            <label for="confirm_password">Confirm password:
                <input type="password" v-model="confirmPassword" name="confirm_password" id="confirm_password">
            </label>

            <button type="submit">Valider</button>

        </form>
    </div>
</template>

<style scoped>
.all{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  border-radius: 10px;
  padding: 40px;
  width: fit-content;
  text-align: center;
  background-color: #FFFFFF;
  border: 1px solid black;
  max-width: 24rem;
  
}
input{
  
  display: block;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  border: 1px solid black;
  border-radius: 30px;
  text-align: center;
}

label[data-v-45f5edd7]{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  text-align: center;
}
.submit{
  display: flex;
  background-color: #6CD1BC;
  text-align: center;
  color: white;
  flex-direction: row-reverse;
  justify-content: space-around;
}
button{
  margin-top: 20px;
  padding: 10px;
  font-size: 1em;
  background-color: #6CD1BC;
  color: white;
  border: 2px solid black;
  border-radius: 30px;
  width: 25vh;
  
}
</style>

<script>

export default {
    data() {
        return {
           email: "",
           password: "",
           confirmPassword: "",
           token:null,
        }
    },

    methods: {

        // requete async pour modifer le mot de passe
        async submitRenewPassword() {


            const response = await fetch('http://127.0.0.1:8000/api/reset-password',{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    "Accept": "application/json"
                },
                body: JSON.stringify({
                    email: this.email,
                    password: this.password,
                    confirm_password: this.confirmPassword,
                    token: this.$route.params.token
                })
            });

            const data = await response.json()

        }
    }


}

</script>