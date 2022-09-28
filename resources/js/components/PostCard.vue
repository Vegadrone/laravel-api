<template>
  <div class="card">
    <img :src="post.post_image" :alt="post.title">
    <div class="card-body">
      <h2 class="card-title font-weight-bold">{{ post.title }}</h2>
      <p class="card-text">
        {{post.post_content}}
      </p>
       <p class="card-text">
        Scritto da: <span class="font-weight-bold">{{post.user.name}}</span>
      </p>
       <p class="card-text">
        Il: {{post.post_date}}
      </p>
      <a href="#" class="btn btn-primary">Leggi il post</a>
    </div>
  </div>
</template>

<script>
export default {
  props: ["post"],
};
</script>

<style>
</style>
