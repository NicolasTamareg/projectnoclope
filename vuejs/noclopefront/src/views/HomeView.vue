<template>
  <div class="ok">
    <main class="main">
      <div class="intro2">
      </div>
      <div class="ab">
         <h1>NO CLOPE</h1>
        <p>Le premier site qui va vous faire arreter de fumer!</p> 
      </div>
    </main>
    <div class="intro">
      
      <main>
  
  <div class="achievements">
    <div class="work">
      <i class="fas fa-atom"></i>
      <p class="work-heading">Etape 1</p>
      <p class="work-text">Cree ton objectif en quelques cliques !.</p>
    </div>
    <div class="work">
      <i class="fas fa-skiing"></i>
      <p class="work-heading">Etape 2</p>
      <p class="work-text">Suis en temps réel l'évolution de ton objectif <br> et ta consommation réduite! .</p>
    </div>
    <div class="work">
      <i class="fas fa-ethernet"></i>
      <p class="work-heading">Etape 3</p>
      <p class="work-text">Ton objectif atteint! et une réussite <br> garantis d'arrêter de fumer!.</p>
    </div>
  </div>
  <div class="about-me">
    <div class="about-me-text">
      <h2>A Propos De Nous</h2>
      <p>nous sommes la seule application qui a pour but d'aider l'utilisateur à arrêter de fumer et de réaliser leur projet .
notre but est de suivre nos clients tout au long de leur projet les aider à atteindre leurs objectifs tout en diminuant la consommation journalière de cigarette jusqu'a à arrêter définitivement et réduit leur cout sûr et orienté leur argent dans des loisirs qu'il peut des à présent réaliser.</p>
    </div>
    <img src="../views/img/logo2.png" alt="me">
  </div>
</main>
    </div>
  </div>
</template>

<style scoped>
.main{
  display: flex;
  justify-content: center;
  padding: 40px;
}

.ok {
  display: flex;
  flex-direction: column;
  align-items: center;
  background: linear-gradient(to bottom , #69D5BF, #FFFFFF );

}
.intro {
  display: flex;
  
  width: 100vw;
  height: 700px;
}
.intro2{
  display: flex;
  width: 25vw;
  height:  60vh;
  background-image: url(../views/img/logo-principal.png);
  background-position: center;
  background-size: cover;
  color: white;
  text-align: center;
  justify-content: center;
}
h1 {
  display: flex;
  justify-content: center;
  text-align: center;
  font-size: 4em;
  flex-direction: column;
  color: black;
  text-shadow: rgb(255, 255, 255) 7px 0 3px;
  padding-left: 40px;
}
p{
  text-shadow: rgb(255, 255, 255) 1px 0 10px;
  text-align: center;
  padding-left: 40px;
}
.ab {
  text-align: center;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  text-shadow: 2px 2px 3px #6CD1BC;
}


.intro h1 {
  font-family: sans-serif;
  font-size: 60px;
  color: #fff;
  font-weight: bold;
  text-transform: uppercase;
  margin: 0;
}

.intro p {
  font-size: 20px;
  color: #d1d1d1;
  text-transform: uppercase;
  margin: 20px 0;
}

.intro button {
  background-color: #5edaf0;
  color: #000;
  padding: 10px 25px;
  border: none;
  border-radius: 5px;
  font-size: 20px;
  font-weight: bold;
  cursor: pointer;
  box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.4)
}

.achievements{
  display: flex;
  justify-content: space-around;
    flex-wrap: nowrap;
    flex-direction: row;
    padding: 20px; 
    width: fit-content;
}

.achievements .work {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;

}

.achievements .work i {
 
  font-size: 50px;
  color: #333333;
  border-radius: 50%;
  border: 2px solid #333333;
  padding: 12px;
}

.achievements .work .work-heading {
  font-size: 20px;
  color: #333333;
  text-transform: uppercase;
  margin: 10px 0;
}

.achievements .work .work-text {
  font-size: 15px;
  color: #585858;
  margin: 10px 0;
}

.about-me {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 80px;
  border-top: 2px solid #eeeeee;
  border-color: #6CD1BC;
  flex-wrap: wrap;
  width: fit-content;
}

.about-me img {
  width: 150px;
  max-width: 100%;
  height: auto;
  border-radius: 10px;
  margin-left: 15px;
  margin-top: 15px;
}

.about-me-text h2 {
  font-size: 30px;
  color: #333333;
  text-transform: uppercase;
  margin: 0;
  text-align: center;
}

.about-me-text p {
  font-size: 15px;
  color: #585858;
  margin: 10px 0;}

  @media (max-width: 766px){

    .achievements{
  display: flex;
  flex-direction: column;
  justify-content: space-around;
    flex-wrap: wrap;
    flex-direction: row;
    padding: 20px; 
    width: fit-content;
}

.intro2{
  display: none;
};


.about-me{
  display: flex;
  flex-direction: column;
}
  
}
</style>
