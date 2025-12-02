<template>
  <LandlordLayout>
  <div class="max-w-6xl mx-auto px-4 py-8 bg-gray-50 min-h-screen">
    <!-- Back Button -->
    <button @click="$inertia.visit(route('units.index'))" class="mb-6 text-blue-600 hover:underline flex items-center gap-2">
      ← Back to listings
    </button>

    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
      <!-- Photo Carousel -->
<div v-if="photosArray.length > 0" class="relative">
  <Swiper
    :modules="modules"
    :slides-per-view="1"
    :space-between="0"
    :loop="true"
    :pagination="{ clickable: true }"
    :navigation="true"
    :autoplay="{ delay: 5000, disableOnInteraction: false }"
    class="h-96 rounded-t-2xl overflow-hidden"
  >
    <SwiperSlide v-for="(photo, index) in photosArray" :key="index">
      <img
        :src="photoUrl(photo)"
        :alt="`Photo ${index + 1} of ${props.unit.property_type}`"
        class="w-full h-full object-cover"
        @error="e => e.target.src = 'https://via.placeholder.com/1200x800?text=No+Image'"
      />
    </SwiperSlide>
  </Swiper>
</div>

<div v-else class="bg-gray-200 h-96 flex items-center justify-center text-2xl text-gray-500 rounded-t-2xl">
  No photos available
