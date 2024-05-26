// test
console.log("Hello World");

const { createApp } = Vue;

createApp({
  data() {
    return {
      albumsFiltered: [],
      showLiked: false,
    };
  },
  created() {
    this.loadAlbums();
  },
  methods: {
    loadAlbums() {
      const filter = this.showLiked ? "liked" : "";
      axios
        .post(
          "http://localhost:8888/boolean/php-dischi-json/server.php",
          { filter: filter },
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
    toggleLike(index) {
      axios
        .post(
          "http://localhost:8888/boolean/php-dischi-json/server.php",
          { index: index, filter: this.showLiked ? "liked" : "" },
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
    showAll() {
      this.showLiked = false;
      this.loadAlbums();
    },
    showOnlyLiked() {
      this.showLiked = true;
      this.loadAlbums();
    },
  },
}).mount("#app");
