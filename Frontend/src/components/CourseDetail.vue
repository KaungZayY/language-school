<script setup>
import axios from 'axios';
import { reactive, onMounted, watch } from 'vue';
import { useRoute } from 'vue-router';
import { useToast } from 'vue-toastification';
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
import { RouterLink } from 'vue-router';

const toast = useToast();

const route = useRoute();

const state = reactive({
    course: {},
    isLoading: true,
})

const fetchCourse = async (id) => {
    state.isLoading = true;
    try {
        const response = await axios.get(`/api/courses/${id}`);
        state.course = response.data.course;
    } catch (error) {
        toast.error('Error fetching the course');
        console.error('Error fetching the course:', error);
    } finally {
        state.isLoading = false;
    }
};

onMounted(() => {
    fetchCourse(route.params.id);
});

watch(
    () => route.params.id,
    (newId) => {
        fetchCourse(newId);
    }
);
</script>

<template>
    <div class="relative w-full pt-[60px] md:pt-[80px] flex justify-center">
        <div v-if="state.isLoading">
           <PulseLoader/> 
        </div>
        <div v-else class="max-w-screen-xl mx-auto p-4">

            <!-- Course Detail -->
            <div class="flex flex-col-reverse md:flex-row items-center md:justify-between gap-4">
                <!-- Course Detail Text -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-xl md:text-3xl font-bold mb-4">{{ state.course.title }}</h2>
                    <p class="text-gray-600 mb-2">{{ state.course.description }}</p>
                </div>

                <!-- Image -->
                <div class="w-full md:w-1/2">
                    <img src="@/assets/images/landing-page-1.jpg" alt="Communicative English Programme"
                        class="rounded-lg shadow-lg">
                </div>
            </div>

            <!-- Program Features Section -->
            <div class="flex flex-col-reverse md:flex-row items-center md:justify-between gap-4">
                <!-- Program Features Text -->
                <div class="w-full md:w-1/2">
                    <h2 class="text-xl md:text-3xl font-bold mb-4">PROGRAMME FEATURES</h2>
                    <ul class="space-y-4">
                        <li>
                            <h3 class="text-lg font-semibold">LEVELS</h3>
                            <p class="text-gray-600">{{ state.course.levels }}</p>
                        </li>
                        <li>
                            <h3 class="text-lg font-semibold">CLASS SIZE</h3>
                            <p class="text-gray-600">Maximum: {{state.course.max_class_size}} students<br>Average: {{ state.course.avg_class_size }} students</p>
                        </li>
                        <li>
                            <h3 class="text-lg font-semibold">SCHEDULE</h3>
                            <p class="text-gray-600">{{ state.course.schedule }}</p>
                        </li>
                        <li>
                            <h3 class="text-lg font-semibold">DURATION</h3>
                            <p class="text-gray-600">{{ state.course.duration }}</p>
                        </li>
                        <li>
                            <h3 class="text-lg font-semibold">START DATE</h3>
                            <p class="text-gray-600">{{ state.course.start_date }}</p>
                        </li>
                    </ul>
                </div>

                <!-- Apply Now -->
                <div class="w-full md:w-1/2">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <div class="flex justify-between items-center border-b pb-2 mb-4">
                            <span class="text-lg font-bold">Course Duration</span>
                            <span class="text-gray-600">{{ state.course.duration }}</span>
                        </div>
                        <div class="flex justify-between items-center border-b pb-2 mb-4">
                            <span class="text-lg font-bold">Class Duration</span>
                            <span class="text-gray-600">4 hours per week</span>
                        </div>
                        <RouterLink :to="`/courses/${state.course.id}/apply`"
                            class="w-full bg-green-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-green-600">
                            Apply Now
                        </RouterLink>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>