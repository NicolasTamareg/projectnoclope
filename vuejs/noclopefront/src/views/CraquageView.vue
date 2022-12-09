<script>
export default {
  name:"App",
  data() {
    return {
        numbercigarette: "",
      result: false,
    };
  },
  methods:{
    async createCraquage(){
        const body = {
            numbercigarette:this.numbercigarette,
        };
        const response = await fetch("http://127.0.0.1:8000/api/craques",{
            method: "POST",
            headers:{
                "Content-Type": "application/json",
                "Accept":"application/json",
            },
            body: JSON.stringify(body),
        });
        const data =await response.json();
        this.feedbackMessage = data.message;
    }
},

    };
</script>



<template>
    <div class="arround">
    <h1>Oups, ca arrive...</h1>

    <form form @submit.prevent="createCraquage" >
<label for="">Combien de cigarettes ?</label>
<input type="number" placeholder="Entrez le chiffre" v-model="numbercigarette" required>
<input type="submit">
    </form>
    <p>{{feedbackMessage}}</p>
</div>
</template>

<style scoped>

</style>