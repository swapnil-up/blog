<script setup>
import { ref } from "vue";

const prop = defineProps({
    article: Object,
});

const showComments = ref(false);
const comments = ref([]);

const toggleComments = async () => {
    if (!showComments.value) {
        const response = await axios.get(`${prop.article.id}/comments`);
        comments.value = response.data;
        console.log(comments.value);
    }
    showComments.value = !showComments.value;
};
</script>

<template>
    <div>
        <h1>{{ article.title }}</h1>
        <p>{{ article.content }}</p>
        <div v-if="article.tag && article.tag.length > 0">
            <h3>Tags</h3>
            <li v-for="tag in article.tag" :key="tag.id">
                <p>{{ tag.name }}</p>
            </li>
        </div>
        <div v-if="article.image_path">
            <img :src="`/storage/` + article.image_path" />
        </div>
        <div>
            <button @click="toggleComments">Show Comments</button>
            <div v-if="showComments">
                <li v-for="comment in comments" :key="comment.id">
                    <p>{{ comment.content }}</p>
                </li>
            </div>
        </div>
        <a href="/">Back to Articles</a>
    </div>
</template>

<style scoped>
img {
    height: 60%;
    width: 60%;
}
</style>
