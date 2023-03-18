<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    showNav: {
        type: Boolean,
        default: false
    }
})
</script>

<template>
    <header class="w-full flex items-center justify-between px-6">
            <div class="logo mb-5 md:mb-10">
                <h1 class="group text-4xl md:text-6xl text-white text-left font-barlow">
                    open<span class="py-1 px-2 bg-yellow-500 text-black text-2xl md:text-5xl">ticket</span>
                </h1>
            </div>

            <nav class="flex gap-4" v-if="showNav">
                <Link :href="route('register')" class="header-link">Register</Link>
                <Link :href="route('login')" class="header-link">Login</Link>
            </nav>
        </header>
</template>

<style scoped>
.header-link {
    @apply py-2 px-4 text-lg font-light hover:bg-yellow-500 hover:text-slate-900 rounded-md transition ease-in-out duration-300
}
</style>