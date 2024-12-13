<script setup>
import axios from 'axios';
import { onMounted, reactive } from 'vue';
import { useToast } from 'vue-toastification';
import router from '@/router';

const toast = useToast();

const courseForm = reactive({
    title: '',
    description: '',
    levels: '',
    schedule: '',
    max_class_size: null,
    avg_class_size: null,
    duration: '',
    start_date: '',
    course_type_id: null,
});

const errors = reactive({
    title: '',
    description: '',
    levels: '',
    schedule: '',
    max_class_size: null,
    avg_class_size: null,
    duration: '',
    start_date: '',
    course_type_id: null,
});

const state = reactive({
    course_types: {},
})


const resetForm = () => {
    Object.keys(courseForm).forEach(key => {
        courseForm[key] = '';
    });
    courseForm.max_class_size = null;
    courseForm.avg_class_size = null;
    courseForm.course_type_id = null;
};

const handleSubmit = async () => {
    const course = {
        title: courseForm.title,
        description: courseForm.description,
        levels: courseForm.levels,
        schedule: courseForm.schedule,
        max_class_size: courseForm.max_class_size,
        avg_class_size: courseForm.avg_class_size,
        duration: courseForm.duration,
        start_date: courseForm.start_date,
        course_type_id: courseForm.course_type_id,
    };

    try {
        await axios.get('/sanctum');
        await axios.post(`/api/courses`, course, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
            withCredentials: true,
        });
        toast.success('Course Created!');
        router.push('/admin');
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
        } else {
            toast.error('An error occurred while creating new course.');
            console.error('Error While Creating a course:', error);
        }
    }
};

onMounted(async () => {
    try {
        await axios.get('sanctum');
        const response = await axios.get(`/api/course-types`);
        state.course_types = response.data.course_types;
    } catch (error) {

    }
})
</script>

<template>
    <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-3xl mx-auto">
        <h2 class="text-2xl font-semibold mb-6">Create New Course</h2>
        <form @submit.prevent="handleSubmit" class="space-y-6">
            <!-- Title -->
            <div>
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input v-model="courseForm.title" type="text" id="title"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter course title" />
                <div v-if="errors.title" class="text-red-500 text-sm mt-2">{{
                    errors.title[0] }}</div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea v-model="courseForm.description" id="description"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    rows="4" placeholder="Enter course description"></textarea>
            </div>

            <!-- Levels -->
            <div>
                <label for="levels" class="block text-gray-700 font-medium mb-2">Levels</label>
                <input v-model="courseForm.levels" type="text" id="levels"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Beginner, Intermediate, Advanced" />
                <div v-if="errors.levels" class="text-red-500 text-sm mt-2">{{
                    errors.levels[0] }}</div>
            </div>

            <!-- Schedule -->
            <div>
                <label for="schedule" class="block text-gray-700 font-medium mb-2">Schedule</label>
                <input v-model="courseForm.schedule" type="text" id="schedule"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="E.g., Mon-Wed-Fri, 9:00 AM - 12:00 PM" />
                <div v-if="errors.schedule" class="text-red-500 text-sm mt-2">{{
                    errors.schedule[0] }}</div>
            </div>

            <!-- Maximum Class Size -->
            <div>
                <label for="max_class_size" class="block text-gray-700 font-medium mb-2">Max Class Size</label>
                <input v-model="courseForm.max_class_size" type="number" id="max_class_size"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter max class size" />
                <div v-if="errors.max_class_size" class="text-red-500 text-sm mt-2">{{
                    errors.max_class_size[0] }}</div>
            </div>

            <!-- Average Class Size -->
            <div>
                <label for="avg_class_size" class="block text-gray-700 font-medium mb-2">Average Class Size</label>
                <input v-model="courseForm.avg_class_size" type="number" id="avg_class_size"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Enter average class size" />
                <div v-if="errors.avg_class_size" class="text-red-500 text-sm mt-2">{{
                    errors.avg_class_size[0] }}</div>
            </div>

            <!-- Duration -->
            <div>
                <label for="duration" class="block text-gray-700 font-medium mb-2">Duration</label>
                <input v-model="courseForm.duration" type="text" id="duration"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="E.g., 6 weeks, 3 months" />
                <div v-if="errors.duration" class="text-red-500 text-sm mt-2">{{
                    errors.duration[0] }}</div>
            </div>

            <!-- Start Date -->
            <div>
                <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                <input v-model="courseForm.start_date" type="text" id="start_date"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <div v-if="errors.start_date" class="text-red-500 text-sm mt-2">{{
                    errors.start_date[0] }}</div>
            </div>

            <!-- Course Type ID -->
            <div>
                <label for="course_type_id" class="block text-gray-700 font-medium mb-2">Course Type</label>
                <select v-model="courseForm.course_type_id" id="course_type_id"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="" selected>Select course type</option>
                    <option v-for="course_type in state.course_types" :key="course_type.id" :value="course_type.id">
                        {{ course_type.course_type }}
                    </option>
                </select>
                <div v-if="errors.course_type_id" class="text-red-500 text-sm mt-2">{{
                    errors.course_type_id[0] }}</div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="px-6 py-3 bg-blue-500 text-white font-medium rounded-lg hover:bg-blue-600 transition duration-200">
                    Submit
                </button>
                <button type="button" @click="resetForm"
                    class="px-6 py-3 bg-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-400 transition duration-200">
                    Reset
                </button>
            </div>
        </form>
    </div>
</template>
