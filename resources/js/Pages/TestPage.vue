<template>
    <div>
        <h1>Testing</h1>
        <p>{{ message }}</p>
    </div>
</template>

<script setup>
const props = defineProps({
    message: String,
});
</script>
