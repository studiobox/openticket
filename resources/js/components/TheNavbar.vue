<script setup>
import { Link } from '@inertiajs/vue3';
import AppDropdown from '@/components/dropdown/AppDropdown.vue';
import { MagnifyingGlassIcon, UserCircleIcon, ChevronDownIcon, UserIcon, ArrowLeftOnRectangleIcon, PencilSquareIcon } from '@heroicons/vue/24/solid'

defineProps({
    user: Object
})
</script>

<template>
    <nav class="flex items-center bg-gray-50 text-slate-900 font-medium text-sm border-b border-slate-200 shadow h-16 px-4">
          <div class="group searchbar flex items-center gap-2 w-1/2">
              <MagnifyingGlassIcon class="h-6 w-6 text-gray-500 group-hover:text-indigo-500" />
              <div class="search-input w-2/3">
                  <input type="text" class="block w-full border-none bg-transparent focus:outline-none focus:ring-0 font-normal text-md placeholder:text-slate-400" placeholder="Search ticket here...">
              </div>
          </div>
          <div class="h-full border-l border-slate-200 mx-4 ml-auto"></div>
            <Link href="#" class="py-2 px-4 bg-indigo-600 text-white rounded hover:bg-indigo-500 flex items-center">
                <PencilSquareIcon class="w-4 h-4 mr-2" />
                New Ticket
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
                  <Link href="#" class="dropdown-item">
                      <UserIcon class="w-4 h-4 inline-block mr-2" />
                      Profile
                  </Link>
                  <Link :href="route('desk.logout')" class="dropdown-item" method="delete" as="button">
                      <ArrowLeftOnRectangleIcon class="w-4 h-4 inline-block mr-2" />
                      Sign Out
                  </Link>
              </template>
          </AppDropdown>
      </nav>
</template>