// test
console.log("Hello World");

const { createApp } = Vue;

createApp({
  data() {
    return {
      albums: [],
    };
  },
  created() {
    axios
      .get("http://localhost:8888/boolean/php-dischi-json/server.php")
      .then((resp) => {
        this.albums = resp.data.results;
      });
  },
}).mount("#app");
