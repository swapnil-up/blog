<script setup>
import { Inertia } from "@inertiajs/inertia";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const email = ref("");
const password = ref("");
const name = ref("");

function registerUser() {
    Inertia.post("/register", {
        name: name.value,
        email: email.value,
        password: password.value,
    });
}
</script>

<template>
    <h2>Register here</h2>
    <form @submit.prevent="registerUser" class="flex flex-col">
        <div>
            <label for="name">name</label>
            <input placeholder="enter name" v-model="name" required />
        </div>
        <div>
            <label for="email">email</label>
            <input placeholder="enter email" v-model="email" required />
        </div>
        <div>
            <label for="password">password</label>
            <input placeholder="enter password" v-model="password" required />
        </div>
        <button type="submit">Register</button>
    </form>
    <Link :href="`/login`">Already registered? Login here</Link>
</template>
