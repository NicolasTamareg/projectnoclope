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
      smoked_cigarettes: "",
      elapse_days: "",
      final: "",
      saved: "",
      pourcentage: "",

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

      });
      const data = await response.json();
      this.project = data.project
      this.elapse_days = data.elapse_days
      this.date_created = data.date_created
      this.current_date = data.current_date
      this.crakings = data.crakings
      this.not_smoked_cigarettes_expectation = data.not_smoked_cigarettes_expectation
      this.smoked_cigarettes = data.smoked_cigarettes
      this.final = data.final
      this.saved = data.saved
      this.pourcentage = data.pourcentage.toFixed(2)
      console.log(this.saved)
    }
  },
  mounted() {
    this.DashboardProject();
  }
};


</script>




<template>
  <div class="all">
    <div class="block-1-2">
      <div class="parent-2">
      <div class="block2">
        <p>{{project.objective}}</p>
        <p>J-{{}}</p>
      <p>{{ saved }}</p>  <p>{{ project.price }}</p> <div class="progressbar-wrapper">
          <div title="downloaded" class="progressbar jours" :style="'width: ' + pourcentage + '%'">{{ pourcentage }}%
        </div>
    
    </div>
    
    </div>
  </div>
   
      <div class="dash">
      <div class="suivie">
        <p>Mon suivie</p>  <br>
      <div class="jours">{{ elapse_days.d }} <p>Jours</p>  </div>
      <div class="non-clope">{{ not_smoked_cigarettes_expectation }} <p> Clopes Non Fumées</p></div>
      <div class="clope">{{ smoked_cigarettes }} <p> Clope Fumées</p></div>
 
</div>


  </div>
  <div class="btn">
    <RouterLink to="/ange"> <button >J'ai envie</button></RouterLink>
    <RouterLink to="/craquer"> <button>J'ai craqué</button></RouterLink>
  </div>
  </div>

  <div></div>
  
   </div>
    
    



</template>

<style>
body{
  width: auto;
}
button{
 background-color: #69D5BF;
 color: white;
 border-radius: 10px;
 width: 100px;
 
}
 

.btn{
  display: flex;
    justify-content: space-around;
}

/* Barre */
 :root {
  --success: #00b894;
  --progress: #e17055;
}

.progressbar-wrapper {
  background-color: #dfe6e9;
  color: white;
  border-radius: 15px;
  width: 80%;
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
.container {
  display: flex;
  align-items: center;
}

 .suivie {
 
  display: flex;
  justify-content: space-around;
  align-items: center;
  
} 

.jours {
  width: 90px;
    height: 70px;
  background-color:#ffffffa0;
  border-radius: 10px;
  padding-right: 20px;
  color:#1C3357;
  
}
.non-clope{
  width: 90px;
    height: 70px;
  background-color:#ffffffa0;
  border-radius: 10px;
  padding-right: 20px;
  width: 106px;
    height: 80px;
color:#1C3357;
}
.clope{
  width: 90px;;
    height: 70px;
  background-color:#ffffffa0;
  border-radius: 10px;
  padding-right: 20px;
  color:#1C3357;

}

.raw {
  background-color: aqua;
  width: auto;
  height: auto;
  display: flex;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;


}




.block2{
  background-color: #ffffff9c;
  width: 40vw;
  margin-left: 74px;
  height: 200px;
  margin-left: 40px;
  border-radius: 10px;
  color:#1C3357;
 
}
.block3{
  background-color:#ACE7DC;
  width: 670px;
  border-radius: 10px;

}
.block-1-2{

  width: 60vw;
  height: 500px;
}
.parent-2{
  width: 47vw;
   
    background-color:#6CD1BC ;
    border-radius: 10px;
    margin-left: 70px;
    height: 230px;
}
.all{
  display: flex;
    justify-content: center;
    margin: 70px;
}
.dash{
  width: 700px;
  height: 100px;
  background-color:#ACE7DC;
  padding-right: 20px;
  margin: 24px;
  border-radius: 21px;
}
</style>
