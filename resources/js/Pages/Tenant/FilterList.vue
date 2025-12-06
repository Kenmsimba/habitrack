<script setup lang="ts">
import Layout from '../Layout.vue';

</script>

<template>

<Layout>
<div class="max-w-lg w-full">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold text-gray-900 mb-3">
                What kind of home are you looking for?
            </h1>
            <p class="text-gray-600">Tell us your preferences and we'll find the perfect match</p>
        </div>

        <form @submit.prevent="submitForm" class="bg-white rounded-2xl shadow-lg p-8 space-y-8">
            
            <div>
                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                    Location <span class="text-red-500">*</span>
                </label>
                <input
                    v-model="form.location"
                    type="text"
                    id="location"
                    placeholder="e.g. Westlands, Kilimani, Nairobi CBD"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                />
            </div>

          
            <div>
                <label for="unit_type" class="block text-sm font-medium text-gray-700 mb-2">
                    Unit Type <span class="text-red-500">*</span>
                </label>
                <select
                    v-model="form.unit_type"
                    id="unit_type"
                    required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                >
                    <option value="" disabled>Select unit type</option>
                    <option value="bedsitter">Bedsitter</option>
                    <option value="studio">Studio</option>
                    <option value="1-bedroom">1 Bedroom</option>
                    <option value="2-bedroom">2 Bedroom</option>
                    <option value="3-bedroom">3 Bedroom</option>
                </select>
            </div>

            
            <div class="pt-4">
                <button
                    type="submit"
                    :disabled="loading"
                    class="w-full bg-blue-600 hover:bg-blue-700 disabled:bg-blue-400 text-white font-semibold py-4 rounded-lg transition duration-200 shadow-md transform hover:scale-[1.02] active:scale-100"
                >
                    <span v-if="loading">Finding your perfect home...</span>
                    <span v-else>Show Me Available Units</span>
                </button>
            </div>

            
        </form>
    </div>
Find home
</Layout>

</template>