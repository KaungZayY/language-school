<script setup>
import { reactive, onMounted } from 'vue';
import axios from 'axios';
import { RouterLink } from 'vue-router';

const state = reactive({
    course_types: [],
    showCourses: false,
    subCourseVisibility: {},
    isAdmin: false,
});

const authCheck = async () => {
    await axios.get('/sanctum');
    const user = await axios.get(`/api/user`, {
        headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`,
        },
        withCredentials: true,
    });
    if (user.data && user.data.role == 'admin') {
        state.isAdmin = true;
    }
}

onMounted(async () => {
    const token = localStorage.getItem('token');
    if (token) {
        authCheck();
    }
    else {
        state.isAdmin = false;
    }
    try {
        const response = await axios.get(`/api/course-types`);
        state.course_types = response.data.course_types;

        // Initialize visibility state for all course types
        state.course_types.forEach(course => {
            state.subCourseVisibility[course.id] = false;
        });
    } catch (error) {
        console.error("Error fetching course types:", error);
    }
});

const toggleSubCourse = (id) => {
    state.subCourseVisibility[id] = !state.subCourseVisibility[id];
};
</script>

<template>
    <li class="border-b md:border-none py-4">
        <!-- Main Dropdown Trigger -->
        <div @click="state.showCourses = !state.showCourses" class="relative group md:text-center cursor-pointer">
            <span class="font-semibold text-lg md:text-sm">
                Courses
            </span>
            <span class="text-lg md:text-sm ml-1">{{ state.showCourses ? "▲" : "▼" }}</span>
            <span
                class="absolute hidden md:block left-0 bottom-[-2px] w-0 h-[2px] bg-sky-500 transition-all duration-300 group-hover:w-full"></span>
        </div>

        <!-- Dropdown Content -->
        <div v-show="state.showCourses"
            class="absolute left-0 z-10 bg-gray-200 text-black shadow-lg rounded-lg p-4 mt-4 w-full">
            <ul class="flex flex-col md:flex-row justify-between items-start gap-4">
                <!-- Course Types -->
                <div v-for="course_type in state.course_types" :key="course_type.id"
                    class="flex flex-col items-center text-center md:w-1/5">
                    <!-- Course Type Header -->
                    <div @click="toggleSubCourse(course_type.id)"
                        class="font-semibold text-lg text-gray-800 hover:text-sky-500 cursor-pointer">
                        {{ course_type.course_type }}
                        <span class="md:hidden text-lg md:text-sm ml-1">
                            {{ state.subCourseVisibility[course_type.id] ? "▲" : "▼" }}
                        </span>
                    </div>

                    <!-- Sub-Courses -->
                    <ul :class="{ hidden: !state.subCourseVisibility[course_type.id] }"
                        class="text-sm md:block mt-2 md:mt-4">
                        <li v-for="course in course_type.courses" :key="course.id"
                            class="hover:text-sky-500 cursor-pointer">
                            <RouterLink :to="`/courses/${course.id}`">{{ course.title }}</RouterLink>
                        </li>
                    </ul>
                </div>
            </ul>
            <div v-if="state.isAdmin" class="mt-4 flex justify-center">
                <RouterLink to="admin" class="px-4 py-2 bg-sky-500 text-white font-semibold rounded-lg hover:bg-sky-600">
                    Admin Pannel
                </RouterLink>
            </div>
        </div>
    </li>
</template>

<style scoped>
@media (min-width: 768px) {
    .md\:flex-row {
        display: flex;
        flex-direction: row;
    }

    .md\:w-1\/5 {
        flex: 1 0 20%;
    }
}
</style>
