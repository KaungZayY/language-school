<script setup>
import { RouterLink } from 'vue-router';

</script>

<template>
    <section class="flex items-center justify-center min-h-screen bg-sky-50">
        <div class="max-w-lg w-full mx-auto items-center">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Login</h2>
                <form>
                    <!-- Email -->
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="Enter your email address" />
                    </div>

                    <!-- Password -->
                    <div class="mb-6">
                        <label for="password" class="block text-gray-700 font-medium mb-2">
                            Password <span class="text-red-500">*</span>
                        </label>
                        <input type="password" id="password"
                            class="w-full p-4 border rounded-lg text-base focus:ring-2 focus:ring-orange-500 focus:outline-none"
                            placeholder="******" />
                    </div>

                    <!-- Submit Button -->
                    <button
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