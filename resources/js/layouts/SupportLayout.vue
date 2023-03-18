<script setup>
import TheSupportNavbar from '@/components/TheSupportNavbar.vue';
import { usePage } from '@inertiajs/vue3';

const flash = computed(() => usePage().props.flash);

const user = computed(() => usePage().props.user);
</script>

<template>
    <TheSupportNavbar :user="user" />
    <div class="support-dashboard">
        <div v-if="flash" class="flash-notification p-3 mb-4 bg-green-300 rounded-md">
            {{ flash }}
        </div>
        <div class="mt-8 w-2/3">
            <slot />
        </div>
    </div>
</template>
