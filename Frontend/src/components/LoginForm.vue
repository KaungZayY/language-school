<script setup>
import { RouterLink } from 'vue-router';
import { reactive } from 'vue';
import axios from 'axios';
import { useToast } from 'vue-toastification';
import router from '@/router';

const form = reactive({
    email: '',
    password: ''
});

const errors = reactive({
    email: '',
    password: '',
});

const toast = useToast();

const handleLogin = async () => {
    const credentials = {
        email: form.email,
        password: form.password,
    };

    try {
        await axios.get('/sanctum');
        const response = await axios.post(`/api/login`, credentials);
        localStorage.setItem('token', response.data.token);
        toast.success('Login Successful!');
        router.push('/');
    } catch (error) {
        if (error.response && error.response.status === 422) {
            Object.keys(errors).forEach((key) => {
                errors[key] = '';
            });

            const validationErrors = error.response.data.errors;
            for (const key in validationErrors) {
                if (validationErrors.hasOwnProperty(key)) {
                    errors[key] = validationErrors[key];
                }
            }
        } else if (error.response && error.response.status === 401) {
            toast.error('Invalid email or password. Please try again.');
        } else {
            toast.error('An error occurred while logging in. Please try again.');
            console.error('Error While Login:', error);
        }
    }
};
</script>

<template>
    <section class="flex items-center justify-center min-h-screen bg-sky-50">
        <div class="max-w-lg w-full mx-auto items-center">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Login</h2>
                <form @submit.prevent="handleLogin">
                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" v-model="form.email"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter your email address" />
                        <div v-if="errors.email" class="text-red-500 text-sm mt-2">{{ errors.email[0] }}</div>
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password" v-model="form.password"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="******" />
                        <div v-if="errors.password" class="text-red-500 text-sm mt-2">{{ errors.password[0] }}</div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full relative bg-sky-500 text-white p-4 rounded-lg uppercase font-bold text-sm overflow-hidden group">
                        <span
                            class="absolute inset-0 bg-orange-500 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
                        <span class="relative z-10">
                            Login
                        </span>
                    </button>

                    <p class="text-sm font-light text-black mt-2">
                        Don’t have an account yet? <RouterLink to="register"
                            class="font-medium text-sky-500 hover:underline">Sign
                            up</RouterLink>
                    </p>
                </form>
            </div>
        </div>
    </section>
</template>