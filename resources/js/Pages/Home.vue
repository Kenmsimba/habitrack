<template>
  <div class="p-10 text-center bg-gradient-to-r from-blue-500 to-purple-600 text-white min-h-screen">
    <h1 class="text-5xl font-bold mb-4">Inertia + Vue 3 Works!</h1>
    <p class="text-xl mb-6">Hello, {{ $page.props.auth?.user?.name || 'Guest' }}!</p>
    <p class="text-lg">Count: {{ count }}</p>
    <button 
      @click="count++" 
      class="mt-4 px-6 py-3 bg-white text-purple-600 rounded-full font-semibold hover:scale-105 transition"
    >
      Count: {{ count }}
    </button>
  </div>
</template>

<script setup>
import { ref } from 'vue'
const count = ref(0)
</script>