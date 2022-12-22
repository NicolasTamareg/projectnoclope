<script>
export default {

  data() {
    return {
      project: "",
      cigarettes_per_day: "",
      date_created: "",
      crakings: "",
      current_date: "",
      not_smoked_cigarettes_expectation: "",
      smoked_cigarettes:"",
      elapse_days: "",
      final:"",
      saved:"",
      pourcentage:"",
     
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
      this.not_smoked_cigarettes_expectation=data.not_smoked_cigarettes_expectation
      this.smoked_cigarettes=data.smoked_cigarettes
      this.final=data.final
      this.saved=data.saved
      this.pourcentage=data.pourcentage.toFixed(2)
      console.log(this.saved)
    }
  },
  mounted() {
            this.DashboardProject();
        }
};


</script>




<template>
  <div class="raw">
<div class="container">
  <div class="child-2">

    
     <div class="progressbar-wrapper">
     <div title="downloaded" class="progressbar jours" :style="'width: ' + pourcentage + '%'"  >{{pourcentage}}%</div>
     </div>
    
  </div>
   <!-- {{project.price}} -->
</div>
 </div>

<div class="suivie">
  Mon suivie
  <div class="jours">{{elapse_days.d}} <br> Jours </div>
  <div class="non-clope">{{not_smoked_cigarettes_expectation}} <br> Clopes Non Fumées</div>
  <div class="clope">{{ smoked_cigarettes}} <br> Clope Fumées</div>

</div>


</template>

<style>
/* Barre */
:root {
  --success: #00b894;
  --progress: #e17055;
}

.progressbar-wrapper {
  background-color: #dfe6e9;
  color: white;
  border-radius: 15px;
  width: 100%;
}

.progressbar {
  background-color: var(--progress);
  color: white;
  padding: 1rem;
  text-align: right;
  font-size: 20px;
  border-radius: 15px;
}

.progressbar[title="downloading"] {
   background-color: var(--progress);
}

.progressbar[title="downloaded"] {
   background-color: var(--success);
}

/* Fin barre */
.container{
  display: flex;
  align-items: center;
}
.suivie{
  width: 100%;
  height: 100%;
  background-color: aquamarine;
}
.jours{
  width: 50px;
  height: 50px;
  background-color: blue;
  border-radius: 10px;
}

.raw{
  background-color: aqua;
  width: auto;
  height: auto;
  
}

.container{
  position: relative;
  width: 500px;
  height: 500px;
  background-color: coral;
}

.child-2{
  position: absolute;
  z-index: 2; 
  background: lightgreen;
  bottom: 10px;
  width: 100%;
  height: 7em;
  opacity: 0.9;
}



</style>