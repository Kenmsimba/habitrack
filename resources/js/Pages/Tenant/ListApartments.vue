<template>
  <Layout>
  <div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">Available Rental Units</h1>

    <!-- Safe check: units might be null/undefined on first load -->
    <div v-if="!units || units.length === 0" class="text-center py-20 text-gray-500 text-xl">
      No units available at the moment.
    </div>

    <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div
        v-for="unit in units"
        :key="unit.id"
        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300"
      >
        <!-- Photo -->
        <div class="relative h-64 bg-gray-100">
          <img
            v-if="unit.photos"
            :src="firstPhotoUrl(unit.photos)"
            :alt="unit.property_type"
            class="w-full h-full object-cover"
            @error="e => e.target.src = 'https://via.placeholder.com/600x400?text=No+Image'"
          />
          <div v-else class="w-full h-full flex items-center justify-center bg-gray-200 text-gray-500 font-semibold">
            No Image
          </div>

          <!-- Price Badge -->
          <div class="absolute top-4 left-4 bg-green-600 text-white px-4 py-2 rounded-lg font-bold text-lg shadow-lg">
            KSh {{ formatPrice(unit.rent) }}<span class="text-sm font-normal">/mo</span>
          </div>

          <!-- Availability Badge -->
          <div
            class="absolute top-4 right-4 px-3 py-1 rounded-full text-sm font-bold"
            :class="unit.is_house_available === 'Yes' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'"
          >
            {{ unit.is_house_available === 'Yes' ? 'Available' : 'Taken' }}
          </div>
        </div>

        <!-- Card Body -->
        <div class="p-6">
          <h3 class="text-2xl font-bold text-gray-900">
            {{ unit.property_type }} in {{ unit.town }}
          </h3>
          <p class="text-gray-600 mt-1">
            {{ unit.street || 'Location not specified' }} • {{ unit.county }}
          </p>

          <!-- Quick Specs -->
          <div class="grid grid-cols-2 gap-4 mt-6 text-sm">
            <div><span class="text-gray-600">Bath:</span> <strong>{{ unit.bathroom_number }}</strong></div>
            <div><span class="text-gray-600">Size:</span> <strong>{{ unit.size || '—' }}</strong></div>
            <div><span class="text-gray-600">Parking:</span> <strong>{{ unit.parking }}</strong></div>
            <div><span class="text-gray-600">WiFi:</span> <strong>{{ unit.wifi }}</strong></div>
          </div>

          <!-- Tags -->
          <div class="flex flex-wrap gap-2 mt-5">
            <span v-if="unit.pets_allowed === 'Yes'" class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-medium">Pets Allowed</span>
            <span v-if="unit.backup_generator === 'Yes'" class="px-3 py-1 bg-purple-100 text-purple-800 rounded-full text-xs font-medium">Generator</span>
            <span v-if="unit.lift === 'Yes'" class="px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-xs font-medium">Lift</span>
          </div>

          <!-- Buttons -->
          <div class="mt-6 flex gap-3">
            <button
              @click="$inertia.visit('/tenant/unit/' + unit.id)"
              class="flex-1 bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition"
            >
              View Details
            </button>

            <a
              :href="whatsappLink(unit)"
              target="_blank"
              class="px-6 bg-green-500 text-white rounded-xl font-bold hover:bg-green-600 transition flex items-center justify-center"
            >
              WA
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </Layout>
</template>

<script setup>
import { computed } from 'vue'
import Layout from '../Layout.vue'

const props = defineProps({
  units: {
    type: Array,
    default: () => []   // This is the key line — prevents undefined!
  }
})

const formatPrice = (value) => {
  return value ? Number(value).toLocaleString() : '0'
}

const firstPhotoUrl = (photos) => {
  if (!photos) return ''
  const first = photos.split(',').map(p => p.trim())[0]
  return `/storage/units/${first}`
}

const whatsappLink = (unit) => {
  const phone = '254' + unit.phone_number.substring(1)
  const text = encodeURIComponent(`Hi, I'm interested in the ${unit.property_type} in ${unit.town} at KSh ${unit.rent}/month`)
  return `https://wa.me/${phone}?text=${text}`
}
</script>