<template>
  <LandlordLayout>
    <div class="p-6">
      <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">My Apartments</h1>
        <inertia-link
          href="/landlord/apartments/create"
          class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
        >
          + Add Apartment
        </inertia-link>
      </div>

      <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        <ApartmentCard
          v-for="apt in apartments"
          :key="apt.id"
          :apartment="apt"
          @delete="remove(apt.id)"
        />
      </div>

      <p v-if="apartments.length === 0" class="text-gray-500 mt-6">
        No apartments yet. 
        <inertia-link href="/landlord/apartments/create" class="text-blue-600 underline">
          Add one
        </inertia-link>.
      </p>
    </div>
  </LandlordLayout>
</template>

<script setup>
import { ref } from 'vue';
import LandlordLayout from './components/LandlordLayout.vue';
import ApartmentCard from './components/ApartmentCard.vue';

const apartments = ref([
  { id: 1, title: 'Cozy Studio', address: '123 Main St', rent: 1200 },
  { id: 2, title: '2-Bedroom Flat', address: '456 Elm St', rent: 2100 },
  { id: 3, title: 'Luxury Penthouse', address: '789 Sky Tower', rent: 5000 },
]);

function remove(id) {
  apartments.value = apartments.value.filter(a => a.id !== id);
}
</script>