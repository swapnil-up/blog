<script setup>
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";

const email = ref("");
const password = ref("");

function tryLogin() {
    Inertia.post("/login", {
        email: email.value,
        password: password.value,
    });
}
</script>

<template>
    <h2>Login first</h2>
    <form @submit.prevent="tryLogin">
        <label for="email">email</label>
        <input placeholder="enter email" v-model="email" required />
        <label for="password">password</label>
        <input placeholder="enter password" v-model="password" required />
        <button type="submit">Login</button>
    </form>
</template>
