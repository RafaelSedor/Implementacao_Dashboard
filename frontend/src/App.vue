<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" class="logo">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: 'App',
}
</script>

<style>
body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  background: linear-gradient(90deg, #600082 0%, #820056 100%);
  min-height: 100vh;
  width: 100%;
}

.logo {
  max-width: 200px;
  width: 100%;
  height: auto;
  margin: 20px auto;
  display: block;
}

@media (max-width: 1200px) {
  .logo {
    max-width: 180px;
  }
}

@media (max-width: 992px) {
  .logo {
    max-width: 150px;
  }
}

@media (max-width: 768px) {
  .logo {
    max-width: 120px;
  }
}

@media (max-width: 425px) {
  .logo {
    max-width: 100px;
  }
}
</style>
