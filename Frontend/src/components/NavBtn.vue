<script setup>
import { reactive, onMounted } from 'vue';
import { RouterLink } from 'vue-router';
import { useToast } from 'vue-toastification';
import router from '@/router';
import axios from 'axios';

const state = reactive({
    isLoggedIn: '',
});

const toast = useToast();

const handleLogout = async () => {
    try {
        await axios.get('/sanctum');
        await axios.post(`/api/logout`, {}, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
            withCredentials: true,
        });
        localStorage.removeItem('token');
        toast.success('Logout Success!');
    } catch (error) {
        console.log(error)
        if (error.response && error.response.status === 401) {
            toast.error('Login First!');
        };
    } finally {
        router.push('/login');
    }
};


onMounted(() => {
    const token = localStorage.getItem('token');
    if (!token) {
        state.isLoggedIn = false;
    } else {
        state.isLoggedIn = true;
    }
});
</script>

<template>
    <RouterLink v-if="!state.isLoggedIn" to="/login"
        class="relative bg-sky-500 text-white px-3 py-2 rounded-full uppercase font-bold text-sm overflow-hidden group inline-flex">
        <span
            class="absolute inset-0 bg-orange-500 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
        <span class="relative z-10 inline-flex items-center">
            Apply Now
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2 ml-1 fill-white">
                <path
                    d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
            </svg>
        </span>
    </RouterLink>
    <button v-else @click="handleLogout"
        class="relative bg-sky-500 text-white px-3 py-2 rounded-full uppercase font-bold text-sm overflow-hidden group">
        <span
            class="absolute inset-0 bg-orange-500 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
        <span class="relative z-10 inline-flex items-center">
            Logout
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2 ml-1 fill-white">
                <path
                    d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
            </svg>
        </span>
    </button>
</template>