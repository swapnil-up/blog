<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const title = ref("");
const content = ref("");

const createArticle = () => {
    Inertia.post("/articles", {
        title: title.value,
        content: content.value,
    });
};
</script>

<template>
    <p>Enter values:</p>
    <form @submit.prevent="createArticle">
        <label for="Title">Title</label>
        <input placeholder="title" v-model="title" required />
        <label for="Content">Content</label>
        <input placeholder="content" v-model="content" required />
        <button type="submit">Create article</button>
    </form>
</template>

<style scoped>
form {
    display: flex;
    flex-direction: column;
}
</style>
