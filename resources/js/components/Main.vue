<template>
  <main class="container">
    <div class="row">
      <div class="col-12 ">
        <h1 class="p-3 m-3">Post Recenti:</h1>
      </div>
      <div class="text-center col-12 p-5 justify-content-between">
        <PostCard class="m-4 p-3 " v-for="post in posts" :key="post.id" :post="post"/>
      </div>
    </div>
  </main>
</template>

<script>
import PostCard from "./PostCard.vue";
import axios from "axios";
export default {
  components: {
    PostCard,
  },
  data: function () {
    return {
      posts: [],
      currentPage: 1,
      lastPage: null,
      loading: false,
    };
  },
  methods: {
    getPosts(postsPage = 1) {
      console.warn("Chiamato");
      axios
        .get("/api/posts", {
          page: postsPage,
        })
        .then((response) => {
          console.log(response.data.results);
          this.posts = response.data.results.data;
          this.currentPage = response.data.results.currentPage;
          this.lastPage = response.data.results.lastPage;
          this.loading = false;
        })
        .catch((error) => {
          console.error(error);
        });
    },
  },

  created() {
    this.getPosts();
  },
};
</script>

<style>
</style>
