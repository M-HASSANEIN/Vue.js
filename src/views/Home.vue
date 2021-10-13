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
          /* console.log('response', this.tasks); */
        });
    },

    AddTask(task) {
      axios
        .post("http://localhost:3000/index.php" + "?action=create", task)
        .then((response) => {
          this.fetchAllData();
        });
     /*  console.log(task); */
    },
    deletetask(id) {
      if (confirm("Are you sure you want to delete this task ")) {
        axios
          .post("http://localhost:3000/index.php" + "?action=delete", { id })
          .then((response) => {
            this.fetchAllData();
          });
      }
    },
    async fetchTask(id) {
      const response = await axios.post(
        "http://localhost:3000/index.php" + "?action=id",
        { id }
      );
      return response.data;
    },

    async toggleRiminder(id) {
      const taskToggle = await this.fetchTask(id);
      //change number from data base true or false to Boolean
      let boolValue = Boolean(Number(taskToggle.reminder));
      const UpdTask = { ...taskToggle, reminder: !boolValue };
      let UpdReminder = UpdTask.reminder;
      axios
        .post("http://localhost:3000/index.php" + "?action=update", {
          id,
          UpdReminder,
        })
        .then((response) => {
          this.fetchAllData();
        });
     /*  console.log(taskToggle);
      console.log(UpdTask); */
    },
  },
  created() {
    this.tasks = this.fetchAllData();
  },
};
</script>