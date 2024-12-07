<script setup>
import { reactive } from 'vue';

const state = reactive({
    showSearchBox: false,
    showMenu: false,
});

const toggleSearchBox = () => {
    state.showSearchBox = !state.showSearchBox;
};

const toggleMenu = () => {
    state.showMenu = !state.showMenu;
};
</script>

<template>
  <nav class="flex justify-end md:justify-between items-center w-[92%] mx-auto mt-4">
        <div class="hidden md:block">
            <img class="w-12 cursor-pointer" src="@/assets/images/logo.png" alt="logo">
        </div>
        <div
            :class="[{ 'top-[6%]': state.showMenu }]"
            class="-z-10 md:z-0 absolute md:static min-h-[60vh] md:min-h-fit left-0 top-[-100%] w-full md:w-auto flex items-center px-5">
            <ul
                class="flex flex-col md:flex-row md:items-center md:justify-between md:gap-[4vw] w-full md:w-auto gap-4 uppercase font-bold text-2xl md:text-sm">
                <li class="border-b md:border-none py-4">
                    <a class="relative group" href="#">
                        Home
                        <span
                            class="absolute hidden md:block left-0 bottom-[-2px] w-0 h-[2px] bg-sky-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </li>
                <li class="border-b md:border-none py-4">
                    <a class="relative group" href="#">
                        Courses
                        <span
                            class="absolute hidden md:block left-0 bottom-[-2px] w-0 h-[2px] bg-sky-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </li>
                <li class="border-b md:border-none py-4">
                    <a class="relative group" href="#">
                        Contact Us
                        <span
                            class="absolute hidden md:block left-0 bottom-[-2px] w-0 h-[2px] bg-sky-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </li>
                <li class="border-b md:border-none py-4">
                    <a class="relative group" href="#">
                        About Us
                        <span
                            class="absolute hidden md:block left-0 bottom-[-2px] w-0 h-[2px] bg-sky-500 transition-all duration-300 group-hover:w-full"></span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="relative inline-flex gap-2 md:gap-8">
            <button
                class="relative bg-sky-500 text-white px-3 py-2 rounded-full uppercase font-bold text-sm overflow-hidden group">
                <span
                    class="absolute inset-0 bg-orange-500 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
                <span class="relative z-10 inline-flex items-center">
                    Apply Now
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-2 ml-1 fill-white">
                        <path
                            d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z" />
                    </svg>
                </span>
            </button>
            <select name="" id=""
                class="bg-white border px-4 py-2 border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500">
                <option value="">English</option>
                <option value="">Deutsch</option>
                <option value="">简体中文</option>
                <option value="">日本語</option>
                <option value="">한국어</option>
            </select>
            <button @click="toggleSearchBox">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 h-6">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </button>
            <div v-show="state.showSearchBox" class="absolute right-0 top-16 lg:top-12">
                <input type="text"
                    class="relative px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-1 focus:ring-sky-500"
                    placeholder="Search">
                <button class="absolute right-1 top-1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-8 h-8 p-1 bg-green-500 rounded-full fill-white">
                        <path
                            d="M505 442.7L405.3 343a208 208 0 1 0-62.4 62.4L442.7 505a32 32 0 0 0 45.3-45.3zM208 352a144 144 0 1 1 0-288 144 144 0 0 1 0 288z" />
                    </svg>
                </button>
            </div>
            <!-- Mobile Humburger Menu -->
            <button @click="toggleMenu" class="cursor-pointer md:hidden">
                <!-- Close Button -->
                <svg v-if="state.showMenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="close-icon w-8 h-8">
                    <path
                        d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                </svg>
                <!-- Default Menu -->
                <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="menu-icon w-8 h-8">
                    <path
                        d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z" />
                </svg>
            </button>
        </div>
    </nav>
</template>
