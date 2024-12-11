<script setup>
import { ref } from 'vue'
 
const count = ref(0)
</script>
 
<template>
  <button
    type="button"
    @click="count++"
    class="p-2 text-white bg-gray-500 rounded"
  >
    Counter is: {{ count }}
  </button>
</template>