<script setup>
const prop = defineProps({
    article: Object,
});

console.log("Article: ", prop.article);
console.log("Tags: ", prop.article.tag);
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
        <a href="/">Back to Articles</a>
    </div>
</template>

<style scoped></style>