</div>

      <div class="p-6 lg:p-10">
        <div class="grid lg:grid-cols-3 gap-10">
          <!-- Main Details -->
          <div class="lg:col-span-2 space-y-8">
            <div>
              <h1 class="text-4xl font-bold text-gray-900">
                {{ unit.property_type }} in {{ unit.town }}, {{ unit.county }}
              </h1>
              <p class="text-3xl font-bold text-green-600 mt-3">
                KSh {{ formatPrice(unit.rent) }} <span class="text-lg font-normal text-gray-600">/ month</span>
              </p>
              <p class="text-gray-600 mt-2 text-lg">{{ unit.street }} • {{ unit.size }}</p>
            </div>

            <!-- Key Features -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 bg-gray-50 p-6 rounded-xl">
              <div><strong>Bathrooms:</strong> {{ unit.bathroom_number }}</div>
              <div><strong>Balcony:</strong> {{ unit.balcony }}</div>
              <div><strong>Parking:</strong> {{ unit.parking }}</div>
              <div><strong>Pets:</strong> {{ unit.pets_allowed }}</div>
              <div><strong>Wifi:</strong> {{ unit.wifi }}</div>
              <div><strong>Water:</strong> {{ unit.water_availability }}</div>
              <div><strong>Generator:</strong> {{ unit.backup_generator }}</div>
              <div><strong>Lift:</strong> {{ unit.lift }}</div>
              <div><strong>Security:</strong> {{ unit.security }}</div>
            </div>

            <!-- Full Details -->
            <div class="space-y-4">
              <h2 class="text-2xl font-bold">Full Property Details</h2>
              <ul class="space-y-3 text-lg text-gray-700">
                <li><strong>Kitchen Type:</strong> {{ unit.kitchen_type }}</li>
                <li><strong>Wardrobes:</strong> {{ unit.wardrobes }}</li>
                <li><strong>Flooring:</strong> {{ unit.tiles }}</li>
                <li><strong>Laundry Area:</strong> {{ unit.laundry_area }}</li>
                <li><strong>Garbage Collection:</strong> {{ unit.garbage_collection_area }}</li>
                <li><strong>Minimum Lease:</strong> {{ unit.minimum_lease_period }}</li>
                <li><strong>Available:</strong> 
                  <span :class="unit.is_house_available === 'Yes' ? 'text-green-600' : 'text-red-600'" class="font-bold">
                    {{ unit.is_house_available }}
                  </span>
                </li>
              </ul>
            </div>

            <!-- Video -->
            <div v-if="unit.video" class="mt-10">
              <h3 class="text-2xl font-bold mb-4">Video Tour</h3>
              <div class="aspect-video rounded-xl overflow-hidden shadow-lg">
                <iframe
                  :src="embedYoutube(unit.video)"
                  class="w-full h-full"
                  allowfullscreen
                  frameborder="0"
                ></iframe>
              </div>
            </div>
          </div>

          <!-- Contact Card -->
          <div class="lg:col-span-1">
            <div class="bg-blue-50 border-2 border-blue-200 rounded-2xl p-8 sticky top-6">
              <h3 class="text-2xl font-bold text-blue-900 mb-6">Contact {{ unit.landlord_agent }}</h3>

              <div class="space-y-6 text-lg">
                <div>
                  <p class="font-semibold text-gray-700">Contact Person</p>
                  <p class="text-xl font-bold">{{ unit.name }}</p>
                </div>

                <div class="space-y-4">
                  <a :href="'tel:' + unit.phone_number"
                     class="block bg-green-600 text-white text-center py-4 rounded-xl font-bold hover:bg-green-700 transition">
                    Call {{ unit.phone_number }}
                  </a>
                  <a :href="whatsappLink"
                     target="_blank"
                     class="block bg-green-500 text-white text-center py-4 rounded-xl font-bold hover:bg-green-600 transition">
                    WhatsApp Now
                  </a>
                  <p v-if="unit.alternative_phone_number" class="text-center text-blue-600">
                    Alt: {{ unit.alternative_phone_number }}
                  </p>
                </div>

                <div>
                  <p class="font-semibold text-gray-700">Payment Method</p>
                  <p>{{ unit.prefered_payment_method }}</p>
                </div>

                <div class="bg-yellow-100 p-5 rounded-xl border border-yellow-300">
                  <p class="font-bold text-red-700 text-xl">
                    Viewing Fee: KSh {{ formatPrice(unit.viewing_fee) || 0 }}
                  </p>
                  <p class="text-sm mt-2">{{ unit.viewing_schedule || 'Contact for schedule' }}</p>
                </div>

                <div class="text-sm space-y-1 pt-4 border-t border-gray-300">
                  <p><strong>Deposit:</strong> KSh {{ formatPrice(unit.deposit) }}</p>
                  <p><strong>Service Charge:</strong> {{ unit.service_charge }}</p>
                  <p><strong>Billing (Water/Elec):</strong> KSh {{ formatPrice(unit.water_electricity_billing) }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </LandlordLayout>
</template>

<script setup>
import { ref, onMounted, computed } from 'vue'

// Import Swiper Vue components and modules (Swiper 10+ / 11+ way)
import { Swiper, SwiperSlide } from 'swiper/vue'
import { Navigation, Pagination, Autoplay } from 'swiper/modules'

// Import Swiper styles
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import LandlordLayout from './components/LandlordLayout.vue'

const props = defineProps({
  unit: Object
})

// Register modules (required in Swiper 10+)
const modules = [Navigation, Pagination, Autoplay]

const photosArray = computed(() => 
  props.unit.photos ? props.unit.photos.split(',').map(p => p.trim()).filter(Boolean) : []
)

const photoUrl = (filename) => `/storage/units/${filename}`

const formatPrice = (value) => value ? Number(value).toLocaleString() : '0'

const embedYoutube = (url) => {
  if (!url) return ''
  return url.replace('watch?v=', 'embed/').split('&')[0]
}

const whatsappLink = computed(() => {
  const phone = '254' + props.unit.phone_number.substring(1)
  const text = encodeURIComponent(`Hi, I'm interested in the ${props.unit.property_type} in ${props.unit.town} (KSh ${props.unit.rent}/month)`)
  return `https://wa.me/${phone}?text=${text}`
})
</script>

<style scoped>
.swiper-button-next,
.swiper-button-prev {
  color: white !important;
  background: rgba(0,0,0,0.5);
  width: 44px;
  height: 44px;
  border-radius: 50%;
  backdrop-filter: blur(4px);
}

.swiper-button-next:after,
.swiper-button-prev:after {
  font-size: 20px !important;
}

.swiper-pagination-bullet-active {
  background: white !important;
}
</style>