<template>
  <div @dblclick="$emit('doubleClick',task.id)" :class="[task.reminder ? 'reminder':'','task']">
    <h3>{{ task.text }}
       <i @click="ondelete(task.id)" class="fas fa-times"></i>
    </h3>
    <p>{{ task.day }}</p>
  </div>
</template>

<script>
export default {
  name: "Task",
  props: {
    task: Object,
  },
  methods:{
    ondelete(id){
      this.$emit("delete-task",id)
    },
  }
};
</script>
<style scoped>
div{
    background: #f4f4f4;
    margin: 5px;
    padding: 10px 20px;
    cursor: pointer;
}
.fas{
    color: red;
}
.task h3{
    display: flex;
    align-content: center;
    justify-content: space-between;
}
.reminder{
    border-left: 5px solid green;
}
</style>