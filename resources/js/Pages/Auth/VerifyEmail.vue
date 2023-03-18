<script setup>
import LandingCard from '@/components/LandingCard.vue';
import LandingHeader from '@/components/LandingHeader.vue';
import LandingFooter from '@/components/LandingFooter.vue';
import { AtSymbolIcon } from '@heroicons/vue/24/solid';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="landing">
        <LandingHeader class="lg:w-1/2" />

        <LandingCard class="lg:w-1/2 text-center">
            <AtSymbolIcon class="w-28 h-28 mx-auto mb-4" />
            <h2 class="text-4xl font-light mb-6">Thanks for signing up for OpenTicket!</h2>
            <p class="text-md font-light py-2">We are happy you're here. Let's get your email address verified:</p>
            <p class="text-md font-light py-2">If you not received verification email yet. Please click below Resend Verification Email:</p>
            <Link :href="route('verification.send')" class="btn btn-primary my-4" as="button" method="POST">Resend Verification Email</Link>
        </LandingCard>

        <LandingFooter />
        
    </div>
</template>
