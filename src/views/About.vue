<template>
    <h1>ABOUT</h1>
    <h3>Version 1.0.0</h3>
    <router-link  class="router" to="/">Go to Home Page </router-link>
</template>
<script>
export default{
    name:"About",
     props: {
    showfrom: Boolean,
  },
}

</script>
<style scoped>
.router{
    text-decoration: none;
    color: blue;
}
</style>

