<script setup>
import IntersectionObserver from '@/components/IntersectionObserver.vue';
import Navbar from '@/components/Navbar.vue'
import VideoPlayer from '@/components/VideoPlayer.vue'
</script>

<template>
  <Navbar customClass="bg-gray-500" />
  <VideoPlayer />
  <IntersectionObserver />
</template>
