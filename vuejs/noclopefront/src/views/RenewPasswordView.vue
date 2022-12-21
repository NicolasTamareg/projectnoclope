<template>
    <div>
        <form @submit.prevent="submitRenewPassword">
            <label for="email">Email:
                <input type="email" v-model="email" name="email" id="email">
            </label>

            <label for="password">Password:
                <input type="text" v-model="password" name="password" id="password">
            </label>
            
            <label for="confirm_password">Confirm password:
                <input type="text" v-model="confirmPassword" name="confirm_password" id="confirm_password">
            </label>

            <button type="submit">Valider</button>

        </form>
    </div>
</template>

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