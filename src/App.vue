<template>
  <div class="container">
    <Title @show-addtask="showTask" title="Task Tracker"  :showfrom="showfrom"/>
    <div v-if="showfrom">
      <AddTask @add-task="AddTask" />
    </div>

    <Tasks @doubleClick="Deletetask" @delete-task="deletetask" :tasks="tasks" />
  </div>
</template>

<script>
import Title from "./components/Title.vue";
import Tasks from "./components/Tasks.vue";
import AddTask from "./components/AddTask.vue";
export default {
  name: "App",
  components: {
    Title,
    Tasks,
    AddTask,
  },
  data() {
    return {
      tasks: [],
      showfrom: false,
    };
  },
  methods: {
    AddTask(task) {
      this.tasks = [...this.tasks, task];
    },
    deletetask(id) {
      if (confirm("Are you sure you want to delete this task ")) {
        this.tasks = this.tasks.filter((task) => task.id !== id);
      }
    },
    Deletetask(id) {
      this.tasks = this.tasks.map((task) =>
        task.id === id ? { ...task, reminder: !task.reminder } : task
      );
    },
    showTask() {
      this.showfrom = !this.showfrom;
    },
  },
  created() {
    this.tasks = [
      {
        id: 1,
        text: "doctors appointments",
        day: "march 1st at 2:30 pm",
        reminder: true,
      },
      {
        id: 2,
        text: "Meeting at School",
        day: "march 2st at 5:30 pm",
        reminder: true,
      },
      {
        id: 3,
        text: "Food Shopping",
        day: "march 5st at 10:30 pm",
        reminder: false,
      },
      {
        id: 4,
        text: "Go to play football",
        day: "march 1st at 2:30 pm",
        reminder: true,
      },
      {
        id: 5,
        text: "Listen to Music",
        day: "march 1st at 2:30 pm",
        reminder: false,
      },
    ];
  },
};
</script>

<style>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap");
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  font-family: "Poppins", sans-serif;
}
.container {
  max-width: 500px;
  margin: 30px auto;
  overflow: auto;
  min-height: 300px;
  border: 1px solid steelblue;
  padding: 30px;
  border-radius: 5px;
}
.btn {
  display: inline-block;
  background: #000;
  color: #fff;
  border: none;
  padding: 10px 20px;
  margin: 5px;
  border-radius: 5px;
  cursor: pointer;
  text-decoration: none;
  font-size: 15px;
  font-family: inherit;
}
.btn:focus {
  outline: none;
}
.btn:active {
  transform: scale(0.98);
}
.btn-block {
  display: block;
  width: 100%;
}
</style>
