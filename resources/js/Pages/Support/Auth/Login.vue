<script setup>
import LandingHeader from '@/components/LandingHeader.vue';
import LandingCard from '@/components/LandingCard.vue';
import LandingFooter from '@/components/LandingFooter.vue';
import { Link, useForm } from '@inertiajs/vue3';

const form = useForm({
    email: null,
    password: null
})

const login = () => {
    console.log('Login User:', form)
    form.post(route('support.login.store'))
}
</script>

<template>
    <div class="landing">
        <LandingHeader class="md:w-1/2 lg:w-1/3" />

        <LandingCard class="md:w-1/2 lg:w-1/3">
            <h2 class="text-4xl font-light mb-6">Support Login</h2>

            <form @submit.prevent="login">
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" v-model="form.email" placeholder="Enter email address" class="form-control text-slate-900">
                    <div v-if="form.errors.email" class="input-error">
                        {{ form.errors.email }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" v-model="form.password" placeholder="Enter password" class="form-control text-slate-900">
                    <div class="input-error" v-if="form.errors.password">
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="block mt-6">
                    <button type="submit" class="btn-block btn-yellow text-xl">Login</button>
                    <!-- <p class="mt-5 text-sm font-light text-gray-600 text-center">Don't have account yet? <Link :href="route('register')" class="font-medium text-yellow-500 hover:text-yellow-600">Click to Register</Link></p> -->
                </div>
            </form>
        </LandingCard>

        <LandingFooter />
    </div>
</template>