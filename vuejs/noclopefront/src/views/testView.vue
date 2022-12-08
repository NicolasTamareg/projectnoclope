<template>
    <div>
        <h2>Liste des contacts</h2>
        <ul>
            <li v-for="contact in contacts" :key="contact.id">
    <p>prenom: {{contact.firstname}}</p>
    <p>prenom: {{contact.lastname}}</p>
    <p>prenom: {{contact.telephone}}</p>
            </li>
        </ul>
    </div>
    
    
    </template>
    
    <script>
        export default{
    name:"App",
    
    data(){
    
        return{
    
    contacts:[],
        };
    },
    
    methods{
        async getContacts(){
    const response = await fetch("http://127.0.0.1:8000/contacts", {
        method:"GET",
        headers:{
            "Accept": "application/json",
        },
    });
    const data = await response.json();
    this.contacts= data.contacts;
    
    
        },
    },
    
    mounted(){
        this.getContacts();
    },
    
        };
    </script>