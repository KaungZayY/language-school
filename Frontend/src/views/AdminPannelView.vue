<script setup>
import { reactive } from 'vue';
import { RouterLink } from 'vue-router';

const state = reactive({
    isSidebarOpen: true,
});

const toggleSidebar = () => {
    state.isSidebarOpen = !state.isSidebarOpen;
};
</script>

<template>
    <div class="flex min-h-screen bg-gray-50">
        <!-- Sidebar -->
        <div :class="state.isSidebarOpen ? 'w-64' : 'w-20'"
            class="bg-gray-800 text-white p-6 flex flex-col transition-all duration-300 ease-in-out">
            <div class="flex items-center justify-between mb-8">
                <h2 v-show="state.isSidebarOpen" class="text-2xl font-semibold">Admin Panel</h2>
                <button @click="toggleSidebar" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            <ul class="space-y-4">
                <!-- Courses Link -->
                <li>
                    <a href="#"
                        class="flex items-center p-2 rounded-md hover:bg-gray-700 transition duration-200">
                        <svg v-if="state.isSidebarOpen" class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16M5 12h14">
                            </path>
                        </svg>
                        <span v-show="state.isSidebarOpen" class="text-lg font-medium">Courses</span>
                    </a>
                </li>

                <!-- Back Link -->
                <li>
                    <RouterLink to="/"
                        class="flex items-center p-2 rounded-md hover:bg-gray-700 transition duration-200">
                        <svg v-if="state.isSidebarOpen" class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                        <span v-show="state.isSidebarOpen" class="text-lg font-medium">Back</span>
                    </RouterLink>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8 bg-gray-100">
            <h1 class="text-3xl font-bold mb-6">Welcome to the Admin Panel</h1>

        </div>
    </div>
</template>
