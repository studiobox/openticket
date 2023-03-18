<script setup>

import LandingHeader from '@/components/LandingHeader.vue';
import LandingCard from '@/components/LandingCard.vue';
import LandingFooter from '@/components/LandingFooter.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';

const form = useForm({
    name: null,
    username: null,
    email: null,
    password: null,
    password_confirmation: null
})

const register = () => {
    console.log('Register User:', form)
    form.post(route('desk.register.store'));
}
</script>

<template>
    <div class="landing">
        <LandingHeader class="md:w-1/2 lg:w-1/3" />

        <LandingCard class="md:w-1/2 lg:w-1/3">
            <h2 class="text-4xl font-light mb-6">HelpDesk User Register</h2>

            <form @submit.prevent="register">
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" v-model="form.name" placeholder="Enter full name" class="form-control text-slate-900">
                    <div v-if="form.errors.name" class="input-error">
                        {{ form.errors.name }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" v-model="form.username" placeholder="Enter username" class="form-control text-slate-900">
                </div>
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
                    <div v-if="form.errors.password" class="input-error">
                        {{ form.errors.password }}
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" v-model="form.password_confirmation" placeholder="Confirm your password" class="form-control text-slate-900">
                </div>
                <div class="block mt-6">
                    <button type="submit" class="btn-block btn-yellow text-xl">Register</button>
                    <p class="mt-5 text-sm font-light text-gray-600 text-center">Already have account? <Link :href="route('desk.login')" class="font-medium text-yellow-500 hover:text-yellow-600">Click to Login</Link></p>
                </div>
            </form>
        </LandingCard>

        <LandingFooter />
    </div>
</template>