// test
console.log("Hello World");

const { createApp } = Vue;

createApp({
  data() {
    return {
      message: "test ok",
    };
  },
}).mount("#app");
