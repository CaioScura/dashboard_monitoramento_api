<template>
    <div>
      <h1>APIs Monitoradas</h1>
      <ul>
        <li v-for="api in apis" :key="api.id">
          {{ api.name }} - {{ api.is_active ? '✅ Online' : '❌ Offline' }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        apis: []
      };
    },
    async mounted() {
      const response = await axios.get('http://127.0.0.1:8000/api/apis');
      this.apis = response.data;
    }
  };
  </script>
  