<script setup>
import { RouterLink } from 'vue-router';

</script>

<template>
    <div class="relative w-full min-h-screen flex justify-center">
        <div class="flex flex-col md:flex-row max-w-full bg-sky-100 rounded-lg items-center gap-4">
            <img src="@/assets/images/home/study.jpg" alt="Circular Image"
                class="section w-64 h-64 md:w-1/2 md:h-2/3 rounded-lg object-cover mt-4 mb-4" />
            <div class="section p-8">
                <h1 class="text-2xl md:text-4xl font-bold uppercase mb-8">
                    Our Courses
                </h1>
                <p class="text-normal md:text-lg">
                    Rutrum mauris cubilia laoreet nec gravida. Rutrum facilisis placerat habitant suspendisse hendrerit
                    lorem elementum senectus. Anetus dictum platea facilisi; pulvinar dictum commodo. Penatibus semper
                    torquent senectus arcu pulvinar risus cubilia etiam cras.
                </p>
            </div>
        </div>
    </div>

    <!-- Our Courses -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 p-6 bg-gray-100">
        <!-- Cards -->
        <div
            class="section bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition duration-300 ease-in-out transform hover:scale-105">
            <div class="">
                <img src="@/assets/images/landing-page-1.jpg" alt="Course Image" class="w-full h-48 object-cover" />
            </div>
            <div class="course-details p-4 flex-grow">
                <h3 class="text-xl font-semibold mb-2">Certified Intensive English Programme (CIEP)</h3>
                <p class="text-sm text-gray-600 mb-2">University Pathway</p>
                <p class="text-base mb-4">Recognised by the Ministry of Higher Education for university
                    admissions.</p>
                <a href="#" class="text-blue-500 font-semibold hover:text-blue-700">Learn More</a>
            </div>
        </div>

        <div
            class="section bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition duration-300 ease-in-out transform hover:scale-105">
            <div class="">
                <img src="@/assets/images/landing-page-2.jpg" alt="Course Image" class="w-full h-48 object-cover" />
            </div>
            <div class="course-details p-4 flex-grow">
                <h3 class="text-xl font-semibold mb-2">Online Certified Intensive English Programme (CIEP Online)</h3>
                <p class="text-sm text-gray-600 mb-2">University Pathway, ELS Online Courses</p>
                <p class="text-base mb-4">A convenient and accessible way to achieve English language excellence at
                    home.</p>
                <a href="#" class="text-blue-500 font-semibold hover:text-blue-700">Learn More</a>
            </div>
        </div>

        <div
            class="section bg-white rounded-lg shadow-md overflow-hidden flex flex-col transition duration-300 ease-in-out transform hover:scale-105">
            <div class="">
                <img src="@/assets/images/landing-page-4.jpg" alt="Course Image" class="w-full h-48 object-cover" />
            </div>
            <div class="course-details p-4 flex-grow">
                <h3 class="text-xl font-semibold mb-2">Corporate English Training</h3>
                <p class="text-sm text-gray-600 mb-2">Career and Workplace</p>
                <p class="text-base mb-4">Customisable English programmes to train and upskill teams.</p>
                <a href="#" class="text-blue-500 font-semibold hover:text-blue-700">Learn More</a>
            </div>
        </div>
        <!-- /Cards -->
    </div>

    <div class="flex flex-col md:flex-row max-w-full rounded-lg items-center gap-4">
        <div class="md:w-1/2">
            <img src="@/assets/images/home/read.jpg" alt="Circular Image"
                class="section w-80 h-80 md:w-[550px] md:h-[550px] rounded-full object-cover mt-4 mb-4 md:ml-8" />
        </div>
        <div class="section md:w-1/3 m-10">
            <h1 class="text-2xl font-bold uppercase mb-4">
                About Us
            </h1>
            <p class="mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                labore et dolore magna aliqua. pursuits.
            </p>
            <RouterLink to="about"
                class="relative bg-green-500 hover:bg-sky-500 text-white px-3 py-3 rounded-full uppercase font-bold text-sm overflow-hidden group">
                Discover More
            </RouterLink>
        </div>
    </div>

    <div class="flex flex-col md:flex-row max-w-full bg-sky-100 rounded-lg items-center p-8">
        <!-- Student Quote 1 -->
        <div class="md:w-1/2 flex flex-col items-center mb-8 md:mb-0">
            <img src="@/assets/images/home/student-1.jpg" alt="Circular Image"
                class="w-64 h-64 md:w-[350px] md:h-[350px] rounded-full object-cover mt-4 mb-4 md:ml-8" />
            <blockquote class="p-4 italic text-lg text-center md:text-left">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua."</p>
                <footer class="mt-4 text-right font-semibold">Rose L. Random</footer>
            </blockquote>
        </div>

        <!-- Student Quote 2 -->
        <div class="md:w-1/2 flex flex-col items-center mb-8 md:mb-0">
            <img src="@/assets/images/home/student-2.jpg" alt="Circular Image"
                class="w-64 h-64 md:w-[350px] md:h-[350px] rounded-full object-cover mt-4 mb-4 md:ml-8" />
            <blockquote class="p-4 italic text-lg text-center md:text-left">
                <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua."</p>
                <footer class="mt-4 text-right font-semibold">Franky W. Random</footer>
            </blockquote>
        </div>
    </div>

    <!-- Contact Us -->
    <div class="flex flex-col md:flex-row max-w-full rounded-lg items-center gap-6 md:gap-8 p-6 md:p-10 bg-sky-50">
        <div class="section md:w-1/2 text-center md:text-left mb-6 md:mb-0 md:p-20">
            <h1 class="text-3xl font-bold uppercase mb-4 text-sky-900">
                Wait no more. Join us
            </h1>
            <p class="text-lg mb-6 text-gray-700">
                Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <RouterLink to="contact-us"
                class="relative bg-green-500 hover:bg-sky-500 text-white px-6 py-3 rounded-full uppercase font-bold text-sm transition-colors duration-300 group">
                Contact Us
            </RouterLink>
        </div>

        <div class="md:w-1/2 flex justify-center">
            <img src="@/assets/images/contact/enquire-now.jpg" alt="Enquire Now Image"
                class="section w-80 h-80 md:w-[550px] md:h-[550px] rounded-full object-cover shadow-lg" />
        </div>
    </div>

</template>

<style scoped>
@keyframes appear {
    from {
        opacity: 0;
        scale: 0.5;
    }

    to {
        opacity: 1;
        scale: 1;
    }
}

.section {
    animation: appear linear;
    animation-timeline: view();
    animation-range: entry 0% cover 40%;
}
</style>