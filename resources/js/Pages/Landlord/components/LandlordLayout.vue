<!-- resources/js/Pages/Landlord/components/LandlordLayout.vue -->
<template>
  <div class="flex min-h-screen bg-gray-100">
    <LandlordSidebar />
    <main class="flex-1">
      <slot />
    </main>
  </div>
</template>

<script setup>
import LandlordSidebar from './LandlordSidebar.vue';
</script>