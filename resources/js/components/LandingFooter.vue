<script setup>
import { computed } from 'vue';

const year = computed(() => new Date().getFullYear())
</script>

<template>
    <footer class="footer mt-5 text-sm font-light">
        <p>&copy; {{ year }} openticket.io</p>
    </footer>
</template>