<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    article: Array,
});

const title = ref(props.article.title);
const content = ref(props.article.content);

const editArticle = () => {
    Inertia.put(`/articles/${props.article.id}`, {
        title: title.value,
        content: content.value,
    });
};
</script>

<template>
    <p>Enter new values:</p>
    <form @submit.prevent="editArticle">
        <label for="Title">Title</label>
        <input placeholder="new title" v-model="title" required />
        <label for="Content">Content</label>
        <input placeholder="new content" v-model="content" required />
        <button type="submit">Save edits</button>
    </form>
</template>

<style scoped>
form {
    display: flex;
    flex-direction: column;
}
</style>
