<template>
  <div class="border rounded-lg p-5 bg-white shadow hover:shadow-lg transition">
    <h3 class="text-lg font-semibold text-gray-800">{{ apartment.title }}</h3>
    <p class="text-gray-600 text-sm mt-1">{{ apartment.address }}</p>
    <p class="text-2xl font-bold text-green-600 mt-3">${{ apartment.rent }}</p>

    <div class="mt-4 flex gap-3 text-sm">
      <inertia-link
        :href="`/landlord/apartments/${apartment.id}/edit`"
        class="text-blue-600 hover:underline"
      >
        Edit
      </inertia-link>
      <button @click="emit('delete')" class="text-red-600 hover:underline">
        Delete
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({ apartment: Object });
const emit = defineEmits(['delete']);
</script>