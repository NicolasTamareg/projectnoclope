<script>
export default {
    el: '#app',
  data() {
    return {
        project: {},
            cigarettes_per_day: 0,
            date_created: {},
            crakings: {},
            current_date: {},
            not_smoked_cigarettes_expectation: {},
            smoked_cigarettes: {},
            elapse_days:{}

    };
  },
  mounted () {
   fetch('http://127.0.0.1:8000/api/dashboard/stats', { headers: { Authorization: `Bearer ${localStorage.getItem("token")}`}})
      .then(response =>response.json())
      .then(json => {
        this.cigarettes_per_day = json.cigarettes_per_day;
      })
    }
}

 
</script>



<template>

<div id="app">
  {{ cigarettes_per_day }}
</div>

</template>