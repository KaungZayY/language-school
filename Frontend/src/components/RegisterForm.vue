<script setup>
import { RouterLink } from 'vue-router';
import axios from 'axios';
import { useToast } from 'vue-toastification';
import { reactive } from 'vue';
import router from '@/router';

const form = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const errors = reactive({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const toast = useToast();

const handleRegister = async () => {
    const newUser = {
        name: form.name,
        email: form.email,
        password: form.password,
        password_confirmation: form.password_confirmation,
    };

    try {
        const response = await axios.post(`api/register`, newUser);
        localStorage.setItem('token', response.data.token);
        toast.success('Created an Account!');
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
        }  else {
            toast.error('An error occurred while creating an account. Please try again later.');
            console.error('Error While Creating an Account:', error);
        }
    }
};
</script>

<template>
    <section class="flex items-center justify-center pt-[60px] md:pt-[80px] min-h-screen bg-sky-50">
        <div class="max-w-lg w-full mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 text-left">Register</h2>
                <form @submit.prevent="handleRegister">
                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name" v-model="form.name"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter your full name" />
                        <div v-if="errors.name" class="text-red-500 text-sm mt-2">{{ errors.name[0] }}</div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" v-model="form.email"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter your email address" />
                        <div v-if="errors.email" class="text-red-500 text-sm mt-2">{{ errors.email[0] }}</div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password" v-model="form.password"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter a strong password" />
                        <div v-if="errors.password" class="text-red-500 text-sm mt-2">{{ errors.password[0] }}</div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password_confirmation" v-model="form.password_confirmation"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Re-enter your password" />
                        <div v-if="errors.password_confirmation" class="text-red-500 text-sm mt-2">{{ errors.password_confirmation[0] }}</div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full relative bg-sky-500 text-white p-4 rounded-lg uppercase font-bold text-sm overflow-hidden group">
                        <span
                            class="absolute inset-0 bg-orange-500 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
                        <span class="relative z-10">
                            Register
                        </span>
                    </button>
                    <p class="text-sm font-light text-black mt-2">
                        Already have an account? <RouterLink to="login"
                            class="font-medium text-sky-500 hover:underline">Login
                            here</RouterLink>
                    </p>
                </form>
            </div>
        </div>
    </section>

</template>