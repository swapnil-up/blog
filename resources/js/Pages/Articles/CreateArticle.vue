<script setup>
import { onMounted, ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";

const title = ref("");
const content = ref("");

const selectedTags = ref([]);
const tags = ref([]);

const image = ref(null);

onMounted(async () => {
    const response = await axios.get("/api/tags");
    tags.value = response.data;
});

const createArticle = () => {
    // Inertia.post("/articles", {
    //     title: title.value,
    //     content: content.value,
    //     tags: selectedTags.value,
    // });
    const formData = new FormData();
    formData.append("title", title.value);
    formData.append("content", content.value);
    formData.append("tags", JSON.stringify(selectedTags.value));

    console.log(image.value);
    if (image.value) {
        formData.append("image", image.value);
    }
    Inertia.post("/articles", formData, {
        headers: {
            "Content-Type": "multipart/form-data",
        },
    });
};

const goBack = () => {
    Inertia.visit("/");
};

const handleFileChange = (event) => {
    const file = event.target.files[0];
    if (file) {
        image.value = file;
    }
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

        <label for="Image">Image?</label>
        <input type="file" @change="handleFileChange" />
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
