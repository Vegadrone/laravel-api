<template>
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="p-3 m-3">Post Recenti:</h1>
            </div>
            <div class="col-6">
                <PostCard />
            </div>
        </div>
    </main>
</template>

<script>
import PostCard from './PostCard.vue';
import axios from 'axios';
export default {
    components:{
        PostCard,
    },
    data: function(){
        return{
            posts: [],
            currentPage: 1,
            lastPage: null,
            loading: false,
        }
    },
    methods:{
        getPosts(postsPage = 1){
            // console.warn('alalalala')
            axios.get('/api/posts' , {
                page:postsPage
            }).then((response) => {
                console.log(response)
            }).catch((error) => {
                console.error(error);
            })
        },
        created(){
            this.getPosts();
        }
    }
}
</script>

<style>

</style>
