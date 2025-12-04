<!-- resources/js/Layouts/GuestLayout.vue -->
<script setup>
import { Head } from '@inertiajs/vue3'

defineProps({
    title: String,
})
</script>

<template>
    <div>
        <!-- Optional: Add a head title -->
        <Head :title="title" />

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <slot />
            </div>
        </div>
    </div>
</template>