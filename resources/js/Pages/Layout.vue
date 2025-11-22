<template>
  <!-- 1. ROOT WRAPPER -->
  <div class="bg-gray-50 flex flex-col min-h-dvh">
    <!-- Navigation -->
    <nav class="bg-white border-b shadow-sm">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-3">
          <Link href="/" class="text-xl font-bold text-blue-600">Afrihomes</Link>
          <div class="flex gap-4">
            <Link
              href="/"
              class="text-gray-600 hover:text-gray-900 transition-colors"
              :class="{ 'font-semibold text-blue-600': $page.url === '/' }"
            >Home</Link>
            <Link
              href="/about"
              class="text-gray-600 hover:text-gray-900 transition-colors"
              :class="{ 'font-semibold text-blue-600': $page.url === '/about' }"
            >About</Link>
            <Link
              href="/contact"
              class="text-gray-600 hover:text-gray-900 transition-colors"
              :class="{ 'font-semibold text-blue-600': $page.url.startsWith('/contact') }"
            >Contact</Link>
          </div>
        </div>
      </div>
    </nav>

    <!-- 2. MAIN – scrollable -->
    <main class="flex-1 overflow-y-auto">
      <div class="w-full max-w-7xl mx-auto px-4 py-8">
        <slot />
      </div>
    </main>

    <!-- 3. FOOTER -->
    <footer class="bg-gray-950 text-gray-300 border-t py-6">
      <div class="container mx-auto px-4 text-center text-sm">
        <p class="mb-3 text-gray-300">© 2025 Afrihomes. All rights reserved.</p>
        <div class="flex justify-center gap-4">
          <!-- To be changed  -->
          <Link href="/privacy" class="text-gray-400 hover:text-white transition-colors">Privacy</Link>
          <Link href="/terms" class="text-gray-400 hover:text-white transition-colors">Terms</Link>
          <Link href="/contact" class="text-gray-400 hover:text-white transition-colors">Support</Link>
        </div>
      </div>
    </footer>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
const page = usePage()
</script>