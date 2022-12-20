<template>

<div class="form">
   <h2>Demande d'avance sur cagnotte</h2>
<form class="form2" action="/profil">
<p>Bonjour, je souhaiterais retirer une avance de:
    
    <select name="" id="">
        <option value="">50%</option>
        <option value="">100%</option>
    </select>
    
   de ma cagnotte actuelle. Bien à vous.
    
</p>

<input type="submit">
</form>
 
</div>



</template>

<style scoped>

.form{
    display: flex;
  flex-direction: column;
  justify-content: space-evenly;
  padding: 10px;
  background: linear-gradient(to bottom, #69D5BF, #ACE7DC, #FFFFFF);
  
  padding: 20px;
  width: 100%;
  text-align: center;
  border: 1px solid black;
  height: 50vh;
  
}
.form2{display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;}
input{
    display: flex;
  flex-direction: column;
  justify-content: space-around;
  padding: 10px;
  border: 1px solid black;
  border-radius: 30px;
  text-align: center;
  width: 40vh;
  align-items: center;
  background-color: #6CD1BC;
  
}
input:hover{
    background-color: #4f9a8b;
}
p{
    padding: 30px;
}
</style>