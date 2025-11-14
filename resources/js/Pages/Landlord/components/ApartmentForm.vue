<!-- resources/js/Pages/Landlord/components/ApartmentForm.vue -->
<template>
  <form @submit.prevent="submit" class="space-y-5 bg-white p-6 rounded-lg shadow">
    <div>
      <label class="block text-sm font-medium text-gray-700">Title</label>
      <input
        v-model="form.title"
        required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
        placeholder="e.g. Cozy Studio"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Address</label>
      <input
        v-model="form.address"
        required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
        placeholder="123 Main St"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Monthly Rent ($)</label>
      <input
        v-model.number="form.rent"
        type="number"
        required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <button
      type="submit"
      class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 font-medium"
    >
      {{ initial?.id ? 'Update Apartment' : 'Create Apartment' }}
    </button>
  </form>
</template>

<script setup>
import { reactive, watch } from 'vue';

const props = defineProps({ initial: Object });
const emit = defineEmits(['submit']);

const form = reactive({
  title: '',
  address: '',
  rent: 0,
});

watch(
  () => props.initial,
  (val) => {
    if (val) {
      form.title = val.title || '';
      form.address = val.address || '';
      form.rent = val.rent || 0;
    }
  },
  { immediate: true }
);

function submit() {
  emit('submit', { ...form });
}
</script>