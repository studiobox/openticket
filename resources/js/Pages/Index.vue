<script setup>
import LandingCard from '../components/LandingCard.vue';
import LandingHeader from '../components/LandingHeader.vue';
import LandingFooter from '../components/LandingFooter.vue';
</script>

<template>
    <div class="landing">
        <LandingHeader show-nav class="lg:w-1/2" />

        <LandingCard class="lg:w-1/2">
            <h2 class="text-4xl font-light mb-6">A Pure helpdesk application that works!</h2>
            <p class="text-md font-light py-2">OpenTicket is a free PHP based application which allows you to manage your multi platform support with a clean web-based support ticket system.</p>
            <p class="text-md font-light py-2">Currently this application is in beta version. Soon its stable version will be released.</p>
        </LandingCard>

        <LandingFooter />
        
    </div>
</template>
