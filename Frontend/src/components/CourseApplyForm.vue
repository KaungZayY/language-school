<script setup>
import axios from 'axios';
import { reactive, onMounted } from 'vue';

onMounted(async () => {
    await axios.get('sanctum');
    const response = await axios.get(`/api/user`, {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`,
        },
        withCredentials: true,
    });
    console.log(response.data)
})
</script>

<template>
    <div>

    </div>
</template>