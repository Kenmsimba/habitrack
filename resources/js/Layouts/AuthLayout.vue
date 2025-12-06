<!-- resources/js/Layouts/AuthLayout.vue -->
<template>
  <div class="min-h-screen flex items-center justify-center bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
    <div class="absolute inset-0 -z-10 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500 opacity-50"></div>
    </div>

    <div class="max-w-md w-full space-y-8">
      <!-- Optional: Logo or App Name -->
      <div class="text-center">
        <Link href="/">
          <img
            v-if="$page.props.app?.logo"
            class="mx-auto h-12 w-auto"
            :src="$page.props.app.logo"
            alt="Your App Logo"
          />
          <h1 class="mt-6 text-4xl font-extrabold text-gray-900 dark:text-white">
            {{ $page.props.app?.name || config('app.name') || 'Afrihomes' }}
          </h1>
        </Link>
        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
          <slot name="subtitle" />
        </p>
      </div>

      <!-- Main Card -->
      <div class="bg-white dark:bg-gray-800 shadow-2xl rounded-lg px-8 pt-8 pb-10">
        <slot />

        <!-- Optional footer links (e.g., Terms, Privacy) -->
        <div class="mt-6 text-center text-xs text-gray-500 dark:text-gray-400">
          <slot name="footer">
            &copy; {{ new Date().getFullYear()  }}  Afrihomes. All rights reserved.
          </slot>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

import { config } from '@/config';  // Example of importing from a config file



</script>

<style scoped>
/* Optional: Add subtle animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

.max-w-md {
  animation: fadeIn 0.6s ease-out;
}
</style>

