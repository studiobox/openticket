<script setup>
defineProps({
    headerClass: {
        type: String,
        default: ''
    }
})
</script>

<template>
    <div class="card">
        <div class="card-heading" :class="headerClass" v-if="$slots.heading">
            <slot name="heading" />
        </div>

        <div class="card-body">
            <slot />
        </div>

        <div class="card-footer" v-if="$slots.footer">
            <slot name="footer" />
        </div>
    </div>
</template>