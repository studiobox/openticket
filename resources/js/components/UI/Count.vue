<script setup>
defineProps({
    tag: String
})
</script>

<template>
    <div class="count">
        <slot />
        <span v-if="tag" class="tag">{{ tag }}</span>
    </div>
</template>

<style scoped>
.count {
    @apply text-6xl flex items-end justify-center
}

.tag {
    @apply before:content-['/'] text-base text-slate-400
}
</style>