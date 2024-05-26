// test
console.log("Hello World");

const { createApp } = Vue;

createApp({
  data() {
    return {
      // albums: [],
      albumsFiltered: [],
    };
  },
  created() {
    axios
      .get("http://localhost:8888/boolean/php-dischi-json/server.php")
      .then((resp) => {
        this.albumsFiltered = resp.data.results;
      });
  },
  methods: {
    getLiked(i) {
      console.log(i);
      axios
        .post(
          "http://localhost:8888/boolean/php-dischi-json/server.php",
          { index: i },
          {
            headers: {
              "Content-type": "multipart/form-data",
            },
          }
        )
        .then((resp) => {
          this.albumsFiltered = resp.data.results;
        });
    },
  },
}).mount("#app");
