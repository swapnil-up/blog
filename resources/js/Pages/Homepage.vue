<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    articles: Array,
});

const deleteArticle = (id) => {
    Inertia.delete(`/articles/${id}`);
};

const logout = () => {
    Inertia.post(`/logout`);
};
</script>

<template>
    <button @click="logout">logout</button>
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
    <Link :href="`/articles/create`">write another article?</Link>
</template>

<style lang="css" scoped>
li {
    list-style-type: none;
    display: flex;
    gap: 5px;
    padding-top: 10px;
}
</style>
