<script setup>
import axios from 'axios';
import { reactive, onMounted } from 'vue';
import router from '@/router';
import { useToast } from 'vue-toastification';
import { useRoute } from 'vue-router';

const toast = useToast();

const route = useRoute();

const state = reactive({
    course: {},
    user: {},
})

const form = reactive({
    full_name: '',
    passport_no: '',
    nationality: '',
    address: '',
    city: '',
    postal_code: '',
    email: '',
    phone_number: '',
});

const errors = reactive({
    full_name: '',
    passport_no: '',
    nationality: '',
    address: '',
    city: '',
    postal_code: '',
    email: '',
    phone_number: '',
});

const handleEnrollment = async () => {
    const enrollment = {
        full_name: form.full_name,
        passport_no: form.passport_no,
        nationality: form.nationality,
        address: form.address,
        city: form.city,
        postal_code: form.postal_code,
        email: form.email,
        phone_number: form.phone_number,
    };

    try {
        await axios.get('/sanctum');
        const response = await axios.post(`/api/courses/${state.course.id}/apply`, enrollment, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
            withCredentials: true,
        });
        toast.success('Enrollment Successful!');
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
            toast.error('An error occurred while enrollment. Please try again later.');
            console.error('Error:', error);
        }
    }
};

onMounted(async () => {
    const id = route.params.id;
    try {
        await axios.get('sanctum');
        const user = await axios.get(`/api/user`, {
            headers: {
                Authorization: `Bearer ${localStorage.getItem('token')}`,
            },
            withCredentials: true,
        });
        const course = await axios.get(`/api/courses/${id}`);
        state.course = course.data.course;
        state.user = user.data;
        form.email = state.user.email;
    } catch (error) {
        if (error.response && error.response.status === 401) {
            toast.error('You are not logged in. Redirecting to login page...');
            router.push('/login');
        } else {
            console.error('An error occurred:', error);
        }
    }
})
</script>

<template>
    <section
        class="relative w-full pt-[60px] md:pt-[80px] p-6 bg-sky-50 mt-4 flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-3xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Application for {{ state.course.title }}</h2>
            <form @submit.prevent="handleEnrollment">
                <!-- Full Name -->
                <div class="mb-4">
                    <label for="full-name" class="block text-gray-700 font-medium mb-2">
                        Full Name (As in IC/ Passport) <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="full-name" v-model="form.full_name"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                        placeholder="Enter your full name" />
                    <div v-if="errors.full_name" class="text-red-500 text-sm mt-2">{{ errors.full_name[0] }}</div>
                </div>

                <!-- Passport No and Nationality -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="passport-no" class="block text-gray-700 font-medium mb-2">
                            Passport Number <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="passport-no" v-model="form.passport_no"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                            placeholder="Enter your passport number" />
                        <div v-if="errors.passport_no" class="text-red-500 text-sm mt-2">{{ errors.passport_no[0] }}</div>
                    </div>
                    <div>
                        <label for="nationality" class="block text-gray-700 font-medium mb-2">
                            Passport Number <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nationality" v-model="form.nationality"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                            placeholder="Enter your Nationality" />
                        <div v-if="errors.nationality" class="text-red-500 text-sm mt-2">{{ errors.nationality[0] }}</div>
                    </div>
                </div>

                <!-- Address and City -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="address" class="block text-gray-700 font-medium mb-2">
                            Address <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="address" v-model="form.address"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                            placeholder="Enter your address" />
                        <div v-if="errors.address" class="text-red-500 text-sm mt-2">{{ errors.address[0] }}</div>

                    </div>
                    <div>
                        <label for="city" class="block text-gray-700 font-medium mb-2">
                            City <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="city" v-model="form.city"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                            placeholder="Enter your city" />
                        <div v-if="errors.city" class="text-red-500 text-sm mt-2">{{ errors.city[0] }}</div>
                    </div>
                </div>

                <!-- Postal Code and Email -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="postal-code" class="block text-gray-700 font-medium mb-2">
                            Postal Code <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="postal-code" v-model="form.postal_code"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                            placeholder="Enter your postal code" />
                        <div v-if="errors.postal_code" class="text-red-500 text-sm mt-2">{{ errors.postal_code[0] }}</div>
                    </div>
                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" v-model="form.email"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                            placeholder="Enter your email" readonly/>
                        <div v-if="errors.email" class="text-red-500 text-sm mt-2">{{ errors.email[0] }}</div>
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="mb-4">
                    <label for="phone-number" class="block text-gray-700 font-medium mb-2">
                        Phone Number <span class="text-red-500">*</span>
                    </label>
                    <input type="tel" id="phone-number" v-model="form.phone_number"
                        class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-sky-500"
                        placeholder="Enter your phone number" />
                    <div v-if="errors.phone_number" class="text-red-500 text-sm mt-2">{{ errors.phone_number[0] }}</div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-sky-500 text-white p-3 rounded-lg uppercase font-bold text-sm relative overflow-hidden group">
                    <span
                        class="absolute inset-0 bg-sky-600 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
                    <span class="relative z-10">Submit</span>
                </button>
            </form>
        </div>
    </section>
</template>