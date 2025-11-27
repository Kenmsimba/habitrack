<template>
  <aside class="w-64 bg-gray-800 text-white p-6">
    <Link :href="route('home')" class="text-xl font-bold text-blue-600">Afrihomes</Link>
    <h2 class="text-xl font-bold mb-8">Landlord Panel</h2>
    <nav class="space-y-2">
      <Link
        :href="route('landlord.apartments.index')"
        class="block py-2 px-4 rounded hover:bg-gray-700 transition"
        :class="{ 'bg-gray-900 ring-2 ring-blue-500': $page.url.startsWith('/landlord/apartments') && $page.url !== '/landlord/apartments/create' }"
      >
        My Apartments
      </Link>

      <Link
        :href="route('landlord.apartments.create')"
        class="block py-2 px-4 rounded hover:bg-gray-700 transition"
        :class="{ 'bg-gray-900 ring-2 ring-blue-500': $page.url === '/landlord/apartments/create' }"
      >
        Add Apartment
      </Link>
    </nav>
  </aside>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>