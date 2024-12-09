<template>
    <section class="p-6 bg-sky-50 mt-4">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Left Side (Image and Styling) -->
            <div class="relative">
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-2/3 h-2/3 bg-orange-500 rounded-full -z-10">
                </div>
                <img src="@/assets/images/contact/enquire-now.jpg" alt="Enquire Now"
                    class="rounded-full shadow-lg w-full max-w-sm mx-auto lg:max-w-none lg:w-4/5" />
            </div>

            <!-- Right Side (Form) -->
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">ENQUIRE NOW</h2>
                <form>
                    <!-- Full Name -->
                    <div class="mb-4">
                        <label for="full-name" class="block text-gray-700 font-medium mb-2">
                            Full Name (As in IC/ Passport) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="full-name"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500"
                            placeholder="Enter your full name" required />
                    </div>

                    <!-- Nationality and Age -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="nationality" class="block text-gray-700 font-medium mb-2">
                                Nationality <span class="text-red-500">*</span>
                            </label>
                            <select id="nationality"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500" required>
                                <option value="">Please Select</option>
                                <option value="USA">USA</option>
                                <option value="India">India</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="age" class="block text-gray-700 font-medium mb-2">
                                Age <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="age"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500"
                                placeholder="Enter your age" required />
                        </div>
                    </div>

                    <!-- Phone Number and WeChat/LINE -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="phone" class="block text-gray-700 font-medium mb-2">
                                Phone Number <span class="text-red-500">*</span>
                            </label>
                            <div class="flex">
                                <select id="phone-country"
                                    class="p-3 border rounded-l-lg focus:ring-2 focus:ring-orange-500">
                                    <option value="+66">Thailand +66</option>
                                    <option value="+1">USA +1</option>
                                    <option value="+91">India +91</option>
                                </select>
                                <input type="tel" id="phone"
                                    class="w-full p-3 border-t border-r border-b rounded-r-lg focus:ring-2 focus:ring-orange-500"
                                    placeholder="Enter your phone number" required />
                            </div>
                        </div>
                        <div>
                            <label for="wechat-line" class="block text-gray-700 font-medium mb-2">
                                WeChat/ LINE ID (if any)
                            </label>
                            <input type="text" id="wechat-line"
                                class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500"
                                placeholder="Enter your WeChat/LINE ID" />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500"
                            placeholder="Enter your email address" required />
                    </div>

                    <!-- ELS Programmes -->
                    <div class="mb-4">
                        <label for="programmes" class="block text-gray-700 font-medium mb-2">
                            ELS Programmes
                        </label>
                        <select id="programmes" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500">
                            <option value="">Please Select</option>
                            <option value="Program 1">Program 1</option>
                            <option value="Program 2">Program 2</option>
                        </select>
                    </div>

                    <!-- How Did You Hear About Us -->
                    <div class="mb-4">
                        <label for="hear-about-us" class="block text-gray-700 font-medium mb-2">
                            How did you hear about ELS? <span class="text-red-500">*</span>
                        </label>
                        <select id="hear-about-us"
                            class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500" required>
                            <option value="">Please Select</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Friends">Friends</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>

                    <!-- Optional Comments -->
                    <div class="mb-4">
                        <label for="comments" class="block text-gray-700 font-medium mb-2">
                            If you selected "Other," please specify:
                        </label>
                        <textarea id="comments" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-orange-500"
                            rows="3" placeholder="Provide additional details here"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button
                        class="w-full relative bg-sky-500 text-white p-3 rounded-lg uppercase font-bold text-sm overflow-hidden group">
                        <span
                            class="absolute inset-0 bg-orange-500 transition-transform duration-500 transform scale-x-0 origin-left group-hover:scale-x-100"></span>
                        <span class="relative z-10">
                            Submit
                        </span>
                    </button>
                </form>
            </div>
        </div>
    </section>
</template>