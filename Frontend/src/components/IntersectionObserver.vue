<script setup>
import { useIntersectionObserver } from '@vueuse/core'
import { ref, watch } from 'vue'

// === Student Counter ===
const studentCounterRef = ref(null)
const isStudentCounterVisible = ref(false)
const currentStudentCount = ref(0)
const targetStudentCount = 1.2 // Target value (1.2 million)
const studentIncrement = 0.1
const studentDuration = 100 // Milliseconds per increment

useIntersectionObserver(studentCounterRef, ([entry]) => {
  isStudentCounterVisible.value = entry?.isIntersecting || false
}, { threshold: 0.5 })

watch(isStudentCounterVisible, (isVisible) => {
  if (isVisible) {
    let count = 0
    const interval = setInterval(() => {
      count += studentIncrement
      currentStudentCount.value = count.toFixed(1)
      if (count >= targetStudentCount) {
        currentStudentCount.value = targetStudentCount.toFixed(1)
        clearInterval(interval)
      }
    }, studentDuration)
  }
})

// === Country Counter ===
const countryCounterRef = ref(null)
const isCountryCounterVisible = ref(false)
const currentCountryCount = ref(0)
const targetCountryCount = 143 // Target value (143 countries)
const countryIncrement = 2 // Increment by 2
const countryDuration = 20 // Milliseconds per increment

useIntersectionObserver(countryCounterRef, ([entry]) => {
  isCountryCounterVisible.value = entry?.isIntersecting || false
}, { threshold: 0.5 })

watch(isCountryCounterVisible, (isVisible) => {
  if (isVisible) {
    let count = 0
    const interval = setInterval(() => {
      count += countryIncrement
      currentCountryCount.value = count
      if (count >= targetCountryCount) {
        currentCountryCount.value = targetCountryCount
        clearInterval(interval)
      }
    }, countryDuration)
  }
})

// === University Counter ===
const universityCounterRef = ref(null)
const isUniversityCounterVisible = ref(false)
const currentUniversityCount = ref(0)
const targetUniversityCount = 650 // Target value (650 universities)
const universityIncrement = 10 // Increment by 10
const universityDuration = 20 // Milliseconds per increment

useIntersectionObserver(universityCounterRef, ([entry]) => {
  isUniversityCounterVisible.value = entry?.isIntersecting || false
}, { threshold: 0.5 })

watch(isUniversityCounterVisible, (isVisible) => {
  if (isVisible) {
    let count = 0
    const interval = setInterval(() => {
      count += universityIncrement
      currentUniversityCount.value = count
      if (count >= targetUniversityCount) {
        currentUniversityCount.value = targetUniversityCount
        clearInterval(interval)
      }
    }, universityDuration)
  }
})

// === Office Counter ===
const officeCounterRef = ref(null)
const isOfficeCounterVisible = ref(false)
const currentOfficeCount = ref(0)
const targetOfficeCount = 2700 // Target value (2700 offices)
const officeIncrement = 50 // Increment by 50
const officeDuration = 20 // Milliseconds per increment

useIntersectionObserver(officeCounterRef, ([entry]) => {
  isOfficeCounterVisible.value = entry?.isIntersecting || false
}, { threshold: 0.5 })

watch(isOfficeCounterVisible, (isVisible) => {
  if (isVisible) {
    let count = 0
    const interval = setInterval(() => {
      count += officeIncrement
      currentOfficeCount.value = count
      if (count >= targetOfficeCount) {
        currentOfficeCount.value = targetOfficeCount
        clearInterval(interval)
      }
    }, officeDuration)
  }
})
</script>

<template>
  <div class="bg-gray-200 shadow-md rounded-lg py-8 px-4 md:px-12 grid gap-8 max-w-7xl mx-auto 
       grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mb-4">
    <!-- Student Counter -->
    <div ref="studentCounterRef" class="flex flex-col items-center text-center">
      <div class="text-orange-500 text-4xl">
        🎓<span class="text-black text-3xl font-bold">{{ currentStudentCount }} Million</span>
      </div>
      <p class="text-gray-500 text-sm mt-4">Taught 1.2 Million students and counting.</p>
    </div>

    <!-- Country Counter -->
    <div ref="countryCounterRef" class="flex flex-col items-center text-center">
      <div class="text-orange-500 text-4xl">
        🌍<span class="text-black text-3xl font-bold">{{ currentCountryCount }}</span>
      </div>
      <p class="text-gray-500 text-sm mt-4">Students from {{ targetCountryCount }} different countries have attended ELS.</p>
    </div>

    <!-- University Counter -->
    <div ref="universityCounterRef" class="flex flex-col items-center text-center">
      <div class="text-orange-500 text-4xl">
        🏛️<span class="text-black text-3xl font-bold">{{ currentUniversityCount }}</span>
      </div>
      <p class="text-gray-500 text-sm mt-4">
        ELS opens doors to more than {{ targetUniversityCount }} Universities in the US, Canada, and Australia.
      </p>
    </div>

    <!-- Office Counter -->
    <div ref="officeCounterRef" class="flex flex-col items-center text-center">
      <div class="text-orange-500 text-4xl">
        👥<span class="text-black text-3xl font-bold">{{ currentOfficeCount }}</span>
      </div>
      <p class="text-gray-500 text-sm mt-4">{{ targetOfficeCount }} counseling offices in 140 countries.</p>
    </div>
  </div>
</template>
