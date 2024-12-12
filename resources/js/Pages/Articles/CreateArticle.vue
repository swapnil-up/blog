<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";

const title = ref("");
const content = ref("");

const createArticle = () => {
    Inertia.post("/articles", {
        title: title.value,
        content: content.value,
    });
};

const goBack = () => {
    Inertia.visit("/");
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
    <button @click="goBack">Cancel</button>
</template>

<style scoped>
form {
    display: flex;
    flex-direction: column;
}
</style>
