<!-- resources/js/Pages/Landlord/EditApartment.vue -->
<template>
  <LandlordLayout>
    <div class="p-6 max-w-2xl">
      <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Apartment #{{ id }}</h1>
      <ApartmentForm :initial="apartment" @submit="onSubmit" />
    </div>
  </LandlordLayout>
</template>

<script setup>
defineProps({
  id: Number,
  apartment: Object,
});

function onSubmit(data) {
  console.log('Updated:', data);
  alert(`Saved: ${data.title}`);
}
</script>