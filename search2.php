<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <title>Document</title>
</head>
<body>
<template>
  <div id="app">
    <input v-model="searchQuery" @input="search" type="text" placeholder="Search...">
    <ul>
      <li v-for="result in results" :key="result.id">{{ result.name }}</li>
    </ul>
  </div>
</template>

<script>
var vm = new Vue({
 el:'#app',
 data:{
      searchQuery: '',
      results: [],
    
  },
  methods: {
    search() {
      fetch(`/api/search2.php?q=${this.searchQuery}`)
        .then(response => response.json())
        .then(data => this.results = data);
    },
  },
});
</script>
 
</body>
</html>