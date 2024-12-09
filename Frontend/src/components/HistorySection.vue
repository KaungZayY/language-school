<script setup>
import { ref, computed } from 'vue'

// Import images properly
import usaFlagMap from '@/assets/images/about/usa-flag-world-map.jpg'
import washingtonDc from '@/assets/images/about/washiton-dc.jpg'
import tokyo from '@/assets/images/about/tokyo.jpg'
import international from '@/assets/images/about/international.jpg'
import upm from '@/assets/images/about/upm.jpg'
import malaysia from '@/assets/images/about/malaysia.jpg'
import award from '@/assets/images/about/award.jpg'
import onlineAward from '@/assets/images/about/online-delivery-award.jpg'

const yearData = ref({
    "1951 - 1960": {
        year: "1957",
        description:
            "Lorem ipsum odor amet, consectetuer adipiscing elit. Felis non nam feugiat eget dui praesent vivamus. Habitant accumsan vitae; nisi vivamus iaculis sodales. Donec mi pellentesque ullamcorper, morbi vel a. Class cras amet commodo, morbi accumsan duis. Conubia convallis taciti rutrum efficitur.",
        image: usaFlagMap,
    },
    "1961 - 1970": {
        year: "1965",
        description:
            "maximus egestas dapibus. Feugiat sociosqu luctus sodales tellus nisl vehicula eleifend nullam congue. Sem in odio nibh ornare vitae placerat id praesent? Magna aptent vivamus quam luctus iaculis efficitur.",
        image: washingtonDc,
    },
    "1971 - 1980": {
        year: "1979",
        description:
            "Rhoncus efficitur leo finibus tempor malesuada lacus. Nascetur vulputate condimentum sed aptent, maximus eu magna. Tortor nulla fringilla conval",
        image: tokyo,
    },
    "1981 - 1990": {
        year: "1985",
        description:
            "Auctor inceptos aliquet augue vivamus ridiculus nunc efficitur hac porta. Vitae fusce nulla morbi platea pulvinar sed congue. Euismod suspendisse ex at hendrerit curae, porta dui. Rhoncus montes nisl phasellus aliquet",
        image: international,
    },
    "1991 - 2000": {
        year: "1995",
        description:
            "placerat integer libero efficitur. Litora curabitur ipsum maximus netus malesuada consectetur posuere malesuada proin. Adipiscing elementum erat nibh sodales pellentesque cubilia inceptos.",
        image: upm,
    },
    "2001 - 2010": {
        year: "2008",
        description:
            "Imperdiet augue habitant metus vel integer. Ligula lectus ipsum vehicula nisi quam ligula. Eleifend eros orci mauris enim dolor. Platea leo montes luctus class ",
        image: malaysia,
    },
    "2011 - 2020": {
        year: "2015",
        description:
            "Metus lacinia a molestie consequat iaculis primis commodo maximus. Metus turpis mattis iaculis enim integer ridiculus iaculis porttitor.",
        image: award,
    },
    "2021 - Current": {
        year: "2021",
        description:
            "Cras at primis tincidunt volutpat; vel vivamus netus suscipit. Ex pulvinar porta consequat leo vel duis primis commodo.",
        image: onlineAward,
    },
})

const selectedYearRange = ref("1951 - 1960")

const currentContent = computed(() => yearData.value[selectedYearRange.value])
</script>

<template>
    <div class="section flex flex-col lg:flex-row lg:gap-12 p-4 max-w-screen-xl mx-auto">
        <!-- Sidebar Year Selector -->
        <div class="flex lg:flex-col gap-2 text-gray-600 lg:w-1/4 overflow-scroll mb-2">
            <div v-for="(content, range) in yearData" :key="range" @click="selectedYearRange = range"
                class="cursor-pointer px-4 py-2 rounded-md text-center lg:text-left border lg:border-0 hover:bg-gray-100 transition"
                :class="{
                    'bg-sky-100 text-sky-500 font-bold': selectedYearRange === range,
                }">
                {{ range }}
            </div>
        </div>

        <!-- Content Display -->
        <div class="flex-1 flex flex-col items-center text-center lg:text-left lg:items-start">
            <img :src="currentContent.image" alt="ELS History" class="w-full lg:max-w-md rounded-lg shadow-lg mb-4" />
            <div class="flex flex-col justify-center gap-2">
                <h1 class="text-2xl font-bold text-gray-800">{{ currentContent.year }}</h1>
                <p class="text-gray-600 text-lg">{{ currentContent.description }}</p>
            </div>
        </div>
    </div>

    <div class="relative w-full flex justify-center">
        <div class="flex flex-col md:flex-row max-w-7xl bg-sky-100 items-center gap-10">
            <img src="@/assets/images/about/group-mask.jpg" alt="Circular Image"
                class="section w-64 h-64 md:w-96 md:h-96 rounded-full object-cover mt-4" />
            <div class="section mt-4 ml-4 mr-4">
                <h1 class="text-2xl md:text-4xl font-bold uppercase mb-8">
                    RECOGNISED BY MINISTRY OF HIGHER EDUCATION MALAYSIA
                </h1>
                <p class="text-normal md:text-lg">
                    ELS Malaysia's flagship course, the Certified Intensive English Programme (CIEP) holds official
                    recognition from the Malaysian Ministry of Higher Education (MOHE) as the benchmark for English
                    language proficiency required for international student admissions. This recognition signifies that
                    Malaysian universities acknowledge and accept the CIEP certification as valid proof of English
                    proficiency.<br>

                    Our CIEP students have the advantage of fulfilling their university's English language prerequisites
                    without the need for standardised tests such as IELTS, TOEFL, or PTE. By completing the CIEP, our
                    students not only meet these requirements but also enhance their English language skills
                    significantly, ensuring a smooth transition to their academic journey.<br>
                </p>
            </div>
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