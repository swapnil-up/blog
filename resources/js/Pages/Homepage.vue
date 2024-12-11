<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    articles: Array,
});

const navigateToArticle = (id) => {
    Inertia.visit(`/articles/${id}`);
};

const deleteArticle = (id) => {
    Inertia.delete(`/articles/${id}`);
};
</script>

<template>
    <p>Here's what I've written:</p>
    <ul>
        <li v-for="article in articles" :key="article.id">
            <Link :href="`/articles/${article.id}`">
                {{ article.title }}
            </Link>
            <Link :href="`/articles/${article.id}/edit`">Edit</Link>
            <Link @click.prevent="deleteArticle(article.id)">Delete</Link>
        </li>
    </ul>
</template>

<style lang="css" scoped>
li {
    list-style-type: none;
}
</style>
