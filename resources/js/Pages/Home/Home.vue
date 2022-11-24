<template>
  <div>
    home.vue

    <BlogPost
        v-for="post in posts"
        :key="post.id"
        :title="post.title"
    />
  </div>
</template>

<script>
import BlogPost from '@/Components/Home/BlogPost.vue'

export default {
    components: {
        BlogPost
    },

    data() {
    return {
      posts: [
        { id: 1, title: 'My journey with Vue' },
        { id: 2, title: 'Blogging with Vue' },
        { id: 3, title: 'Why Vue is so fun' }
      ]
    }
  }

}
</script>

<style>

</style>