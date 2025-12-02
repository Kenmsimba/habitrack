<!-- resources/js/Pages/Landlord/components/ApartmentForm.vue -->
<template>
  <form @submit.prevent="submit" class="space-y-5 bg-white p-6 rounded-lg shadow">
    <div>
      <label class="block text-sm font-medium text-gray-700">Property Type</label>

      <Select v-model="form.propertyType"
        required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
        placeholder="e.g. Cozy Studio"
      >
        <option value="">Apartment</option>
        <option value="">Bed Sitter</option>
        <option value="">Single Room</option>
        <option value="">1 Bedroom</option>
        <option value="">2 Bedroom</option>
        <option value="">3 Bedroom</option>
        <option value="">4 Bedroom</option>
        <option value="">BnB</option>
        <option value="">Studio</option>
        <option value="">Shop</option>
        <option value="">Office Space</option>
      </Select>
    </div>

    <!-- Step 2 -->
    <h1> <strong>Address & Map Location </strong> </h1>
    <div>
      <label class="block text-sm font-medium text-gray-700">County</label>
      <input
        v-model="form.county"
        required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
        placeholder="e.g Nairobi"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Town/City</label>
      <input
        v-model="form.town"
        type="text"
        required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Street / Road</label>
      <input
        v-model="form.street"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Exact google location Pin</label>
      <input
        v-model="form.pin"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <!-- Step 3 -->
    <h1> <strong>Pricing Information</strong> </h1>

    <div>
      <label class="block text-sm font-medium text-gray-700">Monthly Rent</label>
      <input
        v-model.number="form.rent"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Deposit</label>
      <input
        v-model.number="form.deposit"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Service Charge (If any)</label>
      <input
        v-model="form.serviceCharge"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Water & Electricity Billing</label>
      <input
        v-model.number="form.waterElectricityBilling"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Payment Mode</label>
      <select
        v-model="form.paymentMode"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      >
      <option value="prepaid">Prepaid</option>
      <option value="postpaid">Post Paid</option>
      </select>
    </div>

    <!-- Step 4 -->
    <h1> <strong>House Description</strong> </h1>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Number of Bathrooms</label>
      <input
        v-model.number="form.bathroomNumber"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Type of Bathroom</label>
      <select
        v-model="form.bathroomType"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      >
      <option value="">Shared</option>
      <option value="">Self</option>
      </select>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Size in Sqr ft /Sqr mtrs if known</label>
      <input
        v-model="form.size"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>


    <div>
      <label class="block text-sm font-medium text-gray-700">Balcony Available</label>
      <select
        v-model="form.balcony"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      >
      <option value="">Yes</option>
      <option value="">No</option>
      </select>
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700">Kitchen Type</label>
      <select
        v-model="form.kitchenType"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      >
      <option value="">Open Type</option>
      <option value="">Closed Kitchenette</option>
      </select>
    </div>


    <!-- Step 5 -->
     <h1> <strong> Amenities and Features </strong></h1>

     <h3>Inside the House</h3>

     <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Wardrobes
      </label>
      <input
        v-model="form.wardrobe"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

     <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Hotshower
      </label>
      <input
        v-model="form.wardrobe"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>
     
    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Tiles
      </label>
      <input
        v-model="form.tiles"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>
     
    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        WiFI
      </label>
      <input
        v-model="form.wifi"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>
     
    <div>
      <label class="block text-sm font-medium text-gray-700"> Water Availability </label>
      <select
        v-model="form.waterAvailability"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      >

      <option value="">24 / 7</option>
      <option value="">rationed</option>
      <option value="">Borehole</option>
      </select>
    </div>

    <h1> <strong>Within the building</strong> </h1> 
    <!-- Select  -->

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Parking
      </label>
      <input
        v-model="form.parking"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Security [CCTV, guards, gate]
      </label>
      <input
        v-model="form.security"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Lift / Elevator
      </label>
      <input
        v-model="form.lift"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Backup Generator
      </label>
      <input
        v-model="form.backupGenerator"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Laundry area
      </label>
      <input
        v-model="form.laundryArea"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Pets Allowed
      </label>
      <input
        v-model="form.petsAllowed"
        type="checkbox"            
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Garbage collection services
      </label>
      <input
        v-model="form.garbageCollection"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>
    <!-- Photos / Media  -->
    <h1> <strong>Photos & Media </strong> </h1>
    <!-- file upload  -->
     <div>
      <label for="">Upload clear photos [Living room, bedroom, Kitchen, bathroom, kitchen, bedroom, balcony, exterior]</label>
      <br></br>  
      <input type="text" v-model="form.photos" />
     </div>

     <div>
      <label for="">Video tour (Mandatory) </label>
      <br>
      <input v-model="form.video" type="text">
     </div>
     

    <h1>
      <strong> Availability & Restriction Details </strong>
    </h1>
    <!-- Select  -->
     <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Is the house currently available
      </label>
      <input
        v-model="form.isHouseAvailable"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div>

    <!-- <div class="flex items-center gap-3">
      <label for="wardrobe-yes" class="text-sm font-medium text-gray-700 cursor-pointer">
        Minimum Lease Period
      </label>
      <input
        v-model="form.minimumLeasePeriod"
        type="checkbox"              
        id="wardrobe-yes"
        class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500"
      />
    </div> -->

    <div>
      <label class="block text-sm font-medium text-gray-700">Any restrictions</label>
      <input
        v-model="form.restrictions"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <h1>
      <strong>
        Landlord / Agent Information
      </strong>
    </h1>

    <div>
      <label class="block text-sm font-medium text-gray-700">Full name</label>
      <input
        v-model="form.name"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Phone number</label>
      <input
        v-model.number="form.phoneNumber"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Alternative Phone NUmber</label>
      <input
        v-model.number="form.alternativePhoneNumber"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Are you the Landlord/Agent?</label>
      <input
        v-model.number="form.landlordAgent"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>


    <h1>
      <strong>
        Payment Instructions
      </strong>
    </h1>

    <div>
      <label class="block text-sm font-medium text-gray-700">Prefered Payment Method</label>
      <input
        v-model="form.preferedPaymentMethod"
        type="text"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Viewing fee (If any)</label>
      <input
        v-model.number="form.viewingFee"
        type="number"
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm p-2 border"
      />
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700">Viewing Schedule (What time of day you allow viewing)</label>
      <input
        v-model="form.viewingSchedule"
        type="number"
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