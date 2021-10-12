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
export default {
  name: "HomeApi",
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
    async AddTask(task) {
      const res = await fetch("api/tasks", {
        method: "POST",
        headers: {
          "Content-type": "application/json",
        },
        body: JSON.stringify(task),
      });
      const data = await res.json();
      this.tasks = [...this.tasks, data];
    },
    async deletetask(id) {
      if (confirm("Are you sure you want to delete this task ")) {
        const res = await fetch(`api/tasks/${id}`, {
          method: "DELETE",
        });
        if (res.status === 200) {
          this.tasks = this.tasks.filter((task) => task.id !== id);
        } else {
          alert("erro while deleting");
        }
      }
    },
    async toggleRiminder(id) {
      const taskToggle = await this.fetchTask(id);
      const UpdTask = { ...taskToggle, reminder: !taskToggle.reminder };
      const res = await fetch(`api/tasks/${id}`, {
        method: "PUT",
        headers: {
          "Content-type": "application/json",
        },
        body: JSON.stringify(UpdTask),
      });
      const data = await res.json();
      this.tasks = this.tasks.map((task) =>
        task.id === id ? { ...task, reminder: data.reminder } : task
      );
    },
    async fetchTasks() {
      const res = await fetch(`api/tasks`);
      const data = await res.json();
      /*  console.log(data); */
      return data;
    },
    async fetchTask(id) {
      const res = await fetch(`api/tasks/${id}`);
      const data = await res.json();
      /* console.log(data); */
      return data;
    },
  },
  async created() {
    this.tasks = await this.fetchTasks();
  },
};
</script>