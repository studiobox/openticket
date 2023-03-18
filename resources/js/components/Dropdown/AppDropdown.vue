<template>
    <div class="dropdown" @click="toggle">
        <slot name="toggler">
            <button class="py-2 px-3 bg-gray-300 hover:bg-gray-400 rounded flex items-center justify-between">
                Toggle
                <ChevronDownIcon class="w-4 h-4" />
            </button>
        </slot>

        <ul v-if="contentActive" class="dropdown-content" :class="dropdownContentClasses" style="min-width: 200px;">
            <slot name="dropdownContent" />
        </ul>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { ChevronDownIcon } from '@heroicons/vue/24/solid'

const contentActive = ref(false)

defineProps({
    dropdownContentClasses: String,
})

const toggle = () => contentActive.value = !contentActive.value
</script>