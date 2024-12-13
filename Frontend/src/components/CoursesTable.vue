<script setup>
import { onMounted, reactive } from 'vue';
import axios from 'axios';
import { useToast } from 'vue-toastification';

const toast = useToast();

const state = reactive({
    courses: [],
});

const handleDelete = async (id) => {
    try {
        await axios.get('/sanctum');
        await axios.delete(`/api/courses/${id}`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
            withCredentials: true,
        });
        toast.success('Course Deleted!');
        await fetchCourses();
    } catch (error) {
        toast.error('Action Failed!');
        console.error('Error While Deleting a course:', error);
    }
}

const fetchCourses = async () => {
    try {
        const response = await axios.get(`/api/courses`);
        state.courses = response.data.courses;
    } catch (error) {
        console.error("Error fetching course types:", error);
    }
}

onMounted( async ()=>{
    await fetchCourses();
})
</script>

<template>
    <div class="p-8 bg-gray-100 min-h-screen">
        <!-- Table Header -->
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Courses</h1>

        <!-- Courses Table -->
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full text-left text-gray-800">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Title</th>
                        <th class="py-3 px-4">Description</th>
                        <th class="py-3 px-4">Levels</th>
                        <th class="py-3 px-4">Schedule</th>
                        <th class="py-3 px-4">Max Class Size</th>
                        <th class="py-3 px-4">Avg Class Size</th>
                        <th class="py-3 px-4">Duration</th>
                        <th class="py-3 px-4">Start Date</th>
                        <th class="py-3 px-4">Course Type ID</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="course in state.courses" :key="course.id" class="hover:bg-gray-100 border-b">
                        <td class="py-3 px-4">{{ course.id }}</td>
                        <td class="py-3 px-4">{{ course.title }}</td>
                        <td class="py-3 px-4">{{ course.description }}</td>
                        <td class="py-3 px-4">{{ course.levels }}</td>
                        <td class="py-3 px-4">{{ course.schedule }}</td>
                        <td class="py-3 px-4">{{ course.max_class_size }}</td>
                        <td class="py-3 px-4">{{ course.avg_class_size }}</td>
                        <td class="py-3 px-4">{{ course.duration }}</td>
                        <td class="py-3 px-4">{{ course.start_date }}</td>
                        <td class="py-3 px-4">{{ course.course_type_id }}</td>
                        <td class="py-3 px-4 flex justify-center space-x-2">
                            <!-- Edit Button -->
                            <button
                                class="text-blue-600 hover:text-blue-800 font-medium px-4 py-2 bg-blue-100 rounded-md">
                                Edit
                            </button>
                            <!-- Delete Button -->
                            <button @click="handleDelete(course.id)"
                                class="text-red-600 hover:text-red-800 font-medium px-4 py-2 bg-red-100 rounded-md">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
