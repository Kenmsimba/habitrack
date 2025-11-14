<template>
  <aside class="w-64 bg-gray-800 text-white p-6">
    <h2 class="text-xl font-bold mb-8">Landlord Panel</h2>
    <nav class="space-y-2">
      <inertia-link
        href="/landlord/apartments"
        class="block py-2 px-4 rounded hover:bg-gray-700"
        :class="{ 'bg-gray-700': $page.url === '/landlord/apartments' }"
      >
        My Apartments
      </inertia-link>
      <inertia-link
        href="/landlord/apartments/create"
        class="block py-2 px-4 rounded hover:bg-gray-700"
      >
        Add Apartment
      </inertia-link>
    </nav>
  </aside>
</template>