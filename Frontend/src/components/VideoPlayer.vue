<script setup>
</script>

<template>
  <div class="relative w-full pt-[60px] md:pt-[80px] flex justify-center">
    <div class="flex flex-col items-center justify-center max-w-4xl w-full pr-4 pl-4 md:pr-0 md:pl-0">
      <!-- Text container-->
      <div class="w-full text-left pt-8 pb-4">
        <h1 class="text-black text-2xl md:text-4xl uppercase font-bold mb-4">We Teach English To The World</h1>
        <p class="mb-4 text-black text-normal md:text-xl">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga modi, magnam quibusdam error unde beatae natus laboriosam adipisci pariatur veritatis earum fugit debitis illum ea, asperiores praesentium ratione quasi quas.
        </p>
      </div>

      <!-- Video container -->
      <div class="flex justify-center w-full">
        <video class="max-w-full max-h-full object-contain rounded-lg" controls autoplay muted>
          <source src="@/assets/videos/video.mp4" type="video/mp4">
          Your browser does not support HTML video.
        </video>
      </div>

      <!-- Our Purpose -->
      <div class="w-full text-left pt-8 pb-4">
        <h1 class="text-black text-2xl md:text-3xl font-bold uppercase mb-4">Our Purpose</h1>
        <p class="mb-4 text-black text-normal md:text-xl">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fuga modi, magnam quibusdam error unde beatae natus laboriosam adipisci pariatur veritatis earum fugit debitis illum ea, asperiores praesentium ratione quasi quas.
        </p>
      </div>
    </div>
  </div>
</template>
