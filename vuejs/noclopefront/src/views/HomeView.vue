<template>
  <div class="ok">
    <main class="main">
      <div class="intro2">
        <div class="ab">
          <h1>NO CLOPE</h1>
          <p>Le premier site qui va vous faire arreter de fumer</p>
        </div>
      </div>
    </main>
    <div class="intro">
      
      <main>
  
  <div class="achievements">
    <div class="work">
      <i class="fas fa-atom"></i>
      <p class="work-heading">Etape 1</p>
      <p class="work-text">Cree ton objectif en quelque clique !.</p>
    </div>
    <div class="work">
      <i class="fas fa-skiing"></i>
      <p class="work-heading">Etape 2</p>
      <p class="work-text">Suis en temps réel l'évolution de ton objectif et ta consommation réduite .</p>
    </div>
    <div class="work">
      <i class="fas fa-ethernet"></i>
      <p class="work-heading">Etape 3</p>
      <p class="work-text">Ton objectif est atteint et réussite garantis d'arrêter de fumer bravo!.</p>
    </div>
  </div>
  <div class="about-me">
    <div class="about-me-text">
      <h2>A Propos De Nous</h2>
      <p>I am a web developer and I love to create websites. I am a very good developer and I am always looking for new projects. I am a very good developer.</p>
    </div>
    <img src="https://images.unsplash.com/photo-1596495578065-6e0763fa1178?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80" alt="me">
  </div>
</main>
    </div>
  </div>
</template>

<style scoped>
.main {
  display: flex;
}

.ok {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.intro {
  display: flex;
  
  width: 100vw;
  height: 700px;
}
.intro2 {
  display: flex;
  width: 100vw;
  height: 700px;
  background-image: url(https://images8.alphacoders.com/359/thumb-1920-359901.jpg);
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
}
.ab {
  text-align: center;
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  text-shadow: 2px 2px 3px red;
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

.achievements {
  display: flex;
  justify-content: space-around;
  align-items: center;
  padding: 40px 80px;
}

.achievements .work {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 40px;
}

.achievements .work i {
  width: fit-content;
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
}

.about-me img {
  width: 500px;
  max-width: 100%;
  height: auto;
  border-radius: 10px;
}

.about-me-text h2 {
  font-size: 30px;
  color: #333333;
  text-transform: uppercase;
  margin: 0;
}

.about-me-text p {
  font-size: 15px;
  color: #585858;
  margin: 10px 0;}
</style>
