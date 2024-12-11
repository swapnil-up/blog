<script setup>
const prop = defineProps({
    article: Array,
});

console.log("Article:", prop.article);
</script>

<template>
    <div>
        <h1>{{ article.title }}</h1>
        <p>{{ article.content }}</p>
        <a href="/">Back to Articles</a>
    </div>
</template>

<style scoped></style>
