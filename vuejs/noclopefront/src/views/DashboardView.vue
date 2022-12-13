<script>
export default {
  data() {
    return {
      email: "",
      password: "",
      result: null,
      token: "",
      feedbackMessage: null
    };
  },

  methods: {
    async getStats() {
      const options = {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "Accept": "application/json"
        },
        body: JSON.stringify({
            project: this.project,
            cigarettes_per_day: this.cigarettes_per_day,
            date_created: this.date_created,
            crakings: this.crakings,
            current_date: this.current_date,
            not_smoked_cigarettes_expectation: this.not_smoked_cigarettes_expectation,
            smoked_cigarettes: this.smoked_cigarettes,
            elapse_days: this.elapse_days

        }),
      };
 
      const response = await fetch(
        "http://127.0.0.1:8000/api//dashboard/stats",
        options
      );

      const data = await response.json();
      
      if(response.status !== 200) {
        this.feedbackMessage = data.message ?? "Une erreur s'est produite";
        return;
      }
      
      if (!data.token) {
        this.feedbackMessage = "Une erreur s'est produite";
        return;
      }

      this.token = data.token;
      localStorage.setItem("token", data.token);
      this.$router.push("/dashboard/stats");
    },
  },
  computed:{
 

  },
};
</script>



<template>
<p>{{{project}}}</p>

</template>