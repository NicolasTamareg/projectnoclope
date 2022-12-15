<script>
export default {

  data() {
    return {
      project: {},
      cigarettes_per_day: {},
      date_created: {},
      crakings: {},
      current_date: {},
      not_smoked_cigarettes_expectation: {},
      smoked_cigarettes:{},
      elapse_days: {},
     
    };
  },

  methods: {
    async DashboardProject() {
    
      const token = localStorage.getItem("token")
      const response = await fetch("http://127.0.0.1:8000/api/dashboard/stats", {
        method: "GET",
        headers: {
         
          "Accept": "application/json",
          "Authorization": "Bearer " + token,
        },
        // body: JSON.stringify(body),
      });
      const data = await response.json();
      this.project= data.project
      this.elapse_days=data.elapse_days
      this.date_created=data.date_created
      this.current_date=data.current_date
      this.crakings=data.crakings
      console.log(this.current_date)
     
    }
  },
  mounted() {
            this.DashboardProject();
        }
};


</script>



<template>

  <div >
    project
    {{ project.objective }}
  </div>
  <div >
    elapse_days
    {{ elapse_days.days}}
  </div>

<div>
  crakings
  {{crakings}}
</div>

</template>