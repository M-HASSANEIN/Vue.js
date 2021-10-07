<template>
  <header>
    <h1>{{ title }}</h1>
    <Button v-if="homepage"
      @show-addtask="$emit('show-addtask')"
      :text="showfrom ? 'CLOSE' : 'ADD'"
      :color="showfrom ? 'red' : 'green'"
    />
  </header>
</template>
<script>
import Button from "./Button";
export default {
  name: "Title",
  props: {
    title: String,
    showfrom: Boolean
  },
  components: {
    Button,
  },
  computed:{
    homepage(){
      if (this.$route.path==="/") {
        return true
      }else{
        return false
      }
    }
  }
};
</script>

<style  scoped>
header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 30px;
}
</style>