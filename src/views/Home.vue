<template>
  <AddTask v-show="showfrom" @add-task="AddTask" />
  <Tasks
    @doubleClick="toggleRiminder"
    @delete-task="deletetask"
    :tasks="tasks"
  />
</template>
<script>
import Tasks from "../components/Tasks.vue";
import AddTask from "../components/AddTask.vue";
import axios from "axios";
export default {
  name: "Home",
  props: {
    showfrom: Boolean,
  },
  components: {
    Tasks,
    AddTask,
  },
  data() {
    return {
      tasks: [],
    };
  },
  methods: {
    fetchAllData: function () {
      axios
        .get("http://localhost:3000/index.php" + "?action=fetch-all")
        .then((response) => {
          this.tasks = response.data;
          /*  console.log('response', this.tasks); */
        });
    },

    AddTask(task) {
      axios
        .post("http://localhost:3000/index.php" + "?action=create",task
         )
        .then((response) => {
         
           console.log(response);
        });
      console.log(task);
    },
    deletetask(id) {
      if (confirm("Are you sure you want to delete this task ")) {
      }
    },
    toggleRiminder(id) {
      alert(id);
    },
  },

  created() {
    this.tasks = this.fetchAllData();
  },
};
</script>