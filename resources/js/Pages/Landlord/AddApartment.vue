<!-- resources/js/Pages/Landlord/AddApartment.vue -->
<template>
  <LandlordLayout>
    <div class="p-6 max-w-2xl">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Apartment</h1>
      <ApartmentForm @submit="onSubmit" />
    </div>
  </LandlordLayout>
</template>

<script setup>
import LandlordLayout from './components/LandlordLayout.vue';
import ApartmentForm from './components/ApartmentForm.vue';

function onSubmit(data) {
  console.log('New apartment:', data);
  alert(`Added: ${data.title} at $${data.rent}/mo`);
}
</script>