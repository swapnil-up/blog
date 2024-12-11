<script setup>
const props = defineProps({
    articles: Array,
});
</script>

<template>
    <p>Here's what I've written:</p>
    <li v-for="article in articles" :key="article.id">
        <h3>{{ article.title }}</h3>
        <p>{{ article.content }}</p>
    </li>
</template>
