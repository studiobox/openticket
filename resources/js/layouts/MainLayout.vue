<script setup>
import TheSidebar from '@/components/TheSidebar.vue';
import TheNavbar from '@/components/TheNavbar.vue';
import { usePage } from '@inertiajs/vue3';

const flash = computed(() => usePage().props.flash);

const user = computed(() => usePage().props.user);
</script>

<template>
  <main class="dashboard h-full flex">
    <TheSidebar />
    
    <div class="content w-full">
        <TheNavbar :user="user" />

        <div class="main-content">
          <div v-if="flash" class="flash-notification p-3 mb-4 bg-green-300 rounded-md">
            {{ flash }}
          </div>
            <slot />
        </div>
    </div>
  </main>
</template>
