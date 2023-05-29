<template>
  <nav>
    <router-link to="/">Home</router-link> |
    <router-link to="/about">About</router-link> |
    <router-link to="/databinding">Data Binding</router-link>|
    <router-link to="/databindinginputtext">Data Binding InputText</router-link>
    <div>
    <router-link to="/databindinginputnumber">Data Binding InputNumber</router-link>|
    <router-link to="/databindinginputtextarea">Data Binding InputTextArea</router-link>|
    <router-link to="/databindingselect">Data Binding Select</router-link>|
    <router-link to="/databindingcheckbox">Data Binding checkbox</router-link>
    </div>
    <div>
      <router-link to="/databindingcheckbox2">Data Binding checkbox2</router-link>|
      <router-link to="/databindingradio">Data Binding Radio</router-link>|
      <router-link to="/databindingattribue">Data Binding attribue</router-link>|
      <router-link to="/databindingbutton">Data Binding button</router-link>
    </div>
    <div>
      <router-link to="/databindingclass">Data Binding class</router-link>|
      <router-link to="/databindingclass2">Data Binding class2</router-link>|      
      <router-link to="/databindingStyle">Data Binding class2</router-link>|      
      <router-link to="/databindingList">Data Binding List</router-link>
    </div>
    <div>
      <router-link to="/Renderingvif">Renderingvif</router-link>|
      <router-link to="/Eventclick">Eventclick</router-link>|
      <router-link to="/Eventchange">Eventchange</router-link>|
      <router-link to="/Computedvue">Computedue</router-link>|
    </div>
        <div>
      <router-link to="/Watchvue">Watchvue</router-link>|
      <router-link to="/databindingList2">Data Binding List2</router-link>|
      <router-link to="/Nesteadcomponent">Nestead Components</router-link>|
      <router-link to="/Parentcomponent">Parent Component</router-link>|
    </div>
    <div>
      <router-link to="/Parentcomponent2">Parent Component2</router-link>|
      <router-link to="/Parentcomponent3">Parent Component3</router-link>|
      <router-link to="/Parentcomponent4">Parent Component4</router-link>|
      <router-link to="/Parentcomponent5">Parent Component5</router-link>
    </div>
    <div>
      <router-link to="/Mixins">Mixins</router-link>|
      <router-link to="/Googlelogin">gg</router-link>
    </div>
  </nav>
  <router-view/>
</template>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

nav {
  padding: 30px;
}

nav a {
  font-weight: bold;
  color: #2c3e50;
}

nav a.router-link-exact-active {
  color: #42b983;
}
</style>
