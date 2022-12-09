<template>
  <body>
    <div class="container">
    <h1>NoClope</h1>
    <h2>Osez enfin essayer d'arrêter de fumer</h2>
    <p>Avec cette application vous avez l'avantage de pouvoir arrêter de fumer 
    tout en economisant, le suivi est quotidien.
   </p>
    <div class="main-container">
        <div class="card">
          <h2 class="card-title">JOUR 1!</h2>
             <img src="https://images.pexels.com/photos/1248427/pexels-photo-1248427.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" class="card-img-top" alt="...">
             
             <p class="card-text">Continue !!</p>
             <div class="progress">
                   <div class="progress-value">500/1000€</div>
             </div>
       </div>
    </div>

   
      <a href="/lancer">Se lancer !</a>
      
    
  </div>
  </body>
</template>


<style scoped>
img{height: 250px;
width: 250px;
border-radius: 15pxg;}



.progress {
  
  justify-content: flex-start;
  border-radius: 100px;
  align-items: center;
  position: relative;
  padding: 0 5px;
  display: flex;
  height: 40px;
  width: 500px;
  align-items: center;
justify-content: center;
display: flex;
}

.progress-value {
  animation: load 3s normal forwards;
  box-shadow: 0 10px 40px -10px #fff;
  border-radius: 100px;
  background: #fff;
  height: 30px;
  width: 0;
align-items: center;
justify-content: center;
display: flex;
}

@keyframes load {
  0% { width: 0; }
  100% { width: 68%; }
}

.container{
height: 100vh;
width: 100%;
text-align: center;
}
.main-container{
  width: 500px;
  height: 500px;
  background-color: brown;
  margin-left: 17%;
  text-align: center;
  align-items: center;
  justify-content: space-around;
  display: flex;
}

a{
  text-align: center;
  font-size: x-large;
}
a:hover{
  font-weight: 600;
}

</style>
