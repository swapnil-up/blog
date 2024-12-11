<template>
    Hello {{ counter }}!

    <div><increment /></div>
</template>

<script setup>
import { ref } from "vue";
import increment from "../components/increment.vue";

const counter = ref(0);
setInterval(() => counter.value++, 1000);
</script>
