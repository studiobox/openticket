<script setup>
import { Link } from '@inertiajs/vue3';
import AppDropdown from '@/components/dropdown/AppDropdown.vue';
import { UserCircleIcon, ChevronDownIcon, UserIcon, ArrowLeftOnRectangleIcon, PencilSquareIcon } from '@heroicons/vue/24/solid';

defineProps({
    user: Object
})
</script>

<template>
    <nav class="flex items-center bg-gray-50 text-slate-900 font-medium text-sm border-b border-slate-200 shadow-lg w-full h-16 px-4 fixed top-0">
        <div class="logo p-4 border-b border-gray-100">
            <Link :href="route('support.dashboard')">
                <h1 class="group text-xl md:text-2xl text-slate-900 text-left font-barlow">
                    open<span class="py-1 px-2 bg-yellow-500 text-black text-xl md:text-2xl">ticket</span>
                </h1>
            </Link>
        </div>
        <Link :href="route('support.dashboard')" class="py-2 px-4 text-base text-slate-600 hover:text-indigo-500 ml-auto">
            View Tickets
        </Link>
        <div class="h-full border-l border-slate-200 mx-4"></div>
        <Link :href="route('support.ticket.create')" class="py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-500 flex items-center">
            <PencilSquareIcon class="w-4 h-4 mr-2" />
            Submit Ticket
        </Link>
        <div class="h-full border-l border-slate-200 mx-4"></div>
        <AppDropdown dropdown-content-classes="mt-4 rounded-md rounded-t-none">
            <template #toggler>
                <div class="user-item flex items-center text-slate-500 px-2 cursor-pointer gap-2">
                    <UserCircleIcon class="text-slate-500 w-8" v-if="!user.avatar" />
                    <span>{{ user.name }}</span>
                    <span><ChevronDownIcon class="w-3 h-3 ml-2" /></span>
                </div>
            </template>

            <template #dropdownContent>
                <Link :href="route('support.profile')" class="dropdown-item">
                    <UserIcon class="w-4 h-4 inline-block mr-2" />
                    Profile
                </Link>
                <Link :href="route('support.logout')" class="dropdown-item" method="delete" as="button">
                    <ArrowLeftOnRectangleIcon class="w-4 h-4 inline-block mr-2" />
                    Sign Out
                </Link>
            </template>
        </AppDropdown>
    </nav>
</template>