<template>
  <Layout>
    <!-- HERO SECTION – 80% of viewport height -->
    <div id="hero" class="h-[80vh] relative overflow-hidden">

      <!-- Fixed Navigation -->
      <nav id="nav" class="fixed inset-x-0 top-0 flex flex-row justify-between z-10 text-white bg-transparent">

        <!-- Nav Items (Tablet & Desktop) -->
        <!-- <div class="p-4 hidden md:flex flex-row justify-between font-bold">
          <a href="#about" class="mx-4 text-lg border-b-2 border-transparent hover:border-b-2 hover:border-indigo-300 transition duration-500">About</a>
          <a href="#whyus" class="mx-4 text-lg border-b-2 border-transparent hover:border-b-2 hover:border-indigo-300 transition duration-500">Why Us?</a>
          <a href="#showcase" class="mx-4 text-lg border-b-2 border-transparent hover:border-b-2 hover:border-indigo-300 transition duration-500">Our Products</a>
        </div> -->

        <!-- Mobile Burger Menu Button -->
        <div id="nav-open" class="p-4 md:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu">
            <line x1="3" y1="12" x2="21" y2="12"></line>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <line x1="3" y1="18" x2="21" y2="18"></line>
          </svg>
        </div>
      </nav>

      <!-- Mobile Nav Menu (Hidden by default) -->
      <div id="nav-opened" class="fixed left-0 right-0 hidden bg-white mx-2 mt-16 rounded-br rounded-bl shadow z-10 md:hidden">
        <div class="p-2 divide-y divide-gray-600 flex flex-col">
          <a href="#about" class="p-2 font-semibold hover:text-indigo-700">About</a>
          <a href="#whyus" class="p-2 font-semibold hover:text-indigo-700">Why Us?</a>
          <a href="#showcase" class="p-2 font-semibold hover:text-indigo-700">Our Products</a>
        </div>
      </div>

      <!-- Hero Header with Background & Overlay -->
      <header id="up" class="bg-center bg-fixed bg-no-repeat bg-cover h-full w-full relative">
        <!-- Dark Overlay + Centered Content -->
        <div class="h-full bg-black/50 flex items-center justify-center">
          <div class="mx-2 text-center">
            <h1 class="text-white font-extrabold text-4xl xs:text-5xl md:text-6xl" style="color:white;">
              <span class="text-white">Right</span> Place To
            </h1>
            <h2 class="text-gray-200 font-extrabold text-3xl xs:text-4xl md:text-5xl leading-tight" style="color:white;">
              Get <span class="text-white">Your</span>  <span class="text-white">Dream Home</span>
            </h2>
            <div class="inline-flex flex-wrap justify-center gap-3">
              <!-- <button class="p-2 my-5 bg-indigo-700 hover:bg-indigo-800 font-bold text-white rounded border-2 border-transparent hover:border-indigo-800 shadow-md transition duration-500 md:text-xl">
                Hire US!
              </button> -->
              <a href="#about">
                <button class="p-2 my-5 bg-transparent border-2 bg-indigo-200 bg-opacity-75 hover:bg-opacity-100 border-indigo-700 rounded hover:border-indigo-800 font-bold text-indigo-800 shadow-md transition duration-500 md:text-lg" style="background-color:white;">
                  Contact US
                </button>
              </a>
            </div>
          </div>
        </div>
      </header>
    </div>

    <!-- Rest of your page content starts here (below the hero) -->
    <!-- Add your sections like #about, #whyus, etc. here -->

  </Layout>
</template>

<script setup>
import Layout from './Layout.vue'
</script>

<style scoped>
/* Responsive Background Image */
header {
  background-image: url('https://images.pexels.com/photos/1446378/pexels-photo-1446378.jpeg');
}

/* Optional: Responsive background images per breakpoint */
/*
@media (min-width: 640px) {
  header { background-image: url('path/to/bg-640.jpg'); }
}
@media (min-width: 768px) {
  header { background-image: url('path/to/bg-768.jpg'); }
}
@media (min-width: 1024px) {
  header { background-image: url('path/to/bg-1024.jpg'); }
}
*/
</style>