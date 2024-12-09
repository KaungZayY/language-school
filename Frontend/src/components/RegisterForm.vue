<script setup>
import { RouterLink } from 'vue-router';

</script>

<template>
    <section class="flex items-center justify-center pt-[60px] md:pt-[80px] min-h-screen bg-sky-50">
        <div class="max-w-lg w-full mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-4 text-left">Register</h2>
                <form>
                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">
                            Full Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="name"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter your full name" />
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter your email address" />
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter a strong password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="confirm-password_confirmation" class="block text-gray-700 font-medium mb-2">
                            Confirm Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="confirm-password_confirmation"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Re-enter your password" />
                    </div>

                    <!-- Submit Button -->
                    <button
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