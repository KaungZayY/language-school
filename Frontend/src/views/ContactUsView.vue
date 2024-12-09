<script setup>
import Navbar from '@/components/Navbar.vue'
import FooterSection from '@/components/FooterSection.vue';
import LocationSection from '@/components/LocationSection.vue';
import EnquireForm from '@/components/EnquireForm.vue';
</script>

<template>
  <Navbar customClass="bg-gray-500" />
  <LocationSection />
  <EnquireForm />
  <FooterSection />
</template>