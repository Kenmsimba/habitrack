<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import GuestLayout from '@/Layouts/GuestLayout.vue'

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    role: 'tenant', // default
})

const submit = () => {
    form.post('/register', {
        onFinish: () => form.reset('password', 'password_confirmation'),
    })
}
</script>

<template>
    <GuestLayout title="Register">
        <form @submit.prevent="submit">
            <div class="mt-4">
                <label>Name</label>
                <input v-model="form.name" type="text" required />
                <div v-if="form.errors.name">{{ form.errors.name }}</div>
            </div>

            <div class="mt-4">
                <label>Email</label>
                <input v-model="form.email" type="email" required />
                <div v-if="form.errors.email">{{ form.errors.email }}</div>
            </div>

            <div class="mt-4">
                <label>I am a...</label>
                <select v-model="form.role" class="w-full">
                    <option value="tenant">Tenant (looking for a place)</option>
                    <option value="landlord">Landlord (listing properties)</option>
                </select>
            </div>

            <div class="mt-4">
                <label>Password</label>
                <input v-model="form.password" type="password" required />
                <div v-if="form.errors.password">{{ form.errors.password }}</div>
            </div>

            <div class="mt-4">
                <label>Confirm Password</label>
                <input v-model="form.password_confirmation" type="password" required />
            </div>

            <div class="mt-6">
                <button
                    type="submit"
                    :disabled="form.processing"
                    class="bg-blue-600 text-white px-6 py-3 rounded"
                >
                    Register
                </button>
            </div>
        </form>
    </GuestLayout>
</template>