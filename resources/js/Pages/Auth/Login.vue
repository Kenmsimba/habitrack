<script setup>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AuthLayout from '../../Layouts/AuthLayout.vue'
import { Link } from '@inertiajs/vue3'

const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}

defineProps({
    errors: Object,
    status: String,
})
</script>

<template>
    <AuthLayout title="Log in">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-900">Welcome back</h1>
            <p class="mt-2 text-sm text-gray-600">
                Don't have an account?
                <Link :href="route('register')" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Sign up
                </Link>
            </p>
        </div>

        <form @submit.prevent="submit">
            <div class="space-y-5">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input
                        id="email"
                        v-model="form.email"
                        type="email"
                        required
                        autocomplete="username"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    <div v-if="form.errors.email" class="mt-1 text-sm text-red-600">
                        {{ form.errors.email }}
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input
                        id="password"
                        v-model="form.password"
                        type="password"
                        required
                        autocomplete="current-password"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                    />
                    <div v-if="form.errors.password" class="mt-1 text-sm text-red-600">
                        {{ form.errors.password }}
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input
                            v-model="form.remember"
                            type="checkbox"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        />
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>

                    <Link
                        :href="route('password.request')"
                        class="text-sm font-medium text-indigo-600 hover:text-indigo-500"
                    >
                        Forgot your password?
                    </Link>
                </div>

                <div v-if="status" class="text-sm text-green-600">
                    {{ status }}
                </div>

                <button
                    type="submit"
                    :disabled="form.processing"
                    class="w-full rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50"
                >
                    <span v-if="form.processing">Signing in...</span>
                    <span v-else>Sign in</span>
                </button>
            </div>
        </form>
    </AuthLayout>
</template>