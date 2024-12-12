<script setup>
import { onMounted, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";

const title = ref("");
const content = ref("");

const selectedTags = ref([]);
const tags = ref([]);

onMounted(async () => {
    const response = await axios.get("/api/tags");
    tags.value = response.data;
});

const createArticle = () => {
    Inertia.post("/articles", {
        title: title.value,
        content: content.value,
        tags: selectedTags.value,
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

        <select v-model="selectedTags" multiple>
            <option v-for="tag in tags" :key="tag.id" :value="tag.id">
                {{ tag.name }}
            </option>
        </select>
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
